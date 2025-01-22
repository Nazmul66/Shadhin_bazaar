<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.faq.index');
    }

    public function getData()
    {
        // get all data
        $faqs = Faq::all();

        return DataTables::of($faqs)
            ->addIndexColumn()
            ->addColumn('status', function ($faq) {
                if ($faq->status == 1) {
                    return ' <a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$faq->id.'" data-status="'.$faq->status.'"> <i
                            class="fa-solid fa-toggle-on fa-2x"></i>
                    </a>';
                } else {
                    return '<a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$faq->id.'" data-status="'.$faq->status.'"> <i
                            class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                    </a>';
                }
            })

            ->addColumn('action', function ($faq) {
                return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Actions <i class="mdi mdi-chevron-down"></i>
                        </button>

                        <div class="dropdown-menu dropdownmenu-primary" style="">
                            <a class="dropdown-item text-info" id="viewButton" href="javascript:void(0)" data-id="'.$faq->id.'" data-bs-toggle="modal" data-bs-target="#viewModal">
                                <i class="fas fa-eye"></i> View
                            </a>

                            <a class="dropdown-item text-success" id="editButton" href="javascript:void(0)" data-id="'.$faq->id.'" data-bs-toggle="modal" data-bs-target="#editModal">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <a class="dropdown-item text-danger" href="javascript:void(0)" data-id="'.$faq->id.'" id="deleteBtn">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </div>
                    </div>';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public function changeFaqStatus(Request $request)
    {
        $id = $request->id;
        $Current_status = $request->status;

        if ($Current_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $page = Faq::findOrFail($id);
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
            'question'  => ['required', 'unique:faqs,question'],
            'answer'    => ['required'],
        ]);

        DB::beginTransaction();
        try {
            $faq = new Faq();
            $faq->question          = $request->question;
            $faq->answer            = $request->answer;
            $faq->status            = $request->status;
            $faq->save();
        }
        catch(\Exception $ex){
            DB::rollBack();
            throw $ex;
            // dd($ex->getMessage());
        }

        DB::commit();
        return response()->json(['message'=> "Successfully Faq Created!", 'status' => true]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        // dd($faq);
        return response()->json(['success' => $faq]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $faq  = Faq::find($id);
        $request->validate([
            'question'  => ['required', 'unique:faqs,question,' . $faq->id],
            'answer'    => ['required'],
        ]);

        DB::beginTransaction();
        try {
            $faq->question          = $request->question;
            $faq->answer            = $request->answer;
            $faq->status            = $request->status;
            $faq->save();
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
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return response()->json(['message' => 'Faq has been deleted.'], 200);
    }


    public function faqView($id)
    {
        $faq  = Faq::find($id);
        // dd($faq);

        $statusHtml = '';
        if ($faq->status === 1) {
            $statusHtml = '<span class="text-success">Active</span>';
        } else {
            $statusHtml = '<span class="text-danger">Inactive</span>';
        }

        $created_date = date('d F, Y H:i:s A', strtotime($faq->created_at));
        $updated_date = date('d F, Y H:i:s A', strtotime($faq->updated_at));

        return response()->json([
            'success'           => $faq,
            'statusHtml'        => $statusHtml,
            'created_date'      => $created_date,
            'updated_date'      => $updated_date,
        ]);
    }
}
