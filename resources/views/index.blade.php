@extends('layout.app')

@section('title')
    <title>Laptop Easy</title>
@endsection


@section('section')

    <header class="page-header page-header-dark bg-gradient-primary-to-secondary">
        <div class="page-header-content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h1 class="page-header-title text-center font-weight-bold">Find your best laptop</h1>
                        <p class="page-header-text mb-4 text-center">Welcome to Laptop Easy, a simple yet powerful search engine to find out the best laptop according to your needs, whether they be gaming, business or content creation.</p>

                        {{-- Sezione relativa al form --}}
                        <form>

                            <div class="form-container">
                                <div id="form-left" class="pt-3">

                                    <div class="mb-2 pt-5 clearfix better">
                                        <span class="float-right pl-4 pr-2 font-weight-bold">and better
                                            <span class="float-none"
                                                  data-toggle="tooltip"
                                                  data-placement="top"
                                                  title="Set to yes will also return laptops with better characteristics than the one selected.">
                                                <img class="question-icon"
                                                 src="{{asset('storage') . '/' . 'images/questionmark.svg'}}"
                                                 alt="info">
                                            </span>
                                        </span>
                                    </div>

                                    <div class="mb-3">
                                        <span><img class="tile-img" src="{{asset('storage') . '/' . 'images/cores.svg'}}" alt="cores"></span>

                                        <select class="w-30 js-basic-single-cpu" name="cpu" id="cpu">
                                            <option></option>
                                            @php
                                                foreach ($cpus as $cpu){
                                                    $array_cores[] = $cpu->cores;
                                                    $array_unique_cores = array_unique($array_cores);
                                                }

                                                sort($array_unique_cores);
                                            @endphp
                                            @foreach ($array_unique_cores as $core)
                                                <option value="{{ $core }}">{{ $core }}</option>
                                            @endforeach
                                        </select>
                                        <span class="better pr-2 pl-2 float-right">
                                            <input id="cpubettercheckbox" type="checkbox" name="cpubetter" value="1"/>
                                        </span>

                                    </div>

                                    <div class="mb-3">
                                        <span><img class="tile-img" src="{{asset('storage') . '/' . 'images/003-ram.svg'}}" alt="ram"></span>

                                        <select class="w-40 js-basic-multiple-ram" name="ram_memory" id="ram_memory">
                                            <option></option>

                                            {{--    per evitare duplicati nella select della Ram uso array_unique--}}
                                            {{--    cosa che non ho fatto nelle altre select perchè non ne hanno bisogno in quanto prendono i dati--}}
                                            {{--    dal loro model, forse è il caso di creare una model anche per la Ram?--}}
                                            @php
                                                foreach ($laptops as $laptop){
                                                    $array_ram[] = $laptop->ram_memory;
                                                    $array_unique_ram = array_unique($array_ram);
                                                }

                                                sort($array_unique_ram);
                                            @endphp
                                            @foreach ($array_unique_ram as $ram) {
                                            <option value="{{ $ram }}">{{ $ram }}Gb</option>
                                            @endforeach
                                        </select>
                                        <span class="better pr-2 pl-2 float-right">
                                            <input id="rambettercheckbox" type="checkbox" id="ram_better" value="1" />
                                        </span>

                                    </div>

                                    <div class="mb-3">

                                        <span><img class="tile-img" src="{{asset('storage') . '/' . 'images/chassis.svg'}}" alt="chassis"></span>

                                        <select class="w-60 js-basic-single-chassis" name="chassis" id="chassis">
                                            <option></option>
                                            <option value="premium">Premium (Aluminum, Magnesium) </option>
                                            <option value="mixed">Mixed (Aluminum and Plastic) </option>
                                            <option value="plastic">Plastic</option>
                                        </select>
                                        <span class="better pr-2 pl-2 float-right">
                                            <input id="chassisbettercheckbox" type="checkbox" name="chassisbetter" value="1" />
                                        </span>

                                    </div>

                                    <div class="mb-3">

                                        <span><img class="tile-img" src="{{asset('storage') . '/' . 'images/gpu.svg'}}" alt="gpu"></span>

                                        <select class="js-basic-single-videocard" name="video_card" id="videocard">
                                            <option></option>
                                            @foreach ($videocards as $videocard)
                                                <option value="{{ $videocard->name }}">{{ $videocard->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="better pr-2 pl-2 float-right">
                                            <input id="videocardbettercheckbox" type="checkbox" name="videocardbetter" value="1" />
                                        </span>

                                    </div>

                                </div>
                                <div id="form-right" class="card p-5">

                                    <div class="mb-5 text-center">
                                        <h4 class="text-center">Display size</h4>

                                        <div id="sliderDisplay" ></div>
                                    </div>

                                    <div class="mb-5">
                                        <h4 class="text-center">Weight</h4>
                                        <div id="sliderWeight"></div>
                                    </div>

                                    <div class="">
                                        <h4 class="text-center">Price</h4>
                                        <div id="sliderPrice"></div>
                                    </div>


                                </div>
                            </div>

                            <div id="filters" class="mt-5 card">
{{--                                <span>Backlit keyboard</span>--}}

                                    <div class="card-header">
                                        <span class="font-weight-bold">More Filters</span>
                                    </div>

                                    <div class="morefilter card-body-show">

                                        <div class="filter-box">

                                            <div>
                                                <span><img class="tile-img" src="{{asset('storage') . '/' . 'images/brand.svg'}}" alt="ram"></span>

                                                <select class="js-basic-single-brand" name="brand" id="brand">
                                                    <option></option>
                                                    @php
                                                        foreach ($laptops as $laptop){
                                                            $array_brands[] = $laptop->brand;
                                                            $array_unique_brands = array_unique($array_brands);
                                                        }

                                                        sort($array_unique_brands);
                                                    @endphp
                                                    @foreach ($array_unique_brands as $brand)
                                                        <option value="{{ $brand }}">{{ $brand }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mt-2">
                                                <span><img class="tile-img" src="{{asset('storage') . '/' . 'images/keyboard.svg'}}" alt="ram"></span>

                                                <select class="js-basic-single-keyboard" name="keyboard" id="keyboard">
                                                    <option></option>
                                                    <option value="nolight">No Backlit</option>
                                                    <option value="whitelit">White Backlit</option>
                                                    <option value="rgblight">RGB Backlit</option>
                                                    <option value="rgblight">Per-key RGB Backlit</option>
                                                </select>
                                            </div>


                                        </div>

                                        <div class="filter-box moreSlider float-right pr-2">

                                            <div id="laptopTemperature" class="">
                                                <div class="main">

                                                    <label for="panel_size" class="text-center">
                                                <span class="float-right"
                                                      data-toggle="tooltip"
                                                      data-placement="top"
                                                      title="Set the maximum temperature reachable by the surface of the
                                                   laptop when CPU/GPU run at high frequencies for extended periods of time.">
                                                <img class="question-icon"
                                                 src="{{asset('storage') . '/' . 'images/questionmark.svg'}}"
                                                 alt="info"></span>
                                                        Chassis Temperature (C°)
                                                        <span id="fahrenheit"></span>

                                                    </label>

                                                    <input
                                                        type="range"
                                                        name="laptopTemperature"
                                                        min="30"
                                                        max="65"
                                                        value="30"
                                                    >
                                                    <span class="rangeslider__tooltip" id ="range-tooltip-temperature"></span>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                            </div>

                            <div id="form-input" class="text-center mt-4">

                                <img src="{{asset('storage') . '/' . 'images/funnel.png'}}" alt="moreFilters" class="mr-4 mt-5 pointer" id="moreFilters">

                                <img src="{{asset('storage') . '/' . 'images/search.png'}}" alt="search" class="mr-2 ml-2 mt-5 pointer" id="bottone">
{{--                                <input class="mt-5 btn btn-teal btn-marketing rounded-pill lift lift-sm" id="bottone" value="Search">--}}

                                <img src="{{asset('storage') . '/' . 'images/reset.png'}}" alt="reset" class="ml-4 mt-5 pointer" id="reset">

                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="svg-border-rounded text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path></svg>
        </div>
    </header>


    <section id="show" class="bg-white py-5">
        <div class="container">

                <div class="lista row text-center">
                </div>

                <div id="pagina">
                </div>

        </div>


        <div class="svg-border-rounded text-light">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path></svg>
        </div>
    </section>


    <section class="bg-light py-3">
        <div class="container">
            <div class="row align-items-center justify-content-center">
            </div>
        </div>
    </section>

    <div id="compare-view" class="compare-hide">

        {{--    Viene popolato da Jquery    --}}

{{--        <div class="compare-view-box text-center" data-id="laptopId">--}}
{{--            <img src="{{asset('storage') . '/' . $laptop->image_path}}" alt="test">--}}
{{--            <h5>laptopName</h5>--}}
{{--        </div>--}}

        <div class="compare-view-button">
            <span id="compare-button">Compare</span>
        </div>
        <div class="compare-view-close-button">
            <img src="{{asset('storage') . '/' . 'images/close.svg'}}" alt="close-button">
        </div>
    </div>

{{--    <hr class="m-0" />--}}
@endsection

{{--          Sezione relativa ad Handlebars             --}}
<script id="entry-template" type="text/x-handlebars-template">
<div class="laptop col-lg-4 mb-5 mb-lg-5">
    <div class="card lift h-100">
        <div class="card-flag card-flag-green card-flag-top-right">@{{ price }}$</div>
        <div class="card-flag card-flag-top-left compare-add-button" data-id="@{{id}}">
            <img src="{{asset('storage') . '/' . 'images/plus.svg'}}" alt="add to compare">
        </div>
        <a href="{{route('index')}}/@{{id}}" href="{{route('index')}}/@{{id}}" target="_blank" rel="noopener noreferrer" class="text-decoration-none" id="card-clickable">
            <div class="laptop-img">
                <img class="card-img-top" src="{{asset('storage')}}/@{{image_path}}" alt="@{{image_path}}">
            </div>
            <div class="card-body">
                <h3 class="text-success mb-0">@{{brand}}</h3>
                <div id="laptopName" class="small text-gray-800 font-weight-500">@{{name}}</div>
                <div class="small text-gray-500">GPU: @{{videocard_name}}</div>
                <div class="small text-gray-500">CPU: @{{cpu_name}}</div>
                <div class="tile pt-3 pb-2">
                    <span class="single-tile"><img class="tile-img" src="{{asset('storage') . '/' . 'images/size.svg'}}"
                                                   alt="screen_size"> @{{display_size}}"</span>
                    <span class="single-tile"><img class="tile-img"
                                                   src="{{asset('storage') . '/' . 'images/003-ram.svg'}}" alt="ram"> @{{ram_memory}}Gb</span>
                    <span class="single-tile"><img class="tile-img"
                                                   src="{{asset('storage') . '/' . 'images/weight.svg'}}" alt="ram"> @{{weight}}</span>
                </div>
            </div>
        </a>
{{--            <div class="card-footer bg-transparent border-top d-flex align-items-center justify-content-between">--}}
{{--                <a href="{{route('index')}}/@{{id}}" href="{{route('index')}}/@{{id}}" target="_blank" rel="noopener noreferrer" class="small text-gray-500">View Full Specs</a>--}}
{{--                <div class="small text-gray-500">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline>--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--            </div>--}}
    </div>
</div>
</script>

{{--<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>--}}
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>--}}
{{--<script src="{{ asset('js/template.js') }}"></script>--}}
{{--<script src="{{ asset('js/lc_switch.min.js') }}"></script>--}}
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
{{--<script src="{{ asset('js/nouislider.min.js') }}"></script>--}}
{{--<script src="{{ asset('js/wNumb.min.js') }}" ></script>--}}
{{--<script src="{{ asset('js/rangeslider.min.js') }}"></script>--}}
{{--<script src="{{ asset('js/underscore-min.js') }}"></script>--}}
{{--<script src="{{ asset('js/moreFiltersB.js') }}"></script>--}}
{{--<script src="{{ asset('js/show.js') }}"></script>--}}
{{--<script src="{{ asset('js/compare.js') }}"></script>--}}






