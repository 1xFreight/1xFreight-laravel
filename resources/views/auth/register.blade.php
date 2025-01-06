@extends('layouts.app')
@section('content')

    <div class="auth-page"
        style="background: #f6f5f5; height: 90vh; display: grid; place-items: center; place-content: center;">
        <div class="container">
            <form action="{{ route('register') }}" autocomplete="none" method="POST" style="width: 400px;" class="form-block">
                @csrf
                <div class="auth-form" style="width: 100%; display: grid; place-items: center; gap: 20px;">
                    <h4 style="color: var(--gray);">Register</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="auth-field" style="width: 100%;">
                        <input type="text" name="name" id="inputName" value="" placeholder="Name" minlength="1"
                            maxlength="254" required>
                    </div>
                    <div class="auth-field" style="width: 100%;">
                        <input type="email" name="email" id="inputEmail" class="email-input" value=""
                            placeholder="Email" minlength="1" maxlength="254" required>
                    </div>
                    <div class="auth-field" style="width: 100%;">
                        <input type="password" name="password" id="inputPassword" value="" placeholder="Password"
                            required>
                    </div>
                    <div class="auth-field" style="width: 100%;">
                        <input type="password" name="password_confirmation" id="inputPasswordConfirm" value=""
                            placeholder="Confirm Password" required>
                    </div>
                    <div class="auth-action mt-4" style="width: 100%;">
                        <button type="submit" class="welcome-action-link w-100"
                            style="height: 75px; font-size: 20px; outline: none; border: none;">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
