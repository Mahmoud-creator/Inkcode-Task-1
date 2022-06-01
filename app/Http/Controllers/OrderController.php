<?php

namespace App\Http\Controllers;

use App\Exports\OrdersExport;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    public function create(){
        return view('create_order');
    }

    public function store(){

        $attributes = request()->validate([
            'name' => 'required',
            'cid' => ['numeric','required', Rule::exists('customers', 'id')],
        ]);

        $order = Order::create([
            'order_name' => $attributes['name'],
            'customer_id' => $attributes['cid'],
            'order_date' => NOW(),
        ]);


        return redirect('/');
    }

    public function edit(Order $order){
        return view('edit_order',[ 'order' => $order]);
    }

    public function update(Order $order){
        $attributes = request()->validate([
            'name' => 'required',
            'cid' => ['numeric','required', Rule::exists('customers', 'id')],
        ]);

        $att = [
            'order_name' => $attributes['name'],
            'customer_id' => $attributes['cid']
        ];

        $order->update($att);
        return redirect('/');
    }

    public function destroy(Order $order){
        $order->delete();
        return redirect('/');
    }

    public function export()
    {
        return Excel::download(new OrdersExport(), 'orders.xlsx');
    }

}
