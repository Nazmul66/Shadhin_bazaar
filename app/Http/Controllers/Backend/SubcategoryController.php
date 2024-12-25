<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateSubCategoryRequest;
use App\Http\Requests\Admin\UpdateSubCategoryRequest;
use App\Traits\ImageUploadTraits;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class SubcategoryController extends Controller
{
    use ImageUploadTraits;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        // dd($categories);
        return view('backend.pages.subcategories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getData()
    {
        // get all data
        $subCategories= Category::join('subcategories', 'subcategories.category_id', '=', 'categories.id')
                ->select('categories.category_name', 'subcategories.*')
                ->get();

        return DataTables::of($subCategories)

            ->addIndexColumn()
            ->addColumn('subCategoryImg', function ($subCategory) {
                return '<a href="'.asset( $subCategory->subcategory_img ).'" target="__blank">
                    <img src="'.asset( $subCategory->subcategory_img ).'" width="50px" height="50px">
                </a>';
            })

            ->addColumn('status', function ($subCategory) {
                if ($subCategory->status == 1) {
                    return ' <a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$subCategory->id.'" data-status="'.$subCategory->status.'"> <i
                            class="fa-solid fa-toggle-on fa-2x"></i>
                    </a>';
                } else {
                    return '<a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$subCategory->id.'" data-status="'.$subCategory->status.'"> <i
                            class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                    </a>';
                }
            })

            ->addColumn('action', function ($subCategory) {
                return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Actions <i class="mdi mdi-chevron-down"></i>
                        </button>

                        <div class="dropdown-menu dropdownmenu-primary" style="">
                            <a class="dropdown-item text-info" id="viewButton" href="javascript:void(0)" data-id="'.$subCategory->id.'" data-bs-toggle="modal" data-bs-target="#viewModal">
                                <i class="fas fa-eye"></i> View
                            </a>

                            <a class="dropdown-item text-success" id="editButton" href="javascript:void(0)" data-id="'.$subCategory->id.'" data-bs-toggle="modal" data-bs-target="#editModal">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <a class="dropdown-item text-danger" href="javascript:void(0)" data-id="'.$subCategory->id.'" id="deleteBtn">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </div>
                    </div>';
            })

            ->rawColumns(['subCategoryImg','status','action'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSubCategoryRequest $request)
    {

        DB::beginTransaction();
        try {
            $SubCategory = new Subcategory();

            $SubCategory->category_id            = $request->category_id;
            $SubCategory->subcategory_name       = $request->subcategory_name;
            $SubCategory->slug                   = Str::slug($request->subcategory_name);
            $SubCategory->status                 = $request->status;

            // Handle image with ImageUploadTraits function
            $uploadImage                         = $this->imageUpload($request, 'subcategory_img', 'subCategory');
            $SubCategory->subcategory_img        =  $uploadImage;

            // dd($SubCategory);
            $SubCategory->save();

        }
        catch(\Exception $ex){
            DB::rollBack();
            throw $ex;
            // dd($ex->getMessage());
        }

        DB::commit();
        return response()->json(['message'=> "Successfully SubCategory Created!", 'status' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function changeSubCategoryStatus(Request $request)
    {
        $id = $request->id;
        $Current_status = $request->status;

        if ($Current_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $page = Subcategory::findOrFail($id);
        $page->status = $status;
        $page->save();

        //Debugged this code --> return response()->json(['message' => 'success', 'status' => $status, 'id' => $id]);
        return response()->json(['message' => 'success', 'status' => $status, 'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        // dd($subcategory);
        return response()->json(['success' => $subcategory]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubCategoryRequest $request, string $id)
    {
        $subcategory  = Subcategory::find($id);

        DB::beginTransaction();
        try {
            $subcategory->category_id            = $request->category_id;
            $subcategory->subcategory_name       = $request->subcategory_name;
            $subcategory->slug                   = Str::slug($request->subcategory_name);
            $subcategory->status                 = $request->status;

            // Handle image with ImageUploadTraits function
            $uploadImages                        = $this->deleteImageAndUpload($request, 'subcategory_img', 'subCategory', $subcategory->subcategory_img );
            $subcategory->subcategory_img        =  $uploadImages;

            $subcategory->save();

        }
        catch(\Exception $ex){
            DB::rollBack();
            throw $ex;
            // dd($ex->getMessage());
        }

        DB::commit();

        return response()->json(['message'=> "success"],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        if ($subcategory->subcategory_img) {
            if (file_exists($subcategory->subcategory_img)) {
                unlink($subcategory->subcategory_img);
            }
        }
        $subcategory->delete();

        return response()->json(['message' => 'SubCategory has been deleted.'], 200);
    }

    
    public function subCategoryView($id)
    {
        $subcategory  =  
                    Category::join('subcategories', 'subcategories.category_id', '=', 'categories.id')
                    ->select('categories.category_name', 'subcategories.*')
                    ->where('subcategories.id', $id)
                    ->first();
        // dd($subcategory);

        $statusHtml = '';
        if ($subcategory->status === 1) {
            $statusHtml = '<span class="text-success">Active</span>';
        } else {
            $statusHtml = '<span class="text-danger">Inactive</span>';
        }

        return response()->json([
            'success'           => $subcategory,
            'statusHtml'        => $statusHtml,
        ]);
    }
}
