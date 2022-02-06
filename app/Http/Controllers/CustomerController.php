<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
        $customers = new Customer;
        $customers = $customers->all();

        return view('customer.index', compact('customers'));

        //$customers = Customer::all();

        //return view('customer.index', compact('customers'));
    }

    public function create() {
        return view('customer.create');
    }

    public function store() {
        $data = request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'address' => 'required',
        ]);

        Customer::create($data);

        return redirect('/customers');
    }
}
