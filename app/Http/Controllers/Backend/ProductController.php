<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTraits;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\Brand;
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
        $categories= Category::all();

        return DataTables::of($categories)
            ->addColumn('categoryImg', function ($category) {
                return '<img src="'.asset( $category->category_img ).'" width="50px" height="50px">';
            })
            ->addColumn('status', function ($category) {
                if ($category->status == 1) {
                    return ' <a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$category->id.'" data-status="'.$category->status.'"> <i
                            class="fa-solid fa-toggle-on fa-2x"></i>
                    </a>';
                } else {
                    return '<a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$category->id.'" data-status="'.$category->status.'"> <i
                            class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                    </a>';
                }
            })

            ->addColumn('action', function ($category) {
                return '<div class="d-flex gap-3">
                    <a class="btn btn-sm btn-primary" id="editButton" href="javascript:void(0)" data-id="'.$category->id.'" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></a>

                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" data-id="'.$category->id.'" id="deleteBtn"> <i class="fas fa-trash"></i></a>
                </div>';
            })

            ->rawColumns(['categoryImg', 'status', 'action'])
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
                'is_featured' => ['required'],
                'is_top' => ['required'],
                'is_best' => ['required'],
                'status' => ['required'],
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
                'is_featured.required' => 'Please Select the dropdown list',
                'is_top.required' => 'Please Select the dropdown list',
                'is_best.required' => 'Please Select the dropdown list',
                'status.required' => 'status is required',
            ]
        );


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
        $product->status                    = $request->status;

        // Handle image with ImageUploadTraits function
        $uploadImage                        = $this->imageUpload($request, 'thumb_image', 'product');
        $product->thumb_image               =  $uploadImage;

        // dd($product);
        $product->save();

        return response()->json(['message'=> "Successfully Product Created!", 'status' => true]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // dd($category);
        return response()->json(['success' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category  = Category::find($id);

        // dd($category);

        $request->validate(
            [
                'category_name' => ['required', 'max:255', 'unique:categories,category_name,'. $category->id ],
            ],
            [
                'category_name.required' => 'Please fill up Category name',
                'category_name.max' => 'Character might be 255 words',
                'category_name.unique' => 'Character might be unique',
            ]
        );

         $category->category_name          = $request->category_name;
         $category->slug                   = Str::slug($request->category_name);
         $category->status                 = $request->status;

         $uploadImages                     = $this->deleteImageAndUpload($request, 'category_img', 'category', $category->category_img );
         $category->category_img           =  $uploadImages;

         $category->save();

         return response()->json(['message'=> "success"],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->category_img) {
            if (file_exists($category->category_img)) {
                unlink($category->category_img);
            }
        }

        $category->delete();

        return response()->json(['message' => 'Category has been deleted.'], 200);
    }

    public function getSubCategories(Request $request, Category $category)
    {
        $subcats= SubCategory::where('category_id', $category->id)->get();

        return response()->json(['message' => 'success', 'data' => $subcats], 200);
    }
}
