<?php

namespace App\Http\Controllers\Apps;

use Inertia\Inertia;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class CustomerController extends Controller implements HasMiddleware
{
    /**
     * middleware
     *
     * @return array
     */
    public static function middleware(): array
    {
        return [
            new Middleware(['permission:customers.index'], only: ['index']),
            new Middleware(['permission:customers.create'], only: ['create', 'store']),
            new Middleware(['permission:customers.edit'], only: ['edit', 'update']),
            new Middleware(['permission:customers.delete'], only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get customers
        $customers = Customer::when(request()->q, function ($customers) {
            $customers = $customers->where('name', 'like', '%' . request()->q . '%');
        })->latest()->paginate(5);

        //return inertia
        return Inertia::render('Apps/Customers/Index', [
            'customers' => $customers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Apps/Customers/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * validate
         */
        $request->validate([
            'name'      => 'required',
            'no_hp'   => 'required|unique:customers',
            'address'   => 'required',
        ]);

        //create customer
        Customer::create([
            'name'      => $request->name,
            'no_hp'   => $request->no_hp,
            'address'   => $request->address,
        ]);

        //redirect
        return redirect()->route('apps.customers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return Inertia::render('Apps/Customers/Edit', [
            'customer' => $customer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        /**
         * validate
         */
        $request->validate([
            'name'      => 'required',
            'no_hp'   => 'required|unique:customers,no_telp,' . $customer->id,
            'address'   => 'required',
        ]);

        //update customer
        $customer->update([
            'name'      => $request->name,
            'no_hp'   => $request->no_hp,
            'address'   => $request->address,
        ]);

        //redirect
        return redirect()->route('apps.customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find customer by ID
        $customer = Customer::findOrFail($id);

        //delete customer
        $customer->delete();

        //redirect
        return redirect()->route('apps.customers.index');
    }
}
