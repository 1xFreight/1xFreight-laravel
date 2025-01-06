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
<section class="banner">
    <div class="container">
        <div class="banner-text">
            <h1>Say Goodbay: <br> <span class="typed-text"></span><span class="cursor">&nbsp;</span></h1>
            <h3>Hello to our <span>easy-to-use</span> freight procurement platform</h3>
            <p>Move from email overload to our platform in <br class="ten"> <span>10 minutes</span> <br> managing all your freight effortlessly across all modes.</p>
            <a href="{{route('demo')}}" class="btn banner-btn">Book a demo</a>
            <div class="banner-rates">
                <p>Trusted by 2,000+ clients</p>
                <div class="stars">
                    <img src="/assets/images/icons/star.svg" alt="star">
                    <img src="/assets/images/icons/star.svg" alt="star">
                    <img src="/assets/images/icons/star.svg" alt="star">
                    <img src="/assets/images/icons/star.svg" alt="star">
                    <img src="/assets/images/icons/star.svg" alt="star">
                </div>
            </div>

            <div class="banner-partners">
                <img src="/assets/images/icons/partners/epay-manager.svg" alt="Epay Manager" class="big-img">
                <img src="/assets/images/icons/partners/saferWatch.svg" alt="SaferWatch" class="med-img">
                <img src="/assets/images/icons/partners/pcmiler.svg" alt="PCMILER" class="small-img">
                <img src="/assets/images/icons/partners/smartCapacity.svg" alt="Smart Capacity" class="med-img">
                <img src="/assets/images/icons/partners/kleinschmidt.svg" alt="Kleinschmidt" class="small-img">
            </div>
        </div>

        <div class="banner-tablet">
            <img src="/assets/images/tablet-background.png" alt="1XFreight">
        </div>
    </div>
</section>


<section class="why-us" id="why-us">
    <div class="container">
        <div class="section-title">
            <h1>Why choose us</h1>
            <p>Discover the benefits of streamlined Freight Management and Cost Reduction</p>
        </div>

        <div class="why-us-container">
            <div class="why-box">
                <div class="why-card">
                    <div class="why-icon">
                        <img src="/assets/images/icons/why-us/clock.svg" alt="clock">
                    </div>
                    <h3>Save Time and Increase Efficiency</h3>
                    <p>Streamline your freight procurement and management processes, reducing time spent by up to 90% and saving over 15 hours per week</p>
                </div>
                <div class="why-card">
                    <div class="why-icon">
                        <img src="/assets/images/icons/why-us/documentation.svg" alt="documentation">
                    </div>
                    <h3>Centralized Communication</h3>
                    <p>Keep all your shipment information, documents, and communication in one organized view, eliminating fragmented data and improving collaboration</p>
                </div>
            </div>
            <div class="why-box analysis-box">
                <div class="why-card position-center">
                    <div class="why-icon">
                        <img src="/assets/images/icons/why-us/bar-chart.svg" alt="analysis">
                    </div>
                    <h3>Advanced Analysis</h3>
                    <p>Use our analytical tools to achieve a 30% reduction in freight costs. Analyze spending by lane, by broker, or overall, and identify direct cost savings within minutes</p>
                </div>

                <img src="/assets/images/analytics.png" alt="" class="analysis-background">
            </div>
            <div class="why-box">
                <div class="why-card">
                    <div class="why-icon">
                        <img src="/assets/images/icons/why-us/ghear.svg" alt="Partners">
                    </div>
                    <h3>Seamless Onboarding for All Partners</h3>
                    <p>Onboard your employees and partners in just 10 minutes, ensuring everyone is up to speed and ready to use the platform without hassle</p>
                </div>
                <div class="why-card">
                    <div class="why-icon">
                        <img src="/assets/images/icons/why-us/comparison.svg" alt="Rate comparison">
                    </div>
                    <h3>Real-Time Rate Comparisons</h3>
                    <p>Access real-time rates from carriers and brokers, compare them against industry benchmarks, and choose the best options with a single click</p>
                </div>
            </div>
        </div>

        <div class="section-action">
            <a href="{{route('demo')}}" class="btn banner-btn">Book a demo</a>
            <div class="banner-rates">
                <p>Trusted by 2,000+ clients</p>
                <div class="stars">
                    <img src="/assets/images/icons/star.svg" alt="star">
                    <img src="/assets/images/icons/star.svg" alt="star">
                    <img src="/assets/images/icons/star.svg" alt="star">
                    <img src="/assets/images/icons/star.svg" alt="star">
                    <img src="/assets/images/icons/star.svg" alt="star">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="benefits">
    <div class="container">
        <h1>A Cost-Effective <br> and Simple TMS <br> Alternative</h1>

        <div class="benefits-container">
            <div class="benefit">
                <h3>10 minutes</h3>
                <p>to onboard employees and partners onto the platform</p>
            </div>
            <div class="benefit">
                <h3>90% reduction</h3>
                <p>in time, saving 15+ hours/week on freight procurement and management</p>
            </div>
            <div class="benefit">
                <h3>~30% savings</h3>
                <p>with 1xFreight clients saving between $250,000 and $2 million</p>
            </div>
        </div>
    </div>
