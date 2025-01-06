@extends('layouts.app')
@section('content')
<section class="sign-in-page pin-page">
    <div class="container">
        <form action="" class="pin-form">
            <div class="pin-title">
                <h3>Please enter the PIN sent to your email</h3>
                <p>Please check your email.</p>
            </div>
            <div class="email-address">
                <p>Email address</p>
                <p>test1xgregti@gmail.com</p>
            </div>

            <div class="pin-box">
                <input type="text">
                <input type="text">
                <input type="text">
                <input type="text">
                <input type="text">
                <input type="text">
            </div>

            <div class="custom-checkbox">
                <label class="checkbox-btn">
                    <input type="checkbox" id="rocket-task">
                    <span></span>
                    <p>Remember me</p>
                </label>
            </div>

            <a href="#" class="request-pin">Request a new PIN</a>

            <a href="#" class="btn form-btn">sign in</a>

            <p class="agree-terms"> By clicking “Book a Demo,” you acknowledge that you have read, understood, and agree to be bound by our <a href="/terms.html">Terms and Conditions</a> and <a href="/terms.html">Privacy Policy</a>.</p>
        </form>
    </div>
</section>
@endsection