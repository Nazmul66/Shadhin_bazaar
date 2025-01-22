<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class SubscriptionController extends Controller
{
    public function index()
    {
        return view('backend.pages.subscriber.index');
    }

    public function getData()
    {
        // get all data
        $subscribers = NewsletterSubscriber::all();

        return DataTables::of($subscribers)
            ->addIndexColumn()
            ->addColumn('email', function ($customer) {
                if( !empty($customer->email) ){
                    $email = '<a href="mailto:'. $customer->email .'" target="_blank" style="text-decoration: underline !important; color: green;">'. $customer->email .'</a>';
                }
                else{
                    $email = '<a href="javascript:void();" class="text-danger">N/A</a>';
                }
                return $email;
            })
            ->addColumn('is_verify', function ($subscriber) {
                if ($subscriber->is_verified == 1) {
                    return '<button type="button" class="btn btn-success btn-rounded waves-effect waves-light">Verify</button>';
                } else {
                    return '<button type="button" class="btn btn-danger btn-rounded waves-effect waves-light">Not Verify</button>';
                }
            })
            ->addColumn('action', function ($subscriber) {
                return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Actions <i class="mdi mdi-chevron-down"></i>
                        </button>

                        <div class="dropdown-menu dropdownmenu-primary" style="">
                            <a class="dropdown-item text-danger" href="javascript:void(0)" data-id="'.$subscriber->id.'" id="deleteBtn">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </div>
                    </div>';
            })

            ->rawColumns(['is_verify', 'email', 'action'])
            ->make(true);
    }

    public function destroy($id)
    {
        NewsletterSubscriber::where('id', $id)->delete();
        return response()->json(['message' => 'Subscriber has been deleted.'], 200);
    }
}
