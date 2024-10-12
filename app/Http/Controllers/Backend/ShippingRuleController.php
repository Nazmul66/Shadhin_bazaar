<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingRule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ShippingRuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.shipping-rule.index');
    }

    public function getData()
    {
        $shippingRules= ShippingRule::all();
        
        return DataTables::of($shippingRules)
            ->addColumn('name', function ($shippingRule) {
                return '<span class="badge bg-primary">'. $shippingRule->name .'</span>';
            })
            ->addColumn('type', function ($shippingRule) {
                return '<h6 style="white-space: wrap;"><span class="badge bg-success">'. $shippingRule->type .'</span></h6>';
            })
            ->addColumn('min_cost', function ($shippingRule) {
                return '<h6 style="white-space: wrap;">Min Cost: <span class="badge bg-success">'. $shippingRule->min_cost .'</span></h6>';
            })
            ->addColumn('cost', function ($shippingRule) {
                return '<h6 style="white-space: wrap;">Cost: <span class="badge bg-success">'. $shippingRule->cost .'</span></h6>';
            })
            ->addColumn('status', function ($shippingRule) {
                if ($shippingRule->status == 1) {
                    return ' <a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$shippingRule->id.'" data-status="'.$shippingRule->status.'"> <i
                            class="fa-solid fa-toggle-on fa-2x"></i>
                    </a>';
                } else {
                    return '<a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$shippingRule->id.'" data-status="'.$shippingRule->status.'"> <i
                            class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                    </a>';
                }
            })
            ->addColumn('action', function ($coupon) {
                return '<div class="d-flex gap-3"> 
                    <a class="btn btn-sm btn-primary" id="editButton" href="javascript:void(0)" data-id="'.$coupon->id.'" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" data-id="'.$coupon->id.'" id="deleteBtn"> <i class="fas fa-trash"></i></a>
                </div>';
            })
            ->rawColumns(['name', 'type', 'min_cost', 'cost', 'status', 'action'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'unique:shipping_rules,name', 'max:200'],
                'type' => ['required', 'max:200'],
                'cost' => ['required', 'integer'],
            ],
            [
                'name.required' => 'Name is required',
                'name.unique' => 'Character might be unique',
                'name.max' => 'Character should be 200 words',
                'type.required' => 'Type is required',
                'cost.required' => 'Cost is required',
            ]
        );

        $shippingRule = new ShippingRule();

        DB::beginTransaction();
        try {
            $shippingRule->name            = $request->name;
            $shippingRule->type            = $request->type;
            $shippingRule->min_cost        = $request->min_cost ?? 0;
            $shippingRule->cost            = $request->cost;
            $shippingRule->status          = $request->status;
            
            // dd($shippingRule);
            $shippingRule->save();
        }
        catch(\Exception $ex){
            DB::rollBack();
            throw $ex;
            // dd($ex->getMessage());
        }

        DB::commit();        
        return response()->json(['message'=> "Successfully Shipping Rule Created!", 'status' => true]);
    }

    public function changeShippingRuleStatus(Request $request)
    {
        $id = $request->id;
        $Current_status = $request->status;

        if ($Current_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $page = ShippingRule::findOrFail($id);
        $page->status = $status;
        $page->save();

        return response()->json(['message' => 'success', 'status' => $status, 'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShippingRule $shippingRule)
    {
        // dd($shippingRule);
        return response()->json(['success' => $shippingRule]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShippingRule $shippingRule)
    {

        $request->validate(
            [
                'name' => ['required', 'unique:shipping_rules,name,'. $shippingRule->id, 'max:200'],
                'type' => ['required', 'max:200'],
                'cost' => ['required', 'integer'],
            ],
            [
                'name.required' => 'Name is required',
                'name.unique' => 'Character might be unique',
                'name.max' => 'Character should be 200 words',
                'type.required' => 'Type is required',
                'cost.required' => 'Cost is required',
            ]
        );
    
        DB::beginTransaction();
        try {
            $shippingRule->name            = $request->name;
            $shippingRule->type            = $request->type;
            $shippingRule->min_cost        = $request->min_cost;
            $shippingRule->cost            = $request->cost;
            $shippingRule->status          = $request->status;
            
            $shippingRule->save();
        }
        catch(\Exception $ex){
            DB::rollBack();
            throw $ex;
            // dd($ex->getMessage());
        }
        DB::commit();        
        return response()->json(['message'=> "Successfully Shipping Rule Updated!", 'status' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShippingRule $shippingRule)
    {
        $shippingRule->delete();
        return response()->json(['message' => 'Shipping Rule has been deleted.'], 200);
    }
}
