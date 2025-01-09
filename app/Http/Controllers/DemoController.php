<?php

namespace App\Http\Controllers;

 use App\Models\MongoUser;
use Illuminate\Http\Request;
use App\Models\MetaTag;

class DemoController extends Controller
{
    public function index()
    {
        $meta_tag = MetaTag::where('page', 'demo')->first();
        return view('demo', compact('meta_tag'));
    }

    public function store(Request $request)
    {
         $validated = $request->validate([
            'company' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required', 'regex:/^\+1\(\d{3}\)\d{3}-\d{4}$/',
            'billing_address' => 'required|string',
            'billing_email' => 'required|email',
            'billing_phone' => 'required|numeric',
            'estimated_quotes_demo' => 'required|numeric',
        ]);
        $validated['role'] = 'shipper_demo';
        $validated['status'] = 'inactive';

         $user = MongoUser::create([
            'role' => $validated['role'],
            'status' => $validated['status'],
            'company' => $validated['company'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'billing_address' => $validated['billing_address'],
            'billing_email' => $validated['billing_email'],
            'billing_phone' => $validated['billing_phone'],
            'estimated_quotes_demo' => $validated['estimated_quotes_demo'],
        ]);

        return redirect()->back()->with('success', 'Data saved successfully!');
    }


}
