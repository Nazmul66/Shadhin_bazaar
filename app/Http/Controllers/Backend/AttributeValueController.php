<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AttributeName;
use App\Models\AttributeValue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class AttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attrNames = AttributeName::where('status', 1)->get();
        return view('backend.pages.attribute.attribute_values', compact('attrNames'));
    }

    public function getData()
    {
        // get all data
        $attrValues = AttributeValue::
                        leftJoin('attribute_names', 'attribute_names.name', 'attribute_values.attribute_name')
                        ->select('attribute_values.*', "attribute_names.name as attr_name")
                        ->get();

        return DataTables::of($attrValues)
            ->addColumn('name', function ($attrValue) {
                return '<span class="btn btn-info">'. $attrValue->attr_name .'</span>';
            })
            ->addColumn('value', function ($attrValue) {
                return '<span class="btn btn-success">'. $attrValue->attribute_value .'</span>';
            })
            ->addColumn('status', function ($attrName) {
                if ($attrName->status == 1) {
                    return ' <a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$attrName->id.'" data-status="'.$attrName->status.'"> <i
                            class="fa-solid fa-toggle-on fa-2x"></i>
                    </a>';
                } else {
                    return '<a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$attrName->id.'" data-status="'.$attrName->status.'"> <i
                            class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                    </a>';
                }
            })

            ->addColumn('action', function ($attrName) {
                return '<div class="d-flex gap-3">
                    <a class="btn btn-sm btn-primary" id="editButton" href="javascript:void(0)" data-id="'.$attrName->id.'" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></a>

                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" data-id="'.$attrName->id.'" id="deleteBtn"> <i class="fas fa-trash"></i></a>
                </div>';
            })

            ->rawColumns(['name', 'value', 'status', 'action'])
            ->make(true);
    }

    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $Current_status = $request->status;

        if ($Current_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $page = AttributeValue::findOrFail($id);
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
                'value' => ['required', 'unique:attribute_values,attribute_value', 'max:255'],
                'name' => ['required'],
            ],
            [
                'name.required' => 'The field is required',
                'value.required' => 'Please fill up the value',
                'value.max' => 'Character might be 255 word',
                'value.unique' => 'Character might be unique',
            ]
        );

        DB::beginTransaction();
        try {

            $attributeValue = new AttributeValue();

            $attributeValue->attribute_name         = $request->name;
            $attributeValue->attribute_value	    = Str::title($request->value);
            $attributeValue->status                 = 1;

            // dd($attributeValue);
            $attributeValue->save();
        }
        catch(\Exception $ex){
            DB::rollBack();
            throw $ex;
            // dd($ex->getMessage());
        }

        DB::commit();
        return response()->json(['message'=> "Successfully Attribute Value Created!", 'status' => true]);
    }


    public function edit(AttributeValue $attributeValue)
    {
        // dd($attributeValue);
        return response()->json(['success' => $attributeValue]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $attributeValue  = AttributeValue::find($id);

        // dd($attributeName);

        $request->validate(
            [
                'value' => ['required', 'max:255', 'unique:attribute_names,name,'. $attributeValue->id ],
            ],
            [
                'value.required' => 'Please fill up the value',
                'value.max' => 'Character might be 255 word',
                'value.unique' => 'Character might be unique',
            ]
        );

        DB::beginTransaction();
        try {
            // Handle image with ImageUploadTraits function
            $attributeValue->attribute_name         = $request->name;
            $attributeValue->attribute_value	    = Str::title($request->value);
            $attributeValue->status                 = 1;

            $attributeValue->save();
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
    public function destroy(AttributeValue $attributeValue)
    {
        $attributeValue->delete();

        return response()->json(['message' => 'Attribute Value has been deleted.'], 200);
    }

}
