<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Traits\ImageUploadTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    use ImageUploadTraits;

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
                return '<a href="'. asset( $slider->slider_image ) .'" target="__blank">
                     <img src="'. asset( $slider->slider_image ) .'" width="75px">
                    </a>';
            })
            ->addColumn('type', function ($slider) {
                if( !is_null($slider->type) ){
                    return '<span class="badge bg-primary">'. $slider->type .'</span>';
                }
                else{
                    return '<span class="badge bg-primary">N/A</span>';
                }
            })
            ->addColumn('title', function ($slider) {
                return '<span class="badge bg-primary">'. $slider->title .'</span>';
            })
            ->addColumn('btn_url', function ($slider) {
                if( !is_null($slider->starting_price) ){
                     return '<span class="badge bg-info">'. $slider->btn_url .'</span>';
                }
                else{
                    return '<span class="badge bg-info">N/A</span>';
                }
            })
            ->addColumn('starting_price', function ($slider) {
                if( !is_null($slider->starting_price) ){
                    return '<span class="badge bg-success">'. $slider->starting_price .' TK</span>';
                }
                else{
                    return '<span class="badge bg-success">N/A</span>';
                }
            })
            ->addColumn('serial', function ($slider) {
                if( !is_null($slider->serial) ){
                    return '<span class="badge bg-success">'. $slider->serial .' TK</span>';
                }
                else{
                    return '<span class="badge bg-success">N/A</span>';
                }
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

            ->rawColumns(['slider_image', 'starting_price', 'serial', 'type', 'btn_url', 'title', 'status','action'])
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
        $request->validate(
            [
                'title' => ['required', 'unique:sliders,title', 'max:200' ],
                'slider_image' => ['required', 'image' ],
            ],
            [
                'title.required' => 'Please fill up title name',
                'title.max' => 'Character might be 255 words',
                'slider_image.required' => 'Slider image required',
            ]
        );

        DB::beginTransaction();
        try {
            $slider = new Slider();

            $slider->type                   = $request->type;
            $slider->title                  = $request->title;
            $slider->starting_price         = $request->starting_price;
            $slider->btn_url                = $request->btn_url;
            $slider->serial                 = Slider::max($request->serial) ? Slider::max($request->serial) + 1 : 1;
            $slider->status                 = 1;

            // Handle image with ImageUploadTraits function
            $uploadImage                    = $this->imageUpload($request, 'slider_image', 'slider');
            $slider->slider_image           =  $uploadImage;

            // dd($slider);
            $slider->save();
        }
        catch(\Exception $ex){
            DB::rollBack();
            throw $ex;
            // dd($ex->getMessage());
        }

        DB::commit();
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
    public function update(Request $request, string $id)
    {
        $slider =  Slider::find($id);

        $request->validate(
            [
                'title' => ['required', 'unique:sliders,title,'. $slider->id, 'max:200' ],
                'serial' => ['unique:sliders,serial,'. $slider->id ],
            ],
            [
                'title.required' => 'Please fill up title name',
                'title.max' => 'Character might be 255 words',
            ]
        );

        DB::beginTransaction();
        try {
            $slider->type                       = $request->type;
            $slider->title                      = $request->title;
            $slider->starting_price             = $request->starting_price;
            $slider->btn_url                    = $request->btn_url;
            $slider->serial                     = $request->serial;
            $slider->status                     = 1;

            // Handle image with ImageUploadTraits function
            $uploadImages                       = $this->deleteImageAndUpload($request, 'slider_image', 'slider', $slider->slider_image );
            $slider->slider_image               =  $uploadImages;

            $slider->save();
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
