<?php

namespace App\Http\Controllers;
use Stripe\Stripe;
use Stripe\Product;
use Stripe\Price;

class StripeController extends Controller
{
    public function showPackages()
    {
         Stripe::setApiKey(env('STRIPE_SECRET'));

        $products = Product::all();

        $prices = Price::all();

        return view('packages', compact('products', 'prices'));
    }
}
