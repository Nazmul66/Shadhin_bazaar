<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.order.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getData()
    {
        // get all data
        $orders = Order::leftJoin('order_products', 'order_products.id', 'orders.order_id')
                ->leftJoin('transactions', 'transactions.order_id', 'orders.order_id')
                ->leftJoin('users', 'users.id', 'orders.user_id')
                ->select('orders.*', 'order_products.product_name', 'order_products.variants', 'order_products.variant_total', 'order_products.unit_price', 'order_products.qty', 'users.name as cus_name', 'users.email as cus_email', 'users.phone as cus_phone')
                ->get();

        return DataTables::of($orders)
            ->addIndexColumn()
            ->addColumn('order_date', function ($order) {
                $date = date('F d, Y', strtotime($order->created_at));
                return $date;
            })
            ->addColumn('product_qty', function ($order) {
                $qty = $order->product_qty . ' Qty';
                return $qty;
            })
            ->addColumn('total_amount', function ($order) {
                $amount = getSetting()->currency_symbol . $order->total_amount;
                return $amount;
            })
            ->addColumn('payment_status', function ($order) {
                return '
                    <select class="form-select" id="payment_status" data-id="' . $order->id . '">
                        <option value="0" ' . ($order->payment_status == 0 ? 'selected' : '') . '>Pending</option>
                        <option value="1" ' . ($order->payment_status == 1 ? 'selected' : '') . '>Paid</option>
                        <option value="2" ' . ($order->payment_status == 2 ? 'selected' : '') . '>Due</option>
                    </select>
                ';
            })
            ->addColumn('order_status', function ($order) {
                $orderStatuses = config('order_status_data.order_status'); 
                $options = '';
            
                foreach ($orderStatuses as $key => $status) {
                    // Compare values properly to avoid matching issues
                    $selected = (trim($order->order_status) === trim($status['status'])) ? 'selected' : '';
                    $options .= '<option value="' . $key . '" ' . $selected . '>' . ucfirst($status['status']) . '</option>';
                }
            
                return '<select class="form-select" id="order_status" data-id="' . $order->id . '">' . $options . '</select>';
            })
            ->addColumn('action', function ($product) {
                 return '
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Actions <i class="mdi mdi-chevron-down"></i>
                    </button>

                    <div class="dropdown-menu dropdownmenu-primary" style="">
                        <a class="dropdown-item text-info" href="'. route('admin.product.show', $product->id) .'"><i class="fas fa-eye"></i> View</a>

                        <a class="dropdown-item text-primary" href="'. route('admin.product.edit', $product->id) .'"><i class="fas fa-edit"></i> Edit</a>

                        <a class="dropdown-item text-danger" href="javascript:void(0)" data-id="'.$product->id.'" id="deleteBtn">
                            <i class="fas fa-trash"></i> Delete
                        </a>

                        <a class="dropdown-item text-success" href="'. route('admin.product-variant', $product->id) .'" ><i class="bx bx-cog"></i>
                           Product Variants
                        </a>
                    </div>
                </div>';
            })

            ->rawColumns(['order_date', 'status', 'total_amount', 'product_qty', 'order_status', 'payment_status', 'action'])
            ->make(true);
    }


    public function changePaymentStatus(Request $request)
    {
        $id          = $request->id;
        $status      = $request->status;

        $page                   = Order::findOrFail($id);
        $page->payment_status   = $status;
        $page->update();

        return response()->json(['message' => 'success', 'status' => $status]);
    }


    public function changeOrderStatus(Request $request)
    {
        $id          = $request->id;
        $status      = $request->status;

        $page                   = Order::findOrFail($id);
        $page->order_status     = $status;
        $page->update();

        return response()->json(['message' => 'success', 'status' => $status]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
