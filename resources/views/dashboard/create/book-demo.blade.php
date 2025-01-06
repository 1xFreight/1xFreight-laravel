@extends('layouts.dashboard')
<style>
    .book-header {
        font-weight: lighter;
        padding-bottom: 10px;
    }
</style>
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="page-title"></div>
        <div class="dash-card">
            <div class="container">
                <h5 class="book-header">
                    Create New Book
                    <hr>
                </h5>
                <form method="POST" action="{{ route('dashboard.booking.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12 mb-5">
                            <div class="form-group">
                                <label>Company</label>
                                <input type="text" name="company" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mb-5">

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mb-5">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mb-5">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mb-5">
                            <div class="form-group">
                                <label>Billing Address</label>
                                <input type="text" name="billing_address" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mb-5">
                            <div class="form-group">
                                <label>Billing Email</label>
                                <input type="email" name="billing_email" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mb-5">
                            <div class="form-group">
                                <label>Billing Phone</label>
                                <input type="text" name="billing_phone" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mb-5">
                            <div class="form-group">
                                <label>Estimated Quotes Demo</label>
                                <input type="number" name="estimated_quotes_demo" class="form-control" >
                            </div>
                        </div>

                        <h4 class="mb-3">Platform Settings</h4>
                        <div class="col-lg-3 col-md-6 col-12 mb-3">
                            <div class="form-group">
                                <label for="free_trial_days">Set Free Trial (days) <span class="text-danger">*</span></label>
                                <input
                                    type="number"
                                    id="free_trial_days"
                                    name="free_trial_days"
                                    class="form-control"
                                    min="0"
                                    max="21"
                                    value="{{ old('free_trial_days', 7) }}"
                                    required>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mb-3">
                            <div class="form-group">
                                <label>Payment Date</label>
                                <input type="date" name="payment_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mb-3">
                            <div class="form-group">
                                <label>Price</label>
                                <select name="price" class="form-control">
                                    @foreach($products->data as $product)
                                        <optgroup label="{{ $product->name }}">
                                            @foreach($prices->data as $price)
                                                @if($price->product == $product->id)
                                                    <option value="{{ $price->id }}">
                                                        {{ $price->unit_amount / 100 }} {{ strtoupper($price->currency) }} -  {!! $price->nickname ?? 'No nickname' !!}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 mb-3">
                            <div class="form-group">
                                <label>Coupon</label>
                                <select name="coupon" class="form-control">
                                    <option value="">Select coupon</option>
                                    @foreach($coupons->data as $coupon)
                                        <option value="{{ $coupon->id }}">
                                            {{ $coupon->name ?? $coupon->id }} - {{ $coupon->amount_off ? $coupon->amount_off / 100 . ' ' . strtoupper($coupon->currency) : $coupon->percent_off . '% off' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{--                        <div class="col-lg-3 col-md-6 col-12 mb-3">--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Password</label>--}}
{{--                                <input type="password" name="password" class="form-control">--}}
{{--                            </div>--}}
{{--                        </div>--}}

                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="col-lg-3 col-md-4 col-6 btn btn-primary mt-4 mx-2">Add book</button>
                        <a href="{{route('dashboard.booking')}}"
                           class="col-lg-3 col-md-4 col-6 btn btn-danger mt-4 mx-2">Cancel</a>
                    </div>
                </form>
            </div>

        </div>
    </main>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $('.summernote').summernote({
            height: 200,
        });
    </script>
@endpush
