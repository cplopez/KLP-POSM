<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerSale;
use App\Models\Purchase;


class CustomerSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerSale = CustomerSale::all();

        return view('customersales.index')->with('customerSale', $customerSale);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->input('mop') === 'Cash')
        {
            $this->validate($request, [
                'total_quantity' => 'required',
                'customer_name' => 'required',
                'amount_due' => 'required',
                'discount'=> 'required',
                'cash' => 'required',
                'change' => 'required'
            ]); 
        }
        else {
            $this->validate($request, [
                'total_quantity' => 'required',
                'customer_name' => 'required',
                'amount_due' => 'required',
                'postDate'=> 'required',
                'checkNumber' => 'required',
                'bankName' => 'required',
                'checkAmount' => 'required'
            ]);
        }

        // return $request->input('mop_id');

        $customerSale = new CustomerSale;
        $customerSale->customer_id = $request->input('customer_id');
        $customerSale->m_o_p_id = $request->input('m_o_p_id');
        $customerSale->amount = $request->input('amount_due');
        $customerSale->total_quantity = $request->input('total_quantity');
        $current_date = date('Y-m-d H:i:s');

        // return $current_date;

        if($request->input('mop') === 'Cash'){
            $customerSale->discount = $request->input('discount');
            $customerSale->total_cash = $request->input('cash');
            $customerSale->check_num ="N/A";
            $customerSale->check_date = $current_date;
            $customerSale->bankname = "N/A";
            $customerSale->check_amount = 0;
        }
        else {
            $customerSale->discount = 0;
            $customerSale->total_cash = 0;
            $customerSale->check_num = $request->input('checkNumber');
            $customerSale->check_date = $request->input('postDate');
            $customerSale->bankname = $request->input('bankName');
            $customerSale->check_amount = $request->input('checkAmount');
        }

        $customerSale->save();

        Purchase::query()->truncate();

        return redirect('/purchase')->with('Cash Payment Method Inserted Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customerSale = Customer::find($id);
        return view('customersales.show')->with('customerSale', $customerSale);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customerSale = Customer::find($id);
        return view('customersales.edit')->with('customerSale', $customerSale);
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
        $customer = Customer::find($id);
        $customer->delete();

        return redirect('/customers')->with('success', 'Deleted Successfully!');
    }
}
