<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    // Only verified users can get here
    public function __construct()
    {
        $this->middleware('verified');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.index')->withOrders(Order::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::orderBy('last_name')->get();
        $tags = Tag::orderBy('name')->get();
        return view('orders.create', compact('customers', 'tags'))->withOrder(new Order);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = Order::create([
            'customer_id' => $request->customer_id,
            'title' => $request->title,
            'description' => $request->description,
            'cost' => $request->cost,
        ]);

        $order->tags()->sync($request->tag_ids);

        return redirect()->route('orders.edit', $order)->withMessage('Order created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $customers = Customer::orderBy('last_name')->get();
        $tags = Tag::orderBy('name')->get();
        return view('orders.edit', compact('order', 'customers', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->update([
            'customer_id' => $request->customer_id,
            'title' => $request->title,
            'description' => $request->description,
            'cost' => $request->cost,
        ]);

        $order->tags()->sync($request->tag_ids);

        return redirect()->route('orders.edit', $order)->withMessage('Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->withMessage('Order deleted successfully');
    }
}
