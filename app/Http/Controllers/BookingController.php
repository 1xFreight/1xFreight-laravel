<?php

namespace App\Http\Controllers;

use App\Models\MongoUser;
use Illuminate\Http\Request;
use Stripe\Coupon;
use Stripe\Price;
use Stripe\Product;
use Stripe\Stripe;

class BookingController extends Controller
{
    public function index()
    {
        $page = 'booking';
        $users = MongoUser::where('role', 'shipper_demo')
            ->where('status', 'inactive')
            ->get();

        return view('dashboard.book-demo', compact('users', 'page'));
    }

    public function show($id)
    {
        $page = 'booking';
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $products = Product::all();
        $prices = Price::all();
        $coupons = Coupon::all();
        $user = MongoUser::where('role', 'shipper_demo')
            ->where('status', 'inactive')
            ->findOrFail($id);

        return view('dashboard.booking-details', compact('user', 'page', 'products', 'prices', 'coupons'));
    }

    public function show2()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $products = Product::all();
        $prices = Price::all();
        $coupons = Coupon::all();
        return view('booking.details', compact('products', 'prices', 'coupons'));
    }

    //Create book
    public function createBook()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $products = Product::all();
        $prices = Price::all();
        $coupons = Coupon::all();
        return view('dashboard.create.book-demo', compact('products', 'prices', 'coupons'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
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

        return redirect()->route('dashboard.booking')->with('success', 'Data saved successfully!');
    }


    //Editare book
    public function edit($id)
    {
        $page = 'booking';
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $products = Product::all();
        $prices = Price::all();
        $coupons = Coupon::all();
        $user = MongoUser::findOrFail($id);

        return view('dashboard.edit.edit-book-demo', compact('user', 'page', 'products', 'prices', 'coupons'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'company' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'billing_address' => 'required|string',
            'billing_email' => 'required|email',
            'billing_phone' => 'required|numeric',
            'estimated_quotes_demo' => 'required|numeric',
        ]);

        $user = MongoUser::findOrFail($id);
        $user->update($validated);

        return redirect()->route('dashboard.booking')->with('success', 'User updated successfully!');
    }


    //Delete
    public function destroy($id)
    {
        $user = MongoUser::findOrFail($id);
        $user->delete();

        return redirect()->route('dashboard.booking')->with('success', 'User deleted successfully!');
    }


}
