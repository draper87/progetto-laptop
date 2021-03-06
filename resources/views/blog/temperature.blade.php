@extends('layout.app')

@section('title')
    <title>Laptop's chassis temperature</title>
@endsection


@section('section')

    <header class="page-header page-header-dark bg-gradient-primary-to-secondary">
        <div class="page-header-content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 text-center pb-2">
                        <h1 class="page-header-title font-weight-bold">Overheating chassis</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="svg-border-rounded text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none"
                 fill="currentColor">
                <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path>
            </svg>
        </div>

    </header>

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="single-post">

                        <img class="img-fluid mb-2" src="{{asset('storage') . '/' . 'images/overheating.webp'}}"  alt="chassis"/>

                        <p class="lead text-center font-weight-bold"></p>
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="single-post-meta mr-4">
                                <img class="single-post-meta-img" src="{{asset('storage') . '/' . 'images/profile.webp'}}" />
                                <div class="single-post-meta-details">
                                    <div class="single-post-meta-details-name">Oliver Benoit</div>
                                    <div class="single-post-meta-details-date">Mar 6 2021 &middot; 4 min read</div>
                                </div>
                            </div>
                        </div>

                        <div class="single-post-text my-4">
                            <p>When we talk about overheating laptops, we always tend to think about the internal temperatures of our device, those that could damage, in the long term, the
                                hardware components permanently (source: personal experience with a gaming laptop).
                                In this article, however, I would like to focus on the temperatures that develop on the outside, meaning the parts of the chassis that come into contact with our
                                body. I haven’t found many articles online that deal with this topic, for me of vital importance, because a device that overheats too much tends to be a source of
                                discomfort for daily use.
                            </p>
                            <p>Let's take a look at the temperatures in detail, sorted by comfort range:</p>
                            <img class="img-fluid mb-2" src="{{asset('storage') . '/' . 'images/comfortable-laptop.webp'}}"  alt="aluminum"/>
                            <h4 class="text-center font-weight-bold">Full comfort range (under 45°C - 104°F)</h4>
                            <p>In this range there are, generally, devices that have limited performance, devices not intended for gamers / content creators.
                                Or devices with large dimensions, such as desktop replacements, which are able to keep temperatures under control thanks to better heat dissipation.</p>
                            <p>Even in case of prolonged sessions your notebook will always remain comfortable, both keyboard side and bottom cover side,
                                you can therefore lay it on your lap or on your abdomen without worrying too much.</p>
                            <p>Side note: gaming laptops (I'm not talking therefore about MacBooks or Surface) made of aluminum or magnesium are unlikely to make it into this
                                range, as these alloys conduct heat very easily.</p>
                            <hr class="my-5" />

                            <img class="img-fluid mb-2" src="{{asset('storage') . '/' . 'images/intermediate-comfort-laptop.webp'}}"  alt="magnesium"/>
                            <h4 class="text-center font-weight-bold">Intermediate comfort range (under 55°C - 131°F)</h4>
                            <p>In this range it is easy to find both high performing gaming laptops and those with mediocre performance, it depends a lot on the build quality of the manufacturer.</p>
                            <p>In these devices generally the bottom cover of the chassis tends to be hot, and it could be a source of discomfort in the long run to your laps/abdomen.</p>
                            <p>As for the keyboard, it is expected to stay relatively comfortable, as , generally, manufacturers tend to prevent heat from being conveyed to the keyboard itself.</p>
                            <hr class="my-5" />

                            <img class="img-fluid mb-2" src="{{asset('storage') . '/' . 'images/burning-laptop.webp'}}"  alt="plastic"/>
                            <h4 class="text-center font-weight-bold">Minimum comfort range (over 55°C - 131°F)</h4>
                            <p>This is the worst range, in which we find the so-called beasts, those laptops equipped with high-end CPU and GPU, or devices made of
                                aluminum/magnesium alloy, built with a poor heat dissipating system.</p>
                            <p>In this range forget to use your laptop lying on your lap/abdomen, the heat would be excessive, the mandatory use will therefore be on the desk.</p>
                            <p>Regarding the keyboard, there is a good chance that the right side of it (the left part is used more frequently by gamers, especially the WASD letters) is going to be very hot.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="svg-border-rounded text-light">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none"
                 fill="currentColor">
                <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path>
            </svg>
        </div>
    </section>

    <section class="bg-light py-4">
        <div class="container">
            <div class="row align-items-center justify-content-center">
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/template.js') }}"></script>
@endsection
