@extends('layouts.app')
@section('content')
    <section class="sign-in-page">
        <div class="container">
            <form action="{{route('login')}}" method="POST" class="signin-form">
                @csrf
                <h3>Sign In</h3>

                <div class="inputs-box">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="input-box">
                        <label for="email">Email <span>*</span></label>
                        <input type="text" name="email" id="email" placeholder="Type here..." required>
                    </div>
                    <div class="input-box">
                        <label for="password">Email <span>*</span></label>
                        <input type="password" name="password" id="password" placeholder="Type here..." required>
                    </div>
                </div>


                <button type="submit" class="btn form-btn">sign in</button>
                <!-- <a href="/pin.html" class="btn form-btn">sign in</a> -->

                <p class="agree-terms"> By clicking “Book a Demo,” you acknowledge that you have read, understood, and agree to be bound by our <a href="/terms.html">Terms and Conditions</a> and <a href="/terms.html">Privacy Policy</a>.</p>
            </form>
        </div>
    </section>
@endsection
