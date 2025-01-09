@extends('layouts.dashboard')
<style>
    .edit-company {
        font-size: 16px;
        font-weight: lighter;
        margin-bottom: 10px;
        padding-bottom: 10px;
        border-bottom: .12rem solid #545454;
    }

    .edit-company span {
        font-weight: 400;
    }

    .book-header {
        font-weight: lighter;
    }

    .book-header span {
        font-weight: 400;
    }
</style>
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="page-title">
            <h6 class="book-header">Users > <span>{!! $user->company !!}</span></h6>
        </div>
        <div class="dash-card">
            <div class="container">
                <div class="row">
                    <h5 class="mb-3">
                        Company
                        <hr>
                    </h5>

                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <div class="edit-company">
                            Company:
                            <span>{!! $user->company !!}</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <div class="edit-company">
                            Name:
                            <span>{!! $user->name !!}</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <div class="edit-company">
                            Email:
                            <span>{!! $user->email !!}</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <div class="edit-company">
                            Phone:
                            <span>{!! $user->phone !!}</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mb-5">
                        <div class="edit-company">
                            Billing Address:
                            <span>{!! $user->billing_address !!}</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mb-5">
                        <div class="edit-company">
                            Billing Email:
                            <span>{!! $user->billing_email !!}</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mb-5">
                        <div class="edit-company">
                            Billing Phone:
                            <span>{!! $user->billing_phone !!}</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mb-5">
                        <div class="edit-company">
                            Estimated Quotes Demo:
                            <span>{!! $user->estimated_quotes_demo !!}</span>
                        </div>
                    </div>


                    <h5 class="mb-3">
                        Platform Settings
                        <hr>
                    </h5>
                    <div class="col-lg-3 col-md-6 col-12 mb-5">
                        <div class="edit-company">
                            Status:
                            @if($user->status === 'inactive')
                                <span class="text-danger">{!! $user->status !!}</span>
                            @else
                                {
                                <span class="text-success">{!! $user->status !!}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mb-5">
                        <div class="edit-company">
                            Payment Date:
                            <span>
{!! $subscription && $subscription->payment_date ? \Carbon\Carbon::parse($subscription->payment_date)->format('m/d/Y') : 'N/A' !!}
                            </span>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-5">
                        <div class="edit-company">
                            Subscription:
                            <span>{!! $subscription->subscription ?? ' ' !!}</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mb-5">
                        <div class="edit-company">
                            Coupon:
                            <span>{!! $subscription->coupon ?? ' ' !!}</span>
                        </div>
                    </div>
                </div>
                <h5 class="mb-3">
                    Final Monthly Subscription : {!! $subscription->final_monthly_price ?? 'null'!!}
                    <hr>
                </h5>


                <div class="d-flex justify-content-center">
                    <a href="{{ route('dashboard.booking') }}" class="col-lg-3 col-md-4 col-6 btn btn-primary mx-2"><i
                            class="bi bi-arrow-left mx-1"></i>Go back</a>
                    <a href="{{ route('dashboard.booking.edit',  $user->id) }}"
                       class=" col-lg-3 col-md-4 col-6 btn btn-warning mx-2"> <i
                            class="bi bi-pencil mx-1"></i>Edit Book</a>
                </div>
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
