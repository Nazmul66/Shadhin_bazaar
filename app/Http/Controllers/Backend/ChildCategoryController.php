<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Traits\ImageUploadTraits;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ChildCategory;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class ChildCategoryController extends Controller
{
    use ImageUploadTraits;

     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $subCategories = Subcategory::where('status', 1)->get();
        // dd($categories);
        return view('backend.pages.childCategories.index', compact('categories', 'subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getData()
    {
        // get all data
        $childCategories= ChildCategory::join('categories', 'child_categories.category_id', '=', 'categories.id')
                ->join('subcategories', 'child_categories.subCategory_id', '=', 'subcategories.id')
                ->select('categories.category_name', 'subcategories.subcategory_name', 'child_categories.name', 'child_categories.*')
                ->get();

        return DataTables::of($childCategories)

        ->addColumn('childCategoryImg', function ($childCategory) {
            return '<img src="'.asset( $childCategory->img ).'" width="50px" height="50px">';
        })

        ->addColumn('status', function ($childCategory) {
            if ($childCategory->status == 1) {
                return ' <a class="status" id="status" href="javascript:void(0)"
                    data-id="'.$childCategory->id.'" data-status="'.$childCategory->status.'"> <i
                        class="fa-solid fa-toggle-on fa-2x"></i>
                </a>';
            } else {
                return '<a class="status" id="status" href="javascript:void(0)"
                    data-id="'.$childCategory->id.'" data-status="'.$childCategory->status.'"> <i
                        class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                </a>';
            }
        })

        ->addColumn('action', function ($childCategory) {
            return '<div class="d-flex gap-3">
                <a class="btn btn-sm btn-primary" id="editButton" href="javascript:void(0)" data-id="'.$childCategory->id.'" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></a>

                <a class="btn btn-sm btn-danger" href="javascript:void(0)" data-id="'.$childCategory->id.'" id="deleteBtn"> <i class="fas fa-trash"></i></a>
            </div>';
        })

        ->rawColumns(['childCategoryImg','status','action'])
        ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'category_id' => ['required'],
                'subCategory_id' => ['required'],
                'name' => ['required', 'unique:child_categories', 'max:255'],
                'img' => ['required', 'image'],
                'status' => ['required'],
            ],
            [
                'category_id.required' => 'Please select category name',
                'subCategory_id.required' => 'Please select subCategory name',
                'name.required' => 'Please fill up childCategory name',
                'name.max' => 'Character might be 255 word',
                'name.unique' => 'Character might be unique',
                'img.required' => 'Image is required',
                'status.required' => 'status is required',
            ]
        );

        $childCategory = new ChildCategory();

        $childCategory->category_id            = $request->category_id;
        $childCategory->subCategory_id         = $request->subCategory_id;
        $childCategory->name                   = $request->name;
        $childCategory->slug                   = Str::slug($request->name);
        $childCategory->status                 = $request->status;

        $uploadImage                           = $this->imageUpload($request, 'img', 'childCategory');
        $childCategory->img                    =  $uploadImage;

        // dd($childCategory);
        $childCategory->save();

        return response()->json(['message'=> "Successfully ChildCategory Created!", 'status' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function changeChildCategoryStatus(Request $request)
    {
        $id = $request->id;
        $Current_status = $request->status;

        if ($Current_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $page = ChildCategory::findOrFail($id);
        $page->status = $status;
        $page->save();

        //Debugged this code --> return response()->json(['message' => 'success', 'status' => $status, 'id' => $id]);
        return response()->json(['message' => 'success', 'status' => $status, 'id' => $id]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChildCategory $childCategory)
    {
        // dd($childCategory);
        return response()->json(['success' => $childCategory]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $childCategory = ChildCategory::find($id);

        $request->validate(
            [
                'name' => ['required', 'max:255', 'unique:child_categories,name,'. $childCategory->id ],
            ],
            [
                'name.required' => 'Please fill up childCategory name',
                'name.max' => 'Character might be 255 word',
                'name.unique' => 'Character might be unique',
            ]
        );

        $childCategory->category_id            = $request->category_id;
        $childCategory->subCategory_id         = $request->subCategory_id;
        $childCategory->name                   = $request->name;
        $childCategory->slug                   = Str::slug($request->name);
        $childCategory->status                 = $request->status;

        $uploadImages                          = $this->deleteImageAndUpload($request, 'img', 'childCategory', $childCategory->img );
        $childCategory->img                    =  $uploadImages;

        $childCategory->save();

        return response()->json(['message'=> "success"],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChildCategory $childCategory)
    {
        if ($childCategory->img) {
            if (file_exists($childCategory->img)) {
                unlink($childCategory->img);
            }
        }
        $childCategory->delete();

        return response()->json(['message' => 'ChildCategory has been deleted.'], 200);
    }
}
