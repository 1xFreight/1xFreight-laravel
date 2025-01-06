@extends('layouts.app')
@section('pageTitle', $meta_tag ? $meta_tag->title : 'Default Title')
@section('custom-meta')
@if($meta_tag)
<meta name="description" content="{{ $meta_tag->meta_description }}">
<meta name="keywords" content="{{ $meta_tag->keywords }}">
<meta property="og:title" content="{{ $meta_tag->title }}">
<meta property="og:description" content="{{ $meta_tag->meta_description }}">
<meta property="og:image" content="/assets/images/metas/{{$meta_tag->image}}">
<meta property="og:site_name" content="{{ $meta_tag->title }}">
@endif
@endsection
@section('content')
<section class="features demo-page">
    <div class="container">
        <div class="swiper swiperFeatures">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="feature-content">
                        <h6>Pricing</h6>
                        <h3>Reduce Time for Rate Requests and Enhance Pricing Visibility</h3>
                        <p>Create, send, receive, compare, and award rates up to 90% faster. Get quicker responses from carriers/brokers/forwarders and track pricing in a centralized view instead of through emails and spreadsheets.</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="feature-content">
                        <h6>Manage</h6>
                        <h3>Centralize Communication, Documents, and Shipment Status</h3>
                        <p>Eliminate fragmented shipment information. After booking or dispatching loads, use 1xFreight to chat with your freight partners instantly, store shipment documents automatically, and track status—all in one organized view.</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="feature-content">
                        <h6>Insights</h6>
                        <h3>Analyze Freight Spending and Find Cost Savings in Minutes</h3>
                        <p>Reduce freight costs and increase margins with automatically generated reports and analyses of your freight spending. See spending per lane, per freight partner, estimated cost savings per lane, and more.</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="feature-content">
                        <h6>Partners</h6>
                        <h3>Loved by Freight Carriers, Brokers, and Forwarders</h3>
                        <p>No sign-up or password needed for freight partners. Simply add them to your dashboard, and they’ll receive quote or bid requests. They click the link in the pricing request, view the details, and submit their rate—that’s it!</p>
                    </div>
                </div>
            </div>

            <div class="pagination"></div>
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('demo.store') }}" method="POST" class="demo-form">
            @csrf
            <h3>Book a demo</h3>
            <div class="inputs-box">
                <div class="input-box">
                    <label for="company">Company <span>*</span></label>
                    <input type="text" name="company" id="company" placeholder="Type here..." required>
                </div>
                <div class="input-box">
                    <label for="name">Contact Name <span>*</span></label>
                    <input type="text" name="name" id="name" placeholder="Type here..." required>
                </div>
            </div>

            <div class="inputs-box">
                <div class="input-box">
                    <label for="email">Email <span>*</span></label>
                    <input type="text" name="email" id="email" placeholder="Type here..." required>
                </div>
                <div class="input-box">
                    <label for="phone">Phone <span>*</span></label>
                    <input type="number" name="phone" id="phone" placeholder="Type here..." required>
                </div>
            </div>

            <div class="inputs-box">
                <div class="input-box">
                    <label for="company">Billing Address <span>*</span></label>
                    <input type="text" name="billing_address" id="billing_address" placeholder="Type here..." required>
                </div>
                <div class="input-box">
                    <label for="email">Billing Email <span>*</span></label>
                    <input type="email" name="billing_email" id="billing_email" placeholder="Type here..." required>
                </div>
            </div>

            <div class="inputs-box">
                <div class="input-box">
                    <label for="phone">Biiling Phone <span>*</span></label>
                    <input type="text" name="billing_phone" id="billing_phone" placeholder="Type here..." required>
                </div>

                <div class="inputs-box">
                    <div class="input-box">
                        <label for="estimate_number">Estimate nr of quotes per month?</label>
                        <select name="estimated_quotes_demo" id="estimated_quotes_demo" class="custom-select" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="custom-checkbox">
                <label class="checkbox-btn">
                    <input type="checkbox" id="rocket-task">
                    <span></span>
                    <p> By clicking “Book a Demo,” you acknowledge that you have read, understood, and agree to be bound by our <a href="/terms.html">Terms and Conditions</a> and <a href="/terms.html">Privacy Policy</a>.</p>
                </label>
            </div>

            <button type="submit" class="btn form-btn">Book a demo</button>
        </form>

        <div id="successModal" style="display: none;">
            <div class="modal-content">
                <h3>Thank you for booking a demo!</h3>
                <p>Your request has been submitted successfully. We will get in touch with you shortly.</p>
                <button id="closeModalBtn">Close</button>
            </div>
        </div>
    </div>
</section>

@endsection
@push('scripts')
<script>
    document.querySelectorAll('.custom-select').forEach(customSelect => {
        const selectBtn = customSelect.querySelector('.select-button');
        const selectedValue = customSelect.querySelector('.selected-value');
        const optionsList = customSelect.querySelectorAll('.select-dropdown li');

        // Add click event to select button
        selectBtn.addEventListener("click", () => {
            // Add/remove active class on the container element
            customSelect.classList.toggle("active");
            // Update the aria-expanded attribute based on the current state
            const isExpanded = selectBtn.getAttribute("aria-expanded") === "true";
            selectBtn.setAttribute("aria-expanded", !isExpanded);
        });

        optionsList.forEach(option => {
            option.addEventListener("click", (e) => {
                if (e.target.tagName === 'LABEL') {
                    // Set selected value based on clicked label
                    selectedValue.textContent = e.target.textContent;
                    customSelect.classList.remove("active");
                    // Optionally, you may want to check the corresponding radio button
                    const radio = option.querySelector('input[type="radio"]');
                    if (radio) {
                        radio.checked = true;
                    }
                }
            });

            option.addEventListener("keyup", (e) => {
                if (e.key === "Enter") {
                    selectedValue.textContent = option.querySelector('label').textContent;
                    customSelect.classList.remove("active");
                    const radio = option.querySelector('input[type="radio"]');
                    if (radio) {
                        radio.checked = true;
                    }
                }
            });
        });
    });
</script>

@endpush
