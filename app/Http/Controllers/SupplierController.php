<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades;

//use Illuminate\Support\Facades\Input;
//use App\Http\Controllers\Input;
//use Illuminate\Http\Request;
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $suppliers = suppliers::all();

        // load the view and pass the sharks
        return view('suppliers.index')
            ->with('suppliers', $suppliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
           'supplier_name' => 'required',
            'supplier_contact' => 'required',
            'supplier_address' => 'required',
            'email'      => 'required|email',
          //  'shark_level' => 'required|numeric'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->route('suppliers.create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $supplier = new suppliers;
            $supplier->supplier_name = $request->input('supplier_name');
            $supplier->supplier_contact      = $request->input('supplier_contact');
            $supplier->supplier_address      = $request->input('supplier_address');
            $supplier->email      = $request->input('email');
          //  $supplier->shark_level = Input::get('shark_level');
            $supplier->save();

            // redirect
            Session::flash('message', 'Successfully created shark!');
            return redirect()->route('suppliers.index');
        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function show(Suppliers $suppliers)
    {
        //
        $suppliers = suppliers::find($suppliers);

        // show the view and pass the shark to it
        return Redirect()->route('suppliers.show')
            ->with('suppliers', $suppliers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function edit(Suppliers $suppliers)
    {
        $suppliers = suppliers::find($suppliers);

        // show the edit form and pass the shark
        return View::make('suppliers.edit')
            ->with('suppliers', $suppliers);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suppliers $suppliers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suppliers $suppliers)
    {
        //
    }
}
