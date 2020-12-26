@extends('layout.app')

@section('title')
    Laptop Easy
@endsection


@section('section')

    <header class="page-header page-header-dark bg-gradient-primary-to-secondary">
        <div class="page-header-content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h1 class="page-header-title text-center">Find your best laptop</h1>
                        <p class="page-header-text mb-5 text-center">Welcome to Laptop Easy, a simple yet powerful search engine to find out the best laptop according to your needs, whether they be for gaming, business or content creation.</p>

                        {{-- Sezione relativa al form --}}
                        <form>

                            <div class="form-container">
                                <div id="form-left">
                                    <div class="mb-4">
                                        <select class="w-50 js-basic-single-videocard" name="video_card" id="videocard">
                                            <option></option>
                                            @foreach ($videocards as $videocard)
                                                <option value="{{ $videocard->name }}">{{ $videocard->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="better pr-2 pl-2">And better</span>
                                        <input id="videocardbettercheckbox" type="checkbox" name="videocardbetter" value="1" />
                                    </div>

                                    <div class="mb-4">
                                        <select class="w-50 js-basic-single-cpu" name="cpu" id="cpu">
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
                                        <span class="better pr-2 pl-2">And better</span>
                                        <input id="cpubettercheckbox" type="checkbox" name="cpubetter" value="1" />
                                    </div>

                                    <div class="mb-4">
                                        <select class="w-50 js-basic-multiple-ram" name="ram_memory" id="ram_memory">
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
                                        <span class="better pr-2 pl-2">And better</span>
                                        <input id="rambettercheckbox" type="checkbox" id="ram_better" value="1" />
                                    </div>

                                    <div>
                                        <select class="w-50 js-basic-single-chassis" name="chassis" id="chassis">
                                            <option></option>
                                                <option value="premium">Premium (CNC Aluminum, Magnesium) </option>
                                                <option value="mixed">Mixed (Aluminum and Plastic) </option>
                                                <option value="plastic">Plastic</option>
                                        </select>
                                        <span class="better pr-2 pl-2">And better</span>
                                        <input id="chassisbettercheckbox" type="checkbox" name="chassisbetter" value="1" />
                                    </div>

                                </div>
                                <div id="form-right">

                                    <div class="mb-5">
                                        <h4 class="text-center text-white">Display size</h4>
                                        <div id="sliderDisplay" ></div>
                                    </div>

                                    <div class="mb-5">
                                        <h4 class="text-center text-white">Weight</h4>
                                        <div id="sliderWeight"></div>
                                    </div>

                                    <div class="pt-3">
                                        <h4 class="text-center text-white">Price</h4>
                                        <div id="sliderPrice"></div>
                                    </div>


                                </div>
                            </div>

                            <div id="filters" class="mt-5">
{{--                                <span>Per-key RGB</span>--}}

                                <div class="moreSlider">

                                    <div id="laptopTemperature" class="mt-3">
                                        <div class="main">

                                            <label for="panel_size" class="text-center">
                                                <span class="float-right"
                                                  data-toggle="tooltip"
                                                  data-placement="top"
                                                  title="Set the maximum temperature reachable by the surface of the
                                                   laptop when CPU/GPU run at high frequencies for extended periods of time.">
                                            <img class="question-icon" src="{{asset('storage') . '/' . 'images/information.png'}}"
                                                 alt="info"></span>
                                                Laptop Temperature (C°)
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

                            <div id="form-input" class="text-center mt-5">

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

{{--    <hr class="m-0" />--}}
@endsection

{{--          Sezione relativa ad Handlebars             --}}
<script id="entry-template" type="text/x-handlebars-template">
    <div class="laptop col-lg-4 mb-5 mb-lg-5">
        <a class="card lift h-100" href="{{route('index')}}/@{{id}}" target="_blank" rel="noopener noreferrer"><div class="card-flag card-flag-green card-flag-top-right">@{{ price }}$</div>
            <div class="laptop-img">
            <img class="card-img-top" src="{{asset('storage')}}/@{{image_path}}" alt="@{{image_path}}">
            </div>
            <div class="card-body">
                <h3 class="text-success mb-0">@{{brand}}</h3>
                <div class="small text-gray-800 font-weight-500">@{{name}}</div>
                <div class="small text-gray-500">GPU: @{{videocard_name}}</div>
                <div class="small text-gray-500">CPU: @{{cpu_name}}</div>
<!--                <div class="small text-gray-500">Display: @{{display_size}}"</div>-->
<!--                <div class="small text-gray-500">Ram: @{{ram_memory}}Gb</div>-->
                <div class="tile pt-3 pb-2">
                    <span class="single-tile"><img class="tile-img" src="{{asset('storage') . '/' . 'images/size.svg'}}" alt="screen_size"> @{{display_size}}"</span>
                    <span class="single-tile"><img class="tile-img" src="{{asset('storage') . '/' . 'images/003-ram.svg'}}" alt="ram"> @{{ram_memory}}Gb</span>
                    <span class="single-tile"><img class="tile-img" src="{{asset('storage') . '/' . 'images/weight.svg'}}" alt="ram"> @{{weight}}</span>
                </div>
            </div>
<!--            <div class="card-footer bg-transparent border-top d-flex align-items-center justify-content-between">-->
<!--                <div class="small text-gray-500">View Full Specs</div>-->
<!--                <div class="small text-gray-500"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></div></div></a>-->
    </div>
</script>