</section>

<section class="work-steps section" id="work">
    <div class="container">
        <div class="section-title">
            <h1 >How It Works</h1>
            <p>Simplify Your Freight Management in Six Easy Steps</p>
        </div>

        <div class="why-us-steps">
            <div class="step">
                <div class="step-content">
                    <div class="step-number">01</div>
                    <h3>Set Up</h3>
                </div>

                <p>Upload your list of preferred carriers, brokers, and forwarders in just 10 minutes. Our platform is broker and carrier-agnostic.</p>
            </div>
            <div class="step">
                <div class="step-content">
                    <div class="step-number">02</div>
                    <h3>REQUEST PRICING</h3>
                </div>

                <p>Request spot or long-term bid pricing from your existing partners for both trucking and international shipments with a few clicks.</p>
            </div>
            <div class="step">
                <div class="step-content">
                    <div class="step-number">03</div>
                    <h3>PARTNER RESPONSE</h3>
                </div>

                <p>Freight partners receive an easy-to-use page to submit pricing for the quote or bid—no login required.</p>
            </div>
            <div class="step">
                <div class="step-content">
                    <div class="step-number">04</div>
                    <h3>Compare + award</h3>
                </div>

                <p>Receive real-time rates and compare them against industry benchmarks. Select and award the best rate with a single click.</p>
            </div>
            <div class="step">
                <div class="step-content">
                    <div class="step-number">05</div>
                    <h3>Manage</h3>
                </div>

                <p>Dispatch and manage active loads with centralized chat, status updates, and document management for awarded freight.</p>
            </div>
            <div class="step">
                <div class="step-content">
                    <div class="step-number">06</div>
                    <h3>Gain Insights</h3>
                </div>

                <p>Instantly analyze your freight spending by lane, broker, or overall. Use these insights to strategically reduce costs.</p>
            </div>
        </div>

        <div class="section-action">
            <a href="{{route('demo')}}" class="btn banner-btn">Book a demo</a>
            <div class="banner-rates">
                <p>Trusted by 2,000+ clients</p>
                <div class="stars">
                    <img src="/assets/images/icons/star.svg" alt="star">
                    <img src="/assets/images/icons/star.svg" alt="star">
                    <img src="/assets/images/icons/star.svg" alt="star">
                    <img src="/assets/images/icons/star.svg" alt="star">
                    <img src="/assets/images/icons/star.svg" alt="star">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="features" id="features">
    <div class="container">
        <div class="section-title">
            <h1>Key Features</h1>
            <p>Optimize Your Freight Management with Powerful Tools</p>

            <div class="navigation-arrows">
                <div class="swiper-button-prev feature-prev">
                    <svg width="57" height="16" viewBox="0 0 57 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.292751 7.29289C-0.0977707 7.68342 -0.0977707 8.31658 0.292751 8.70711L6.65671 15.0711C7.04724 15.4616 7.6804 15.4616 8.07093 15.0711C8.46145 14.6805 8.46145 14.0474 8.07093 13.6569L2.41407 8L8.07093 2.34315C8.46145 1.95262 8.46145 1.31946 8.07093 0.928932C7.6804 0.538408 7.04724 0.538408 6.65671 0.928932L0.292751 7.29289ZM57.0088 7L0.999859 7V9L57.0088 9V7Z" fill="white" />
                    </svg>
                </div>
                <div class="swiper-button-next feature-next">
                    <svg width="57" height="16" viewBox="0 0 57 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M56.716 8.70711C57.1066 8.31658 57.1066 7.68342 56.716 7.29289L50.3521 0.928932C49.9616 0.538408 49.3284 0.538408 48.9379 0.928932C48.5473 1.31946 48.5473 1.95262 48.9379 2.34315L54.5947 8L48.9379 13.6569C48.5473 14.0474 48.5473 14.6805 48.9379 15.0711C49.3284 15.4616 49.9616 15.4616 50.3521 15.0711L56.716 8.70711ZM0 9H56.0089V7H0V9Z" fill="white" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="swiper swiperFeatures">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="feature-content">
                        <h6>Rates</h6>
                        <h3>Compare rates in one place and reduce time for rate requests</h3>
                        <p>Accelerate the entire quote management process by up to 90%. Obtain rapid responses from carriers, brokers, and forwarders, and monitor pricing efficiently in one centralized platform, removing the hassle of managing through emails and spreadsheets.</p>
                    </div>
                    <div class="feature-image">
                        <img src="/assets/images/features/feature-1.png" alt="Feature">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="feature-content">
                        <h6>Monitor & Dispatch</h6>
                        <h3>Unify messaging, documentation, and shipment tracking all in one screen</h3>
                        <p>Once you book and dispatch your loads, 1XFreight lets you instantly message your freight partners, automatically store shipment documents, and monitor status, all within a single, streamlined view.</p>
                    </div>
                    <div class="feature-image">
                        <img src="/assets/images/features/feature-2.png" alt="Feature">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="feature-content">
                        <h6>Analytics</h6>
                        <h3>Evaluate your freight expenses and uncover direct cost savings in just minutes.</h3>
                        <p>Experience cutting-edge reports and analytics that reveal your spend per lane, carrier, and weight. Monitor how quickly carriers respond to your quote requests and assess their reliability by analyzing key performance indicators, including on-time pickup and delivery rates.</p>
                    </div>
                    <div class="feature-image">
                        <img src="/assets/images/features/feature-3.png" alt="Feature">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="feature-content">
                        <h6>Carriers</h6>
                        <h3>Loved by Carriers, Freight Brokers and Forwarders</h3>
                        <p>No registration or password required for your freight partners. Just add them to your dashboard, and they’ll get quote or bid requests. They can click the link in the pricing request, view all the details, and submit their rates—it's that simple!</p>
                    </div>
                    <div class="feature-image">
                        <img src="/assets/images/features/feature-1.png" alt="Feature">
                    </div>
                </div>
            </div>

            <div class="pagination"></div>
        </div>
    </div>
