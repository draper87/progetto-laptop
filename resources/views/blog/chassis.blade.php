@extends('layout.app')

@section('title')
    <title>Which chassis for my laptop?</title>
@endsection


@section('section')

    <header class="page-header page-header-dark bg-gradient-primary-to-secondary">
        <div class="page-header-content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 text-center pb-2">
                        <h1 class="page-header-title font-weight-bold">Which chassis for my laptop?</h1>
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

                        <img class="img-fluid mb-2" src="{{asset('storage') . '/' . 'images/chassis-laptop.webp'}}"  alt="chassis"/>

                        <p class="lead text-center font-weight-bold"></p>
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="single-post-meta mr-4">
                                <img class="single-post-meta-img" src="{{asset('storage') . '/' . 'images/profile.webp'}}" />
                                <div class="single-post-meta-details">
                                    <div class="single-post-meta-details-name">Oliver Benoit</div>
                                    <div class="single-post-meta-details-date">Feb 6 &middot; 5 min read</div>
                                </div>
                            </div>
                        </div>

                        <div class="single-post-text my-4">
                            <p>The materials and manufacturing techniques of laptops chassis have hit very high levels in the last decade. In fact, if plastic was the most popular material until not so long ago, even in high-end laptops, we now see a steady change away from this material in favour
                                of more premium materials. This does not mean that plastic is to be considered not suitable to encase our precious hardware components, but rather
                                there is an actual trend that leads consumers to prefer more "noble" materials, and in this certainly Apple has always been the pioneer.</p>
                            <p>Not always, however, these premium materials get along with the daily use,  let's look then at the pros and cons of the most popular materials used today:</p>
                            <img class="img-fluid mb-2" src="{{asset('storage') . '/' . 'images/aluminum.webp'}}"  alt="aluminum"/>
                            <h4 class="text-center font-weight-bold">Aluminum unibody</h4>
                            <div class="d-flex justify-content-center py-2">
                                <div class="pros pr-3 w-50">
                                    <ul class="list-unstyled font-weight-200">
                                        <li><img src="{{asset('storage') . '/' . 'images/check.svg'}}" alt="" class="laptop-icon pr-1">Better sturdiness</li>
                                        <li><img src="{{asset('storage') . '/' . 'images/check.svg'}}" alt="" class="laptop-icon pr-1">Premium look</li>
                                        <li><img src="{{asset('storage') . '/' . 'images/check.svg'}}" alt="" class="laptop-icon pr-1">Warp resistant</li>
                                        <li><img src="{{asset('storage') . '/' . 'images/check.svg'}}" alt="" class="laptop-icon pr-1">Lightweight material</li>
                                        <li><img src="{{asset('storage') . '/' . 'images/check.svg'}}" alt="" class="laptop-icon pr-1">Good heat sink</li>
                                    </ul>
                                </div>
                                <div class="cons pl-3 w-50">
                                    <ul class="list-unstyled font-weight-200">
                                        <li><img src="{{asset('storage') . '/' . 'images/cons.svg'}}" alt="" class="laptop-icon pr-1">Dent easily</li>
                                        <li><img src="{{asset('storage') . '/' . 'images/cons.svg'}}" alt="" class="laptop-icon pr-1">Poor abrasion and wear resistance</li>
                                        <li><img src="{{asset('storage') . '/' . 'images/cons.svg'}}" alt="" class="laptop-icon pr-1">More expensive than plastic</li>
                                        <li><img src="{{asset('storage') . '/' . 'images/cons.svg'}}" alt="" class="laptop-icon pr-1">Good heat sink</li>
                                    </ul>
                                </div>
                            </div>
                            <p>In this case the chassis is made entirely of aluminum alloy, where only the keyboard and bottom cover are not usually an whole thing with it.</p>
                            <p>Compared to plastic it tends to be sturdier and withstands warping better.</p>
                            <p>A note about the good thermal conductivity of aluminum: it represents a two-sided weapon, on one hand the better heat dissipation allows the laptop to better "breathe", on the other the
                                heat reaches the surface more easily, causing discomfort through the bottom to your lap and through the keyboard to your fingertips.</p>
                            <hr class="my-5" />

                            <img class="img-fluid mb-2" src="{{asset('storage') . '/' . 'images/Magnesium.webp'}}"  alt="magnesium"/>
                            <h4 class="text-center font-weight-bold">Magnesium unibody</h4>
                            <div class="d-flex justify-content-center py-2">
                                <div class="pros pr-3 w-50">
                                    <ul class="list-unstyled font-weight-200">
                                        <li><img src="{{asset('storage') . '/' . 'images/check.svg'}}" alt="" class="laptop-icon pr-1">Better sturdiness</li>
                                        <li><img src="{{asset('storage') . '/' . 'images/check.svg'}}" alt="" class="laptop-icon pr-1">Premium look</li>
                                        <li><img src="{{asset('storage') . '/' . 'images/check.svg'}}" alt="" class="laptop-icon pr-1">Warp resistant</li>
                                        <li><img src="{{asset('storage') . '/' . 'images/check.svg'}}" alt="" class="laptop-icon pr-1">Lighter than aluminum</li>
                                        <li><img src="{{asset('storage') . '/' . 'images/check.svg'}}" alt="" class="laptop-icon pr-1">Good heat sink</li>
                                    </ul>
                                </div>
                                <div class="cons pl-3 w-50">
                                    <ul class="list-unstyled font-weight-200">
                                        <li><img src="{{asset('storage') . '/' . 'images/cons.svg'}}" alt="" class="laptop-icon pr-1">Dent easily</li>
                                        <li><img src="{{asset('storage') . '/' . 'images/cons.svg'}}" alt="" class="laptop-icon pr-1">NOT as strong as aluminum</li>
                                        <li><img src="{{asset('storage') . '/' . 'images/cons.svg'}}" alt="" class="laptop-icon pr-1">More expensive than plastic</li>
                                        <li><img src="{{asset('storage') . '/' . 'images/cons.svg'}}" alt="" class="laptop-icon pr-1">Not as heat conductive as aluminum</li>
                                    </ul>
                                </div>
                            </div>
                            <p>In this case the chassis is made entirely of magnesium alloy, where, as aluminum, only the keyboard and bottom cover are not usually an whole thing with it.</p>
                            <p>Compared to aluminum it is lighter but not as strong.</p>
                            <p>The heat conductivity of magnesium has the same up and down as aluminum.</p>
                            <hr class="my-5" />

                            <img class="img-fluid mb-2" src="{{asset('storage') . '/' . 'images/plastic.webp'}}"  alt="plastic"/>
                            <h4 class="text-center font-weight-bold">Plastic</h4>
                            <div class="d-flex justify-content-center py-2">
                                <div class="pros pr-3 w-50">
                                    <ul class="list-unstyled font-weight-200">
                                        <li><img src="{{asset('storage') . '/' . 'images/check.svg'}}" alt="" class="laptop-icon pr-1">Cheap</li>
                                        <li><img src="{{asset('storage') . '/' . 'images/check.svg'}}" alt="" class="laptop-icon pr-1">Resistant to dents</li>
                                        <li><img src="{{asset('storage') . '/' . 'images/check.svg'}}" alt="" class="laptop-icon pr-1">Can be lighter than aluminum</li>
                                        <li><img src="{{asset('storage') . '/' . 'images/check.svg'}}" alt="" class="laptop-icon pr-1">Poor heat conductivity</li>
                                    </ul>
                                </div>
                                <div class="cons pl-3 w-50">
                                    <ul class="list-unstyled font-weight-200">
                                        <li><img src="{{asset('storage') . '/' . 'images/cons.svg'}}" alt="" class="laptop-icon pr-1">Crack easily</li>
                                        <li><img src="{{asset('storage') . '/' . 'images/cons.svg'}}" alt="" class="laptop-icon pr-1">Warp easily</li>
                                        <li><img src="{{asset('storage') . '/' . 'images/cons.svg'}}" alt="" class="laptop-icon pr-1">Poor heat conductivity</li>
                                    </ul>
                                </div>
                            </div>
                            <p>In this case the chassis is made of polycarbonate, a plastic polymer.</p>
                            <p>Some type of polycarbonate can be lighter than aluminum, but compared to it's less sturdier and if it fall will crack very easily.</p>
                            <p>The heat conductivity of polycarbonate is terrible compared to the alloys above mentioned, this means one upside and one downside, the upside
                                is that the surface of your laptop will remain reasonably cool all the time, even under heavy loading, not causing discomfort during daily use. On the downside,
                                temperatures inside the laptop are going to be cause of stress to internal components. </p>
                            <hr class="my-5" />

                            <h4 class="text-center font-weight-bold">Plastic mixed with other materials</h4>
                            <p>Most laptops mix different materials in order to achieve different purposes.</p>
                            <p>In fact, you can find several laptops on the market that combine plastic with other materials, such as aluminum or even carbon fiber (ex. DELL XPS model).</p>
                            <p>In most cases the main chassis is made of plastic, whereas the lid is made of aluminum, combining the cheapness of plastic with the sturdiness of aluminum where it is most needed.</p>

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
