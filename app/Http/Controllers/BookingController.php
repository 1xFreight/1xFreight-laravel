<?php

namespace App\Http\Controllers;

use App\Models\MongoUser;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
        $subscription = Subscription::where('user_id', $user->_id)->first();
        if (!$subscription) {
            $subscription = null;
        }

        return view('dashboard.booking-details', compact('user', 'page', 'products', 'prices', 'coupons', 'subscription'));
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
            'free_trial_days' => 'required|numeric|min:0|max:21',
            'payment_date' => 'nullable|date',
            'subscription' => 'required|string',
            'coupon' => 'nullable|string',
//            'payment_link' => 'nullable|string',
//            'stripe_account_link' => 'nullable|string',
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

        if ($validated['free_trial_days'] >= 0) {
            $payment_date = now()->addDays($validated['free_trial_days']);
        } else {
            $payment_date = now();
        }

        $next_payment = $payment_date->addMonth();

//        $manager = Auth::user();
//        $manager_user_id = $manager->id;
        $manager_user_id = $validated['manager_user_id'] ?? auth()->user()->id;


        $final_price = $validated['subscription'];

        if ($validated['coupon']) {
            $coupon_discount_percent = $this->getCouponDiscount($validated['coupon']);

            $discount_amount = $final_price * ($coupon_discount_percent / 100);

            $final_price = $final_price - $discount_amount;
        }

        Subscription::create([
            'user_id' => $user->_id,
            'free_trial_days' => $validated['free_trial_days'],
            'payment_date' => $payment_date,
            'subscription' => $validated['subscription'],
            'coupon' => $validated['coupon'],
            'subscription_monthly_price' => $final_price,
            'manager_user_id' => $manager_user_id,
//            'payment_link' => $validated['payment_link'],
//            'stripe_account_link' => $validated['stripe_account_link'],
            'next_payment' => $next_payment,
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
        $subscription = Subscription::where('user_id', $user->_id)->first();
        if (!$subscription) {
            $subscription = null;
        }
        return view('dashboard.edit.edit-book-demo', compact('user', 'page', 'products', 'prices', 'coupons', 'subscription'));
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
            'subscription' => 'required|numeric',
            'coupon' => 'nullable|string',
            'free_trial_days' => 'required|numeric|min:0|max:21',
        ]);

        $user = MongoUser::findOrFail($id);
        $user->update($validated);

        if ($validated['free_trial_days'] >= 0) {
            $payment_date = now()->addDays($validated['free_trial_days']);
        } else {
            $payment_date = now();
        }

        $next_payment = $payment_date->addMonth();
        $manager_user_id = $validated['manager_user_id'] ?? auth()->user()->id;


        $final_price = $validated['subscription'];

        if ($validated['coupon']) {
            $coupon_discount_percent = $this->getCouponDiscount($validated['coupon']);
            $discount_amount = $final_price * ($coupon_discount_percent / 100);
            $final_price = $final_price - $discount_amount;
        }

        $subscription = Subscription::where('user_id', $user->_id)->first();
         if ($subscription) {
            $subscription->update([
                'subscription' => $validated['subscription'],
                'subscription_monthly_price' => $final_price,
                'coupon' => $validated['coupon'],
             ]);
        } else {
             Subscription::create([
                 'user_id' => $user->_id,
                 'free_trial_days' => $validated['free_trial_days'],
                 'payment_date' => $payment_date,
                 'subscription' => $validated['subscription'],
                 'coupon' => $validated['coupon'],
                 'subscription_monthly_price' => $final_price,
                 'manager_user_id' => $manager_user_id,
//            'payment_link' => $validated['payment_link'],
//            'stripe_account_link' => $validated['stripe_account_link'],
                 'next_payment' => $next_payment,
             ]);
        }

        return redirect()->route('dashboard.booking')->with('success', 'User updated successfully!');
    }


    //Delete
    public function destroy($id)
    {
        $user = MongoUser::findOrFail($id);
        $user->delete();

        return redirect()->route('dashboard.booking')->with('success', 'User deleted successfully!');
    }


    private function getCouponDiscount($couponId)
    {
        try {
             Stripe::setApiKey(env('STRIPE_SECRET'));

             $coupon = Coupon::retrieve($couponId);

             if ($coupon) {
                $discountPercent = $coupon->percent_off;

                 if (in_array($discountPercent, [5, 10, 15])) {
                    return $discountPercent;
                }
            }

            return 0;
        } catch (\Exception $e) {
            Log::error('Stripe coupon retrieval failed: ' . $e->getMessage());
            return 0;
        }
    }

}
