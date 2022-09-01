<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all(['id','name','address','phone_number']);
        return response()->json($customers);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $customer = Customer::create($request->post());
        return response()->json([           
            'customer'=>$customer
        ]);
    }
    public function show(Customer $customer)
    {
        return response()->json($customer);
    }
    public function edit(Customer $customer)
    {
        //
    }
    public function update(Request $request, Customer $customer)
    {
        $customer->fill($request->post())->save();
        return response()->json([            
            'customer'=>$customer
        ]);
    }
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json([
            'mensaje'=>'¡Registro eliminado correctamente!'
        ]);
    }
}
