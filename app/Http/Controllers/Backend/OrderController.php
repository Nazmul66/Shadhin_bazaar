<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($status)
    {
        return view('backend.pages.order.index', compact('status'));
    }

    public function getData(Request $request)
    {
        // get all data
        $orders = '';
            $query = Order::leftJoin('order_products', 'order_products.id', 'orders.order_id')
                ->leftJoin('transactions', 'transactions.order_id', 'orders.order_id')
                ->leftJoin('users', 'users.id', 'orders.user_id');

                if( !empty($request->order_status) ){
                    $query->where('order_status', $request->order_status);
                }

                if( !empty($request->payment_status) ){
                    $query->where('payment_status', $request->payment_status);
                }

                if( !empty($request->date_range) ){
                    [$start_date, $end_date] = explode(' to ', $request->date_range);
                    $query->whereBetween('orders.created_at', [$start_date, $end_date]);
                }

            $orders = $query->select('orders.*', 'order_products.product_name', 'order_products.variants', 'order_products.variant_total', 'order_products.unit_price', 'order_products.qty', 'users.name as cus_name', 'users.email as cus_email', 'users.phone as cus_phone')->get();

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
                    $selected = (trim($order->order_status) === trim($key)) ? 'selected' : '';
                    $options .= '<option value="' . $key . '" ' . $selected . '>' . ucfirst($status['status']) . '</option>';
                }
            
                return '<select class="form-select" id="order_status" data-id="' . $order->id . '">' . $options . '</select>';
            })
            ->addColumn('action', function ($order) {
                 return '
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Actions <i class="mdi mdi-chevron-down"></i>
                    </button>

                    <div class="dropdown-menu dropdownmenu-primary" style="">
                        <a class="dropdown-item text-info" href="'. route('admin.order.show', $order->id) .'"><i class="fas fa-eye"></i> Invoice</a>

                        <a class="dropdown-item text-danger" href="javascript:void(0)" data-id="'.$order->id.'" id="deleteBtn">
                            <i class="fas fa-trash"></i> Delete
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
    public function orderShow(string $id)
    {
        $order  = DB::table('orders')
                    ->leftJoin('transactions', 'transactions.order_id', 'orders.order_id')
                    ->where('orders.id', $id)
                    ->select('orders.*', 'transactions.transaction_id')
                    ->first();
                    
        $order_products = OrderProduct::where('order_id', $order->order_id)->get();

        return view('backend.pages.order.order-invoice', compact('order', 'order_products'));
    }

    public function orderDestroy(Order $order)
    {
        // dd($order);
        // Delete all related OrderProduct entries
        foreach (OrderProduct::where('order_id', $order->order_id)->get() as $orderItem) {
            $orderItem->delete();
        }

        // Delete the single Transaction entry related to the order
        Transaction::where('order_id', $order->order_id)->delete();

        // Delete the Order itself
        $order->delete();
        
        return response()->json(['message' => 'Order and its related data have been deleted.'], 200);
    }

    public function order_invoice_pdf($id)
    {
        $data['order']  = DB::table('orders')
            ->leftJoin('transactions', 'transactions.order_id', 'orders.order_id')
            ->where('orders.id', $id)
            ->select('orders.*', 'transactions.transaction_id')
            ->first();
        
        $data['order_products'] = OrderProduct::where('order_id', $data['order']->order_id)->get();

        $pdf = Pdf::loadView('backend.pages.order.invoice_pdf', $data);
        return $pdf->download('invoice.pdf');
    }
}