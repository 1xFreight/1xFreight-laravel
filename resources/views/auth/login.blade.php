{{--@extends('layouts.app')--}}
{{--<style>--}}
{{--     .sign-in-page {--}}
{{--        padding: 40px 0;--}}
{{--    }--}}
{{--    .container {--}}
{{--        max-width: 600px;--}}
{{--        margin: 0 auto;--}}
{{--    }--}}


{{--     .tabs {--}}
{{--         justify-content: center;--}}
{{--        display: flex;--}}
{{--         /*max-width: 700px;*/--}}
{{--         /*margin-left:auto;*/--}}
{{--         /*margin-right:auto;*/--}}
{{--         /* border-radius: var(--border-radius-4);*/--}}
{{--         /*border: 1px solid #0020DD;*/--}}
{{--         /* box-shadow: 0 4px 35px 0px rgba(0, 0, 0, 0.05);*/--}}
{{--         /*padding: 10px 10px;*/--}}
{{--         margin-bottom: 10px;--}}

{{--    }--}}
{{--    .tab {--}}
{{--        padding: 15px 75px;--}}
{{--        cursor: pointer;--}}
{{--        font-weight: bold;--}}
{{--        text-decoration: none;--}}
{{--        color: #333;--}}
{{--        background: #E8F0FE;--}}
{{--        border: 1px solid #ccc;--}}
{{--        margin-right: 15px;--}}
{{--        border-radius: 15px;--}}
{{--    }--}}
{{--    .tab.active {--}}
{{--        background: #fff;--}}
{{--        color: #000;--}}
{{--     }--}}

{{--     .signin-form {--}}
{{--        background: #fff;--}}
{{--        border: 1px solid #ccc;--}}
{{--        border-radius: 10px;--}}
{{--        padding: 30px;--}}
{{--        box-shadow: 0 0 5px rgba(0,0,0,0.1);--}}
{{--        margin-bottom: 40px;--}}
{{--    }--}}
{{--    .signin-form h3 {--}}
{{--        margin-bottom: 20px;--}}
{{--        font-size: 24px;--}}
{{--        font-weight: bold;--}}
{{--        text-align: center;--}}
{{--    }--}}
{{--    .inputs-box {--}}
{{--        display: flex;--}}
{{--        justify-content: space-between;--}}
{{--        margin-bottom: 20px;--}}
{{--    }--}}
{{--    .input-box {--}}
{{--        flex: 1;--}}
{{--        display: flex;--}}
{{--        flex-direction: column;--}}
{{--        margin-right: 10px;--}}
{{--    }--}}
{{--    .input-box:last-child {--}}
{{--        margin-right: 0;--}}
{{--    }--}}
{{--    .input-box label {--}}
{{--        font-weight: bold;--}}
{{--        margin-bottom: 5px;--}}
{{--    }--}}
{{--    .input-box input {--}}
{{--        padding: 10px;--}}
{{--        border: 1px solid #ccc;--}}
{{--        border-radius: 5px;--}}
{{--        font-size: 16px;--}}
{{--    }--}}

{{--    .btn.form-btn {--}}
{{--        width: 100%;--}}
{{--        padding: 15px;--}}
{{--        background: #0052cc;--}}
{{--        color: #fff;--}}
{{--        font-size: 16px;--}}
{{--        border: none;--}}
{{--        border-radius: 5px;--}}
{{--        cursor: pointer;--}}
{{--        margin-bottom: 20px;--}}
{{--        text-transform: uppercase;--}}
{{--        font-weight: bold;--}}
{{--    }--}}
{{--    .btn.form-btn:hover {--}}
{{--        background: #003d99;--}}
{{--    }--}}

{{--    .agree-terms {--}}
{{--        font-size: 14px;--}}
{{--        line-height: 1.5;--}}
{{--        text-align: center;--}}
{{--    }--}}

{{--    .agree-terms a {--}}
{{--        color: #0052cc;--}}
{{--        text-decoration: none;--}}
{{--    }--}}

{{--    .agree-terms a:hover {--}}
{{--        text-decoration: underline;--}}
{{--    }--}}

{{--     .tab-content > div {--}}
{{--        display: none;--}}
{{--    }--}}
{{--    .tab-content > div.active {--}}
{{--        display: block;--}}
{{--    }--}}
{{--</style>--}}
{{--@section('content')--}}
{{--    <section class="sign-in-page">--}}

{{--        <div class="container" style="display: block">--}}
{{--            <div class="tabs">--}}
{{--                <div class="tab active" data-tab="careers">Careers</div>--}}
{{--                <div class="tab" data-tab="shippers">Shippers</div>--}}
{{--            </div>--}}

{{--            <div class="tab-content" style="display: flex; justify-content: center">--}}
{{--                <div id="careers" class="active">--}}
{{--                    <form class="signin-form" id="careers-form">--}}
{{--                        <h3>Sign In - Careers</h3>--}}
{{--                        <div class="inputs-box">--}}
{{--                            <div class="input-box">--}}
{{--                                <label for="email_careers">Email <span>*</span></label>--}}
{{--                                <input type="text" name="email" id="email_careers" placeholder="Type here..." required>--}}
{{--                            </div>--}}
{{--                            <div class="input-box">--}}
{{--                                <label for="password_careers">Password <span>*</span></label>--}}
{{--                                <input type="password" name="password" id="password_careers" placeholder="Type here..." required>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <button type="submit" class="btn form-btn">Sign In</button>--}}
{{--                        <button type="button" class="btn form-btn" id="careers-form-btn">User BTN</button>--}}
{{--                        <p class="agree-terms">By clicking “Sign In,” you acknowledge that you have read, understood, and agree to be bound by our--}}
{{--                            <a href="/terms.html">Terms and Conditions</a> and--}}
{{--                            <a href="/terms.html">Privacy Policy</a>.--}}
{{--                        </p>--}}
{{--                    </form>--}}
{{--                </div>--}}

{{--                <div id="shippers">--}}
{{--                    <form class="signin-form" id="shippers-form">--}}
{{--                        <h3>Sign In - Shippers</h3>--}}
{{--                        <div class="inputs-box">--}}
{{--                            <div class="input-box">--}}
{{--                                <label for="email_shippers">Email <span>*</span></label>--}}
{{--                                <input type="text" name="email" id="email_shippers" placeholder="Type here..." required>--}}
{{--                            </div>--}}
{{--                            <div class="input-box">--}}
{{--                                <label for="password_shippers">Password <span>*</span></label>--}}
{{--                                <input type="password" name="password" id="password_shippers" placeholder="Type here..." required>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <button type="submit" class="btn form-btn">Sign In</button>--}}
{{--                        <p class="agree-terms">By clicking “Sign In,” you acknowledge that you have read, understood, and agree to be bound by our--}}
{{--                            <a href="/terms.html">Terms and Conditions</a> and--}}
{{--                            <a href="/terms.html">Privacy Policy</a>.--}}
{{--                        </p>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <script>--}}

{{--         const tabs = document.querySelectorAll('.tab');--}}
{{--        const tabContents = document.querySelectorAll('.tab-content > div');--}}

{{--        tabs.forEach(tab => {--}}
{{--            tab.addEventListener('click', () => {--}}
{{--                 tabs.forEach(t => t.classList.remove('active'));--}}
{{--                tabContents.forEach(c => c.classList.remove('active'));--}}

{{--                 tab.classList.add('active');--}}
{{--                const tabId = tab.getAttribute('data-tab');--}}

{{--                 document.getElementById(tabId).classList.add('active');--}}
{{--            });--}}
{{--        });--}}

{{--        document.getElementById('careers-form').addEventListener('submit', function(e) {--}}
{{--            e.preventDefault();--}}
{{--            const email = document.getElementById('email_careers').value;--}}
{{--            const password = document.getElementById('password_careers').value;--}}
{{--            fetch('http://127.0.0.1:3001/auth/login-pass', {--}}
{{--                method: 'POST',--}}
{{--                headers: {'Content-Type': 'application/json'},--}}
{{--                body: JSON.stringify({ email: email, password: password }),--}}
{{--                credentials: 'include'--}}
{{--            })--}}
{{--                .then(res => res.json())--}}
{{--                .then(data => console.log(data))--}}
{{--                .catch(err => console.error(err))--}}

{{--        });--}}

{{--         document.getElementById('careers-form-btn').addEventListener('click', function(e) {--}}
{{--             e.preventDefault();--}}
{{--               fetch('http://127.0.0.1:3001/users/me', {--}}
{{--                 method: 'GET',--}}
{{--                 headers: { 'Content-Type': 'application/json' },--}}
{{--                 credentials: 'include'--}}
{{--             })--}}
{{--                 .then(res => {--}}
{{--                     if (!res.ok) throw new Error('Not authenticated');--}}
{{--                     return res.json();--}}
{{--                 })--}}
{{--                 .then(data => console.log(data))--}}
{{--                 .catch(err => console.error(err));--}}
{{--         });--}}

{{--        document.getElementById('shippers-form').addEventListener('submit', function(e) {--}}
{{--            e.preventDefault();--}}
{{--            const email = document.getElementById('email_shippers').value;--}}
{{--            const password = document.getElementById('password_shippers').value;--}}
{{--             fetch('http://127.0.0.1:3001/auth/login-email', {--}}
{{--                method: 'POST',--}}
{{--                headers: {'Content-Type': 'application/json'},--}}
{{--                body: JSON.stringify({ email: email, password: password })--}}
{{--            })--}}
{{--                .then(res => res.json())--}}
{{--                .then(data => console.log(data))--}}
{{--                .catch(err => console.error(err));--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}



{{--Decomenteaza si sterge tot ce este mai jos--}}

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