</section>

<section class="reviews section">
    <div class="container">
        <div class="section-title">
            <h1>What Our Clients Say</h1>
            <p>Hear from Satisfied Customers Who Have Transformed Their Freight Management with 1xFreight</p>
        </div>

        <div class="swiper swiperReviews">
            <div class="swiper-wrapper">
                <div class="swiper-slide review">
                    <img src="/assets/images/icons/quotes.svg" alt="">

                    <p>1xFreight has significantly improved my work-life quality, reducing the time I spend quoting from 10 hours to just 30 minutes. It’s a game-changer for our logistics process.</p>

                    <div class="reviewer">
                        <img src="/assets/images/reviews/review-1.png" alt="">
                        <h3>Doug Jenkins</h3>
                    </div>
                </div>
                <div class="swiper-slide review">
                    <img src="/assets/images/icons/quotes.svg" alt="">

                    <p>1xFreight has significantly improved my work-life quality, reducing the time I spend quoting from 10 hours to just 30 minutes. It’s a game-changer for our logistics process.</p>

                    <div class="reviewer">
                        <img src="/assets/images/reviews/review-2.png" alt="">
                        <h3>Nicole Coldwell</h3>
                    </div>
                </div>
                <div class="swiper-slide review">
                    <img src="/assets/images/icons/quotes.svg" alt="">

                    <p>1xFreight has revolutionized our process. It’s now easier to get competitive pricing quickly. We’ve saved over $2 million in the last 13 months by leveraging the platform.</p>

                    <div class="reviewer">
                        <img src="/assets/images/reviews/review-3.png" alt="">
                        <h3>Steve Bordonner</h3>
                    </div>
                </div>
                <div class="swiper-slide review">
                    <img src="/assets/images/icons/quotes.svg" alt="">

                    <p>1xFreight has revolutionized our process. It’s now easier to get competitive pricing quickly. We’ve saved over $2 million in the last 13 months by leveraging the platform.</p>

                    <div class="reviewer">
                        <img src="/assets/images/reviews/review-1.png" alt="">
                        <h3>John Doe</h3>
                    </div>
                </div>
                <div class="swiper-slide review">
                    <img src="/assets/images/icons/quotes.svg" alt="">

                    <p>1xFreight has significantly improved my work-life quality, reducing the time I spend quoting from 10 hours to just 30 minutes. It’s a game-changer for our logistics process.</p>

                    <div class="reviewer">
                        <img src="/assets/images/reviews/review-2.png" alt="">
                        <h3>Nicole Coldwell</h3>
                    </div>
                </div>
                <div class="swiper-slide review">
                    <img src="/assets/images/icons/quotes.svg" alt="">

                    <p>1xFreight has revolutionized our process. It’s now easier to get competitive pricing quickly. We’ve saved over $2 million in the last 13 months by leveraging the platform.</p>

                    <div class="reviewer">
                        <img src="/assets/images/reviews/review-3.png" alt="">
                        <h3>Steve Bordonner</h3>
                    </div>
                </div>
            </div>

            <div class="pagination"></div>
        </div>
    </div>
</section>

<section class="main-blog section">
    <div class="container">
        <div class="section-title">
            <h1>Industry updates, news and insights</h1>
            <p>Get the latest industry updates, news, and insights to keep you informed and ahead</p>
        </div>

        <div class="swiper swiperBlog">
            <div class="swiper-wrapper">
                @if ($blogs)
                @foreach ($blogs as $blog)
                    <a href="{{route('blog.show', $blog->link)}}" class="swiper-slide review blog-box">
                        <h3>{{ $blog->title }}</h3>

                        <div class="blog-image">
                            @if($blog->image)
                                <img src="/assets/images/blog/{{$blog->image}}" alt="{{$blog->title}}">
                            @else
                                <img src="/assets/images/default.jpg" alt="plt" loading="lazy"/>
                            @endif
                        </div>
                    </a>
                @endforeach
                @endif
            </div>

            <div class="pagination"></div>
        </div>
    </div>
</section>

@include('components.advertisment')
@endsection
@push('scripts')
    <script src="/assets/js/home.js"></script>
@endpush
