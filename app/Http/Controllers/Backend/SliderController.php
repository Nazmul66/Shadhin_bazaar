<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use App\Models\Slider;

class SliderController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.slider.index');
    }

    public function getData()
    {
        // get all data
        $sliders= Slider::all();
        
        return DataTables::of($sliders)  
            ->addIndexColumn()   
            ->addColumn('slider_image', function ($slider) {    
                return '<img src="'. asset( $slider->slider_image ) .'" width="75px">';
            })
            ->addColumn('type', function ($slider) {
                return '<span class="badge bg-primary">'. $slider->type .'</span>';
            })
            ->addColumn('title', function ($slider) {
                return '<span class="badge bg-primary">'. $slider->title .'</span>';
            })
            ->addColumn('btn_url', function ($slider) {
                return '<span class="badge bg-info">'. $slider->btn_url .'</span>';
            })
            ->addColumn('starting_price', function ($slider) {
                return '<span class="badge bg-success">'. $slider->starting_price .' TK</span>';
            })
            ->addColumn('status', function ($slider) {
                if ($slider->status == 1) {
                    return ' <a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$slider->id.'" data-status="'.$slider->status.'"> <i
                            class="fa-solid fa-toggle-on fa-2x"></i>
                    </a>';
                } else {
                    return '<a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$slider->id.'" data-status="'.$slider->status.'"> <i
                            class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                    </a>';
                }
            })
            ->addColumn('action', function ($slider) {
                return '<div class="d-flex gap-3"> 
                    <a class="btn btn-sm btn-primary" id="editButton" href="javascript:void(0)" data-id="'.$slider->id.'" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" data-id="'.$slider->id.'" id="deleteBtn"> <i class="fas fa-trash"></i></a>
                </div>';
            })
            
            ->rawColumns(['slider_image', 'starting_price', 'type', 'btn_url', 'title', 'status','action'])
            ->make(true);
    }

    public function changeSliderStatus(Request $request)
    {
        $id = $request->id;
        $Current_status = $request->status;

        if ($Current_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $page = Slider::findOrFail($id);
        $page->status = $status;
        $page->save();

        return response()->json(['message' => 'success', 'status' => $status, 'id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'slider_image' => ['required', 'image', 'max:2000' ],
            'type' => ['string', 'max:200' ],
            'title' => ['required', 'max:200' ],
            'serial' => ['required'],
            'status' => ['required'],
        ]);
        
        $slider = new Slider();

        $slider->type                   = $request->type;
        $slider->title                  = $request->title;
        $slider->starting_price         = $request->starting_price;
        $slider->btn_url                = $request->btn_url;
        $slider->serial                 = $request->serial;
        $slider->status                 = $request->status;
        
        if( $request->file('slider_image') ){
            $images = $request->file('slider_image');

            $imageName          =  rand(1, 99999999) . '.' . $images->getClientOriginalExtension();
            $imagePath          = 'public/backend/images/slider/';
            $images->move($imagePath, $imageName);

            $slider->slider_image        =  $imagePath . $imageName;
        }
        
        // dd($slider);
        $slider->save();
        
        return response()->json(['message'=> "Successfully Slider Created!", 'status' => true]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        // dd($slider);
        return response()->json(['success' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $slider->type                   = $request->type;
        $slider->title                  = $request->title;
        $slider->starting_price         = $request->starting_price;
        $slider->btn_url                = $request->btn_url;
        $slider->serial                 = $request->serial;
        $slider->status                 = $request->status;

        if( $request->file('slider_image') ){
             $images = $request->file('slider_image');

             if ( !is_null($slider->slider_image) && file_exists($slider->slider_image))  {
                 unlink($slider->slider_image); // Delete the existing category_img
             }

             $imageName          = $request->slug . rand(1, 99999999) . '.' . $images->getClientOriginalExtension();
             $imagePath          = 'public/backend/images/slider/';
             $images->move($imagePath, $imageName);

             $slider->slider_image   =  $imagePath . $imageName;
        }

        $slider->save();

        return response()->json(['message'=> "success"],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        if ($slider->slider_image) {
            if (file_exists($slider->slider_image)) {
                unlink($slider->slider_image);
            }
        }
        $slider->delete();
        
        return response()->json(['message' => 'Slider has been deleted.'], 200);
    }
}
