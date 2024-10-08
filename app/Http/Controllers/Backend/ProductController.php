<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AttributeName;
use App\Models\AttributeValue;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTraits;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\Brand;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductSize;
use Attribute;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    use ImageUploadTraits;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories        = Category::get_data();
        $subCategories     = Subcategory::get_data();
        $childCategories   = ChildCategory::get_data();
        $brands            = Brand::get_data();

        return view('backend.pages.products.index', compact('categories', 'subCategories', 'childCategories', 'brands'));
    }

    public function getData()
    {
        // get all data
        $products = Product::leftJoin('categories', 'categories.id', 'products.category_id')
                    ->leftJoin('subcategories', 'subcategories.id', 'products.subCategory_id')
                    ->leftJoin('child_categories', 'child_categories.id', 'products.childCategory_id')
                    ->leftJoin('brands', 'brands.id', 'products.brand_id')
                    ->select('products.*', 'categories.category_name as cat_name', 'subcategories.subcategory_name as subCat_name', 'child_categories.name as childCat_name', 'brands.brand_name')
                    ->get();

        return DataTables::of($products)
            ->addColumn('product_img', function ($product) {
                return ' <a href="'.asset( $product->thumb_image ).'" target="__blank">
                      <img src="'.asset( $product->thumb_image ).'" width="100px" height="100px">
                </a>';
            })
            ->addColumn('categorized', function ($product) {
                $subCat = $product->subCat_name ?? 'N/A';
                $childCat = $product->childCat_name ?? 'N/A';

                return '<div class="">
                       <h6>Category Name: <span class="badge bg-success">'. $product->cat_name .'</span></h6> 
                       <h6>SubCategory Name : <span class="badge bg-success">'. $subCat .'</span></h6>
                       <h6>ChildCategory Name : <span class="badge bg-success">'. $childCat .'</span></h6>
                </div>';
            })
            ->addColumn('special_featured', function ($product) {
                $is_top = $product->is_top == 1 ? "Yes" : 'No';
                $is_best = $product->is_best == 1 ? "Yes" : 'No';
                $is_featured = $product->is_featured == 1 ? "Yes" : 'No';
                $start_date = $product->offer_start_date ?? 'N/A';
                $end_date = $product->offer_end_date ?? 'N/A';

                return '<div class="">
                       <h6>Top Product: <span class="badge bg-success">'. $is_top .'</span></h6> 
                       <h6>Best Product : <span class="badge bg-success">'. $is_best .'</span></h6>
                       <h6>Featured Product : <span class="badge bg-success">'. $is_featured .'</span></h6>
                       <h6>Start Product Offer : <span class="badge bg-success">'. $start_date .'</span></h6>
                       <h6>End Product Offer : <span class="badge bg-success">'. $end_date .'</span></h6>
                </div>';
            })
            ->addColumn('product_details', function ($product) {
                $sku = $product->sku ?? 'N/A';
                $offer_price = $product->offer_price ?? 'N/A';

                return '<div class="">
                       <h6>Product Name : <span class="badge bg-success">'. $product->name .'</span></h6> 
                       <h6>Product Quantity : <span class="badge bg-success">'. $product->qty .'</span></h6>
                       <h6>Product Sku : <span class="badge bg-success">'. $sku .'</span></h6>
                       <h6>Brand Name : <span class="badge bg-success">'. $product->brand_name .'</span></h6>
                       <h6>Product Price : <span class="badge bg-success">'. $product->price .'</span></h6>
                       <h6>Offer Price : <span class="badge bg-success">'. $offer_price .'</span></h6>
                </div>';
            })
            ->addColumn('status', function ($product) {
                if ($product->status == 1) {
                    return ' <a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$product->id.'" data-status="'.$product->status.'"> <i
                            class="fa-solid fa-toggle-on fa-2x"></i>
                    </a>';
                } else {
                    return '<a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$product->id.'" data-status="'.$product->status.'"> <i
                            class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                    </a>';
                }
            })
            ->addColumn('action', function ($product) {
                return '<div class="d-flex gap-3">
                    <a class="btn btn-sm btn-primary" id="editButton" href="javascript:void(0)" data-id="'.$product->id.'" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></a>

                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" data-id="'.$product->id.'" id="deleteBtn"> <i class="fas fa-trash"></i></a>

                    <a class="btn btn-sm btn-info" href="'. route('admin.product-variant', $product->id) .'" ><i class="bx bx-cog"></i></a>
                </div>';
            })

            ->rawColumns(['categorized', 'special_featured', 'product_details', 'product_img', 'status', 'action'])
            ->make(true);
    }

    public function changeProductStatus(Request $request)
    {
        $id = $request->id;
        $Current_status = $request->status;

        if ($Current_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $page = Product::findOrFail($id);
        $page->status = $status;
        $page->save();

        return response()->json(['message' => 'success', 'status' => $status, 'id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'thumb_image' => ['required', 'image'],
                'name' => ['required', 'unique:products,name', 'max:255'],
                'category_id' => ['required'],
                'brand_id' => ['required'],
                'price' => ['required'],
                'qty' => ['required'],
                'short_description' => ['required'],
                'long_description' => ['required'],
            ],
            [
                'thumb_image.required' => 'Product Image is required',
                'name.required' => 'Please fill up Product name',
                'name.max' => 'Character might be 255 word',
                'name.unique' => 'Character might be unique',
                'name.unique' => 'Character might be unique',
                'category_id.required' => 'Please Select the Category Name',
                'brand_id.required' => 'Please Select the Brand Name',
                'qty.required' => 'Please add product quantity',
                'short_description.required' => 'Please add short description',
                'long_description.required' => 'Please add long description',
            ]
        );

        DB::beginTransaction();
        try {

            $product = new Product();

            $product->name                      = $request->name;
            $product->slug                      = Str::slug($request->name);
            $product->vender_id                 = 0;  // Note
            $product->category_id               = $request->category_id;
            $product->subCategory_id            = $request->subCategory_id;
            $product->childCategory_id          = $request->childCategory_id;
            $product->brand_id                  = $request->brand_id;
            $product->qty                       = $request->qty;
            $product->short_description         = $request->short_description;
            $product->long_description          = $request->long_description;
            $product->video_link                = $request->video_link;
            $product->sku                       = $request->sku;
            $product->tags                      = $request->tags;
            $product->price                     = $request->price;
            $product->offer_price               = $request->offer_price;
            $product->offer_start_date          = $request->offer_start_date;
            $product->offer_end_date            = $request->offer_end_date;
            $product->is_top                    = $request->is_top;
            $product->is_best                   = $request->is_best;
            $product->is_featured               = $request->is_featured;
            $product->is_approved               = 0;
            $product->seo_title                 = $request->seo_title;
            $product->seo_description           = $request->seo_description;
            $product->status                    = 1;
    
            // Handle image with ImageUploadTraits function
            $uploadImage                        = $this->imageUpload($request, 'thumb_image', 'product');
            $product->thumb_image               =  $uploadImage;
    
            // dd($product);
            $product->save();
        }

        catch(Exception $ex){
            DB::rollBack();
            throw $ex;
            // dd($ex->getMessage());
        }

        DB::commit();
        return response()->json(['message'=> "Successfully Product Created!", 'status' => true]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // dd($product);
        return response()->json(['success' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product  = Product::find($id);

        $request->validate(
            [
                'name' => ['required', 'unique:products,name,' . $product->id, 'max:255'],
                'category_id' => ['required'],
                'brand_id' => ['required'],
                'price' => ['required'],
                'qty' => ['required'],
                'short_description' => ['required'],
                'long_description' => ['required'],
            ],
            [
                'name.required' => 'Please fill up Product name',
                'name.max' => 'Character might be 255 word',
                'name.unique' => 'Character might be unique',
                'name.unique' => 'Character might be unique',
                'category_id.required' => 'Please Select the Category Name',
                'brand_id.required' => 'Please Select the Brand Name',
                'qty.required' => 'Please add product quantity',
                'short_description.required' => 'Please add short description',
                'long_description.required' => 'Please add long description',
            ]
        );

        DB::beginTransaction();
        try {

            $product->name                      = $request->name;
            $product->slug                      = Str::slug($request->name);
            $product->vender_id                 = 0;  // Note
            $product->category_id               = $request->category_id;
            $product->subCategory_id            = $request->subCategory_id;
            $product->childCategory_id          = $request->childCategory_id;
            $product->brand_id                  = $request->brand_id;
            $product->qty                       = $request->qty;
            $product->short_description         = $request->short_description;
            $product->long_description          = $request->long_description;
            $product->video_link                = $request->video_link;
            $product->sku                       = $request->sku;
            $product->tags                      = $request->tags;
            $product->price                     = $request->price;
            $product->offer_price               = $request->offer_price;
            $product->offer_start_date          = $request->offer_start_date;
            $product->offer_end_date            = $request->offer_end_date;
            $product->is_top                    = $request->is_top;
            $product->is_best                   = $request->is_best;
            $product->is_featured               = $request->is_featured;
            $product->is_approved               = 0;
            $product->seo_title                 = $request->seo_title;
            $product->seo_description           = $request->seo_description;
    
            // Handle image with ImageUploadTraits function
            $uploadImages                     = $this->deleteImageAndUpload($request, 'thumb_image', 'product', $product->thumb_image );
            $product->thumb_image           =  $uploadImages;
        
            // dd($product);
            $product->save();
    
        }
        catch(Exception $ex){
            DB::rollBack();
            // throw $ex;
            dd($ex->getMessage());
        }

        DB::commit();
        return response()->json(['message'=> "Successfully Product Updated!", 'status' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->thumb_image) {
            if (file_exists($product->thumb_image)) {
                unlink($product->thumb_image);
            }
        }

        $product->delete();

        return response()->json(['message' => 'Product has been deleted.'], 200);
    }

    public function getSubCategories(Request $request, Category $category)
    {
        $subcats= SubCategory::where('category_id', $category->id)->get();
        
        return response()->json(['message' => 'success', 'data' => $subcats], 200);
    }

    public function product_variant($id)
    {
        // ProductColour
        $size_value       = AttributeValue::where('attribute_name', "size")->get();
        $color_value      = AttributeValue::where('attribute_name', "colour")->get();
        $productImages    = ProductImage::where('product_id', $id)->get();
        $productSizes     = ProductSize::where('product_id', $id)->get();
        $productColors    = ProductColor::where('product_id', $id)->get();

        return view('backend.pages.products.product_variant', [
            'id' => $id,
            'size_value'     => $size_value,
            'color_value'    => $color_value,
            'productImages'  => $productImages,
            'productSizes'   => $productSizes,
            'productColors'  => $productColors,
        ]);
    }
    
    
    public function update_product_variant(Request $request, $id)
    {
        // dd($request->all());

        // Multiple images store
        if($request->hasFile('images')) {
            foreach($request->file('images') as $image) {

                $productImages = new ProductImage();
                $productImages->product_id = $id;
    
                // Generate unique image name
                $imageName = $request->slug . rand(1, 99999999) . '.' . $image->getClientOriginalExtension();

                $imagePath = 'public/backend/images/multiple-image/';
                $image->move($imagePath, $imageName);
    
                $productImages->images   =  $imagePath . $imageName;

                $productImages->save();
            }
        }


        // Delete existing product size for the product ID
        ProductSize::where('product_id', $id)->delete();

        // Handle Product Sizes
        if ($request->has('size_name') && $request->has('size_price')) {
            foreach ($request->size_name as $index => $sizeName) {

                if (!empty($sizeName)) {
                    $productSize = new ProductSize(); // Assuming ProductSize model exists

                    $productSize->product_id = $id;
                    $productSize->size_name  = $sizeName;
                    $productSize->size_price = $request->size_price[$index]; // Match price with size name
                    $productSize->save();
                }
            }
        }


        // Delete existing product colors for the product ID
        ProductColor::where('product_id', $id)->delete();  

        // Handle Product Colors
        if ($request->has('color_name')) {
            foreach ($request->color_name as $row => $colorName) {

                if (!empty($colorName)) {
                    $productColor = new ProductColor(); // Assuming ProductColor model exists

                    $productColor->product_id     = $id;
                    $productColor->color_name     = $colorName;
                    $productColor->color_price    = $request->color_price[$row];
                    $productColor->save();
                }
            }
        }


       return redirect()->back();

    }

    // Delete Multiple Product images variants
    public function delete_multiple_image($id)
    {
       $productImg = ProductImage::findOrFail($id);

       if( !is_null( $productImg ) ){
            if( file_exists( $productImg->images )){
                unlink($productImg->images);
            }
            $productImg->delete();
       }

       return redirect()->back();
    }

    // Delete Multiple Product size variants
    public function delete_product_size($id)
    {
       $productSize = ProductSize::findOrFail($id);
       if( !is_null( $productSize ) ){
            $productSize->delete();
       }

       return redirect()->back();
    }

    // Delete Multiple Product color variants
    public function delete_product_color($id)
    {
       $productColor = ProductColor::findOrFail($id);
       if( !is_null( $productColor ) ){
            $productColor->delete();
       }

       return redirect()->back();
    }
}
