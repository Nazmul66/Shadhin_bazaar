<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.brands.index');
    }

    public function getData()
    {
        // get all data
        $brands= Brand::all();

        return DataTables::of($brands)
            ->addColumn('brandImage', function ($brand) {
                return '<img src="'.asset( $brand->image ).'" width="50px" height="50px">';
            })
            ->addColumn('status', function ($brand) {
                if ($brand->status == 1) {
                    return ' <a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$brand->id.'" data-status="'.$brand->status.'"> <i
                            class="fa-solid fa-toggle-on fa-2x"></i>
                    </a>';
                } else {
                    return '<a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$brand->id.'" data-status="'.$brand->status.'"> <i
                            class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                    </a>';
                }
            })

            ->addColumn('action', function ($brand) {
                return '<div class="d-flex gap-3">
                    <a class="btn btn-sm btn-primary" id="editButton" href="javascript:void(0)" data-id="'.$brand->id.'" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></a>

                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" data-id="'.$brand->id.'" id="deleteBtn"> <i class="fas fa-trash"></i></a>
                </div>';
            })

            ->rawColumns(['brandImage', 'status', 'action'])
            ->make(true);
    }

    public function changeBrandStatus(Request $request)
    {
        $id = $request->id;
        $Current_status = $request->status;

        if ($Current_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $page = Brand::findOrFail($id);
        $page->status = $status;
        $page->save();

        return response()->json(['message' => 'success', 'status' => $status, 'id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'image' => ['required'],
                'brand_name' => ['required', 'unique:brands,brand_name', 'max:255'],
                'is_featured' => ['required'],
            ],
            [
                'image.required' => 'Brand logo is required',
                'brand_name.required' => 'Please fill up brand name',
                'brand_name.max' => 'Character might be 255',
                'brand_name.unique' => 'Character might be unique',
                'is_featured.required' => 'Is_featured this field',
            ]
        );

        $brand = new Brand();

        $brand->brand_name             = $request->brand_name;
        $brand->slug                   = Str::slug($request->brand_name);
        $brand->is_featured            = $request->is_featured;
        $brand->status                 = 1;

        if( $request->file('image') ){
            $image = $request->file('image');

            $imageName          = $request->slug . rand(1, 99999999) . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/backend/images/brand/';
            $image->move($imagePath, $imageName);

            $brand->image        =  $imagePath . $imageName;
        }

        // dd($category);
        $brand->save();

        return response()->json(['message'=> "Successfully Brand Created!", 'status' => true]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        // dd($category);
        return response()->json(['success' => $brand]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand  = Brand::find($id);

        $request->validate(
            [
                'brand_name' => ['required', 'unique:brands,brand_name,'. $brand->id , 'max:255'],
            ],
            [
                'brand_name.required' => 'Please fill up brand name',
                'brand_name.max' => 'Character might be 255 word',
                'brand_name.unique' => 'Character might be unique',
            ]
        );

        $brand->brand_name             = $request->brand_name;
        $brand->slug                   = Str::slug($request->brand_name);
        $brand->is_featured            = $request->is_featured;
        $brand->status                 = 1;


        if( $request->file('image') ){
            $image = $request->file('image');

            if ( !is_null($brand->image) && file_exists($brand->image))  {
                unlink($brand->image); // Delete the existing category_img
            }

            $imageName          = $request->slug . rand(1, 99999999) . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/backend/images/brand/';
            $image->move($imagePath, $imageName);

            $brand->image        =  $imagePath . $imageName;
        }

         $brand->save();

         return response()->json(['message'=> "success"],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        if ($brand->image) {
            if (file_exists($brand->image)) {
                unlink($brand->image);
            }
        }
        $brand->delete();

        return response()->json(['message' => 'Brand has been deleted.'], 200);
    }

}
