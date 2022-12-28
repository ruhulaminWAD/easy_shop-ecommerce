<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Auth;
use Session;
use DB;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('role');
    }
    // Pending Orders 
    public function pendingOrders()
    {
        $orders = Order::where('status','pending')->orderBy('id','DESC')->get();
		return view('backend.orders.pending_orders',compact('orders'));
    } // Emd Method

    // Pending Order Details 
    public function PendingOrdersDetails($order_id)
    {
        $order = Order::where('id',$order_id)->first();
    	$orderItem = OrderItem::where('order_id',$order_id)->orderBy('id','DESC')->get();
    	return view('backend.orders.pending_order_details',compact('order','orderItem'));
    } // Emd Method

    // Confirmd Orders
    public function confirmedOrders()
    {
        $orders = Order::where('status','confirmd')->orderBy('id','DESC')->get();
		return view('backend.orders.confirmd_orders',compact('orders'));
    } // Emd Method

    // processing Orders
    public function processingOrders()
    {
        $orders = Order::where('status','processing')->orderBy('id','DESC')->get();
		return view('backend.orders.processing_orders',compact('orders'));
    } // Emd Method

    // picked Orders
    public function pickedOrders()
    {
        $orders = Order::where('status','picked')->orderBy('id','DESC')->get();
		return view('backend.orders.picked_orders',compact('orders'));
    } // Emd Method

    // shipped Orders
    public function shippedOrders()
    {
        $orders = Order::where('status','shipped')->orderBy('id','DESC')->get();
		return view('backend.orders.shipped_orders',compact('orders'));
    } // Emd Method

    // delivered Orders
    public function deliveredOrders()
    {
        $orders = Order::where('status','delivere')->orderBy('id','DESC')->get();
		return view('backend.orders.delivered_orders',compact('orders'));
    } // Emd Method

    // cancel Orders
    public function cancelOrders()
    {
        $orders = Order::where('status','cancel')->orderBy('id','DESC')->get();
		return view('backend.orders.cancel_orders',compact('orders'));
    } // Emd Method

    // ====================Update Status====================
    // PendingToConfirm Orders
    public function PendingToConfirm($order_id)
    {
        Order::findOrFail($order_id)->update(['status' => 'confirmd']);

        Session::flash('success', 'Order Confirm Successfully');
        return redirect()->route('pendingOrders');
        
    } // Emd Method

    // confirmToProcessing Orders
    public function confirmToProcessing($order_id)
    {
        Order::findOrFail($order_id)->update(['status' => 'processing']);

        Session::flash('success', 'Order Processing Successfully');
        return redirect()->route('confirmedOrders');
        
    } // Emd Method

    // processingToPicked Orders
    public function processingToPicked($order_id)
    {
        Order::findOrFail($order_id)->update(['status' => 'picked']);

        Session::flash('success', 'Order Picked Successfully');
        return redirect()->route('processingOrders');
        
    } // Emd Method

    // pickedToShipped Orders
    public function pickedToShipped($order_id)
    {
        Order::findOrFail($order_id)->update(['status' => 'shipped']);

        Session::flash('success', 'Order Shipped Successfully');
        return redirect()->route('pickedOrders');
        
    } // Emd Method

    // shippedToDelivere Orders
    public function shippedToDelivere($order_id)
    {
        $products = OrderItem::where('order_id', $order_id)->get();
        foreach ($products as $product) {
            Product::where('id', $product->product_id)->update([
                'product_qty' => DB::raw('product_qty-'.$product->qty)
            ]);
        }

        Order::findOrFail($order_id)->update(['status' => 'delivere']);

        Session::flash('success', 'Order Delivere Successfully');
        return redirect()->route('shippedOrders');
        
    } // Emd Method

    // AdminInvoiceDownload Orders
    public function AdminInvoiceDownload($order_id)
    {
        $order = Order::where('id',$order_id)->first();
    	$orderItem = OrderItem::where('order_id',$order_id)->orderBy('id','DESC')->get();

        $pdf = Pdf::loadView('backend.orders.order_invoice',compact('order','orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
			'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
        
    } // Emd Method





    public function ReturnRequest()
    {
        $orders = Order::where('return_order', 1)->orderBy('id','DESC')->get();
		return view('backend.orders.return_request',compact('orders'));
    } // Emd Method

    public function ReturnRequestApprove($id)
    {
        Order::where('id', $id)->update(['return_order' => 2]);
        Session::flash('success', 'Return Order Successfully');
        return redirect()->back();
    } // Emd Method

    public function ReturnAllRequest()
    {
        $orders = Order::where('return_order', 2)->orderBy('id','DESC')->get();
		return view('backend.orders.all_return_request',compact('orders'));
    } // Emd Method

    

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
