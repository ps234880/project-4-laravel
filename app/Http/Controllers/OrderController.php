<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Orderstatus;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct(){
        $this->middleware('role:customer|admin|employee');    
    }

    public function index()
    {
        $orders = Order::all();
        $users = User::all();
        $orderlines = OrderLine::all();
        return view('orders.index', compact('users', 'orders', 'orderlines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pizzas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('pizza_id'))
        {
            $this->validate($request, [
                'order_id',
                'pizza_id',
                'size_id',
                'amount',
            ]);
            OrderLine::create($request->only(['order_id', 'pizza_id', 'size_id', 'amount']));
            return redirect('orders');
        }

        if ($request->has('user_id'))
        {
            $this->validate($request, [
                'user_id' => 'required',
                'orderstatus_id' => 'required',
            ]);
            Order::create($request->only([
                'user_id', 
                'orderstatus_id',
            ]));
            Order::destroy($request->get('order_id'));
            return redirect('orders');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $user = User::find($id);
        $orderstatuses = Orderstatus::all();
        return view('orders.edit', compact('user', 'order', 'orderstatuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'orderstatus_id' => 'required',
        ]);
        Order::find($id)->update($request->only(['orderstatus_id']));
        return redirect('orders')->with('success', 'Orderstatus updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'orderstatus_id' => 'required',
        ]);
        Order::create($request->only([
            'user_id', 
            'orderstatus_id',
        ]));

        Order::destroy($id);
        return redirect('orders');
    }
}
