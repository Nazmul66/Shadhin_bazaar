<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Traits\ImageUploadTraits;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller 
{

    use ImageUploadTraits;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.categories.index');
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

    public function changeCategoryStatus(Request $request)
    {
        $id = $request->id;
        $Current_status = $request->status;

        if ($Current_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $page = Category::findOrFail($id);
        $page->status = $status;
        $page->save();

        //Debugged this code --> return response()->json(['message' => 'success', 'status' => $status, 'id' => $id]);
        return response()->json(['message' => 'success', 'status' => $status, 'id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'category_name' => ['required', 'unique:categories,category_name', 'max:255'],
                'category_img' => ['required', 'image'],
                'status' => ['required'],
            ],
            [
                'category_name.required' => 'Please fill up Category name',
                'category_name.max' => 'Character might be 255 word',
                'category_name.unique' => 'Character might be unique',
                'category_img.required' => 'Category Image is required',
                'status.required' => 'status is required',
            ]
        );


        $category = new Category();

        $category->category_name          = $request->category_name;
        $category->slug                   = Str::slug($request->category_name);
        $category->status                 = $request->status;

        // Handle image with ImageUploadTraits function
        $uploadImage                      = $this->imageUpload($request, 'category_img', 'category');
        $category->category_img           =  $uploadImage;

        // dd($category);
        $category->save();

        return response()->json(['message'=> "Successfully Category Created!", 'status' => true]);
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

        // Handle image with ImageUploadTraits function
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
