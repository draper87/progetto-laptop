@extends('layout.app')

@section('title')
    <title>{{$laptop->name}}</title>
@endsection


@section('section')

    <header class="page-header page-header-dark bg-gradient-primary-to-secondary">
        <div class="page-header-content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 text-center pb-2">
                        <h1 class="page-header-title font-weight-bold">{{$laptop->name}}</h1>
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


    <section id="show" class="bg-white py-5">

        {{--        Contenuto         --}}
        <div class="container">

            <div class="box-product mb-3">

                <div class="card description mb-2 lift">
                    <h5 class="card-header">Description</h5>
                    <div class="card-body-show">
                        <span class="card-text">The {{$laptop->name}} comes with {{$laptop->ram_memory}}Gb of Ram, a {{$laptop->display_size}}" display and its chassis is made</span>
                        @if($laptop->material == 'plastic')
                            <span class="font-weight-bold"> of plastic.</span>
                        @elseif($laptop->material == 'mixed')
                            <span class="font-weight-bold"> of plastic and aluminum.</span>
                        @elseif($laptop->material == 'aluminum')
                            <span class="font-weight-bold"> entirely of aluminum.</span>
                        @else
                            <span class="font-weight-bold"> entirely of magnesium.</span>
                        @endif
                        @if($laptop->videocard->score > 5000 && $laptop->videocard->score < 10000)
                            <span> It comes with a {{$laptop->videocard_name}}, a GPU suitable for gaming, although <span
                                    class="font-weight-bold">expected to play at medium-high settings</span> with recent videogames in FHD.</span>
                        @elseif ($laptop->videocard->score > 10000)
                            <span> The {{$laptop->videocard_name}} it's a good choice for gaming, <span
                                    class="font-weight-bold">expect to play at ultra settings</span> with recent videogames in FHD.</span>
                        @else ($laptop->videocard->score > 10000)
                            <span> Not a very good choice for gaming, <span class="font-weight-bold">expect to play at low settings</span> with recent videogames.</span>
                        @endif
                        @if($laptop->weight < 1.5)
                            <span> Very <span class="font-weight-bold">lightweight</span> laptop, the best option in case you always need to bring it with you.</span>
                        @elseif ($laptop->weight > 3.5)
                            <span> Due to it's weight consider this laptop as a desktop replacement.</span>
                        @endif
                        @if($laptop->max_temp > 60)
                            <span> This laptop <span class="font-weight-bold">tend to overheat</span> considerably during gaming session or heavy video editing, consider it before buying.</span>
                        @endif
                    </div>
                </div>

                <div class="card amazon_logo mb-2 lift">
                    <h5 class="card-header">Buy on Amazon</h5>
                    <a href="#"><img src="{{asset('storage') . '/' . 'images/amazon.png'}}" alt="amazon_logo"></a>
                </div>

                <div class="left-box card">

                    @if(isset($laptop->image_path))
                        <img src="{{asset('storage') . '/' . $laptop->image_path}}" alt="laptop">
                    @else
                        <img src="{{asset('storage') . '/' . 'images/laptop.jpg'}}" alt="laptop">
                    @endif

                </div>
                <div class="right-box">

                    <div class="laptop-info mb-2">

                        <div id="price-info" class="box card">

                            <div class="text-center pt-3 pb-2 box-image">
                                <img src="{{asset('storage') . '/' . 'images/price-tag.png'}}" alt="price" data-toggle="tooltip" data-placement="top"
                                     title="Price">
                            </div>
                            <ul class="list-group list-group-flush text-center pt-3">
                                <li class="list-group-item list-group-item-dark font-weight-200">{{$laptop->price}}$</li>
                            </ul>

                        </div>

                        <div id="display-size-info" class="box card">

                            <div class="text-center pt-3 pb-2 box-image">
                                <img src="{{asset('storage') . '/' . 'images/size.png'}}" alt="display-size" data-toggle="tooltip" data-placement="top"
                                     title="Display size">
                            </div>
                            <ul class="list-group list-group-flush text-center pt-2">
                                <li class="list-group-item list-group-item-dark font-weight-200">{{$laptop->display_size}}"</li>
                            </ul>

                        </div>

                    </div>

                    <div class="laptop-info mb-2">



                        <div id="ram-memory-info" class="box card">

                            <div class="text-center pt-3 pb-2 box-image">
                                <img src="{{asset('storage') . '/' . 'images/ram.png'}}" alt="ram" data-toggle="tooltip" data-placement="top"
                                     title="Ram">
                            </div>
                            <ul class="list-group list-group-flush text-center pt-2">
                                <li class="list-group-item list-group-item-dark font-weight-200">{{$laptop->ram_memory}}Gb</li>
                            </ul>

                        </div>

                        <div id="battery-info" class="box card">

                            <div class="text-center pt-3 pb-2 box-image">
                                <img src="{{asset('storage') . '/' . 'images/battery.png'}}" alt="ram" data-toggle="tooltip" data-placement="top"
                                     title="Battery size">
                            </div>
                            <ul class="list-group list-group-flush text-center pt-2">
                                <li class="list-group-item list-group-item-dark font-weight-200">{{$laptop->battery}}Wh</li>
                            </ul>

                        </div>

                    </div>

                    <div class="laptop-info">

                        <div id="storage-info" class="box card">

                            <div class="text-center pt-3 pb-2 box-image">
                                <img src="{{asset('storage') . '/' . 'images/ssd.png'}}" alt="ssd" data-toggle="tooltip" data-placement="top"
                                     title="Storage">
                            </div>
                            <ul class="list-group list-group-flush text-center pt-2">
                                <li class="list-group-item list-group-item-dark font-weight-200">{{$laptop->storage_size}}Gb</li>
                            </ul>

                        </div>

                        <div id="weight-info" class="box card">

                            <div class="text-center pt-3 pb-2 box-image">
                                <img src="{{asset('storage') . '/' . 'images/weight.png'}}" alt="ram" data-toggle="tooltip" data-placement="top"
                                     title="Weight">
                            </div>
                            <ul class="list-group list-group-flush text-center pt-2">
                                <li class="list-group-item list-group-item-dark font-weight-200">{{$laptop->weight}}Kg</li>
                            </ul>

                        </div>

                    </div>

                </div>

            </div>

            {{--     Sezione card grandi       --}}

            <div class="box-product mb-3">

                <div id="cpu-info" class="box card pt-5 lift">

                    <div class="text-center box-image">
                        <img src="{{asset('storage') . '/' . 'images/cpu.png'}}" alt="cpu">
                    </div>
                    <ul class="list-group list-group-flush pt-5 text-center">
                        <li class="list-group-item">{{$laptop->cpu_name}}</li>
                        <li class="list-group-item list-group-item-dark"># Cores: {{$laptop->cpu->cores}}</li>
                        <li class="list-group-item list-group-item-dark">Passmark© Score: {{$laptop->cpu->score}}
                            <span class="float-right" data-toggle="tooltip" data-placement="top"
                                  title="Show the score of the CPU based on the Passmark© benchmark. The higher the better."><img
                                    src="{{asset('storage') . '/' . 'images/info.png'}}" alt="info"></span></li>
                    </ul>

                </div>

                <div id="videocard-info" class="box card pt-5 lift">

                    <div class="text-center box-image">
                        <img src="{{asset('storage') . '/' . 'images/gpu.png'}}" alt="cpu">
                    </div>

                    <ul class="list-group list-group-flush pt-5 text-center">
                        <li class="list-group-item">{{$laptop->videocard_name}}</li>
                        <li class="list-group-item list-group-item-dark">Passmark© Score: {{$laptop->videocard->score}}
                            <span class="float-right" data-toggle="tooltip" data-placement="top"
                                  title="Show the score of the GPU based on the Passmark© benchmark. The higher the better."><img
                                    src="{{asset('storage') . '/' . 'images/info.png'}}" alt="info"></span></li>
                    </ul>

                </div>

                <div id="motherboard" class="box card pt-5 lift">

                    <div class="text-center box-image">
                        <img src="{{asset('storage') . '/' . 'images/usb-port.png'}}">
                    </div>
                    <ul class="list-group list-group-flush text-center pt-3">
                        <li class="list-group-item">Connections</li>
                        <li class="list-group-item list-group-item-dark">
                        @if($laptop->connections)
                        {{$laptop->connections}}
                        @else
                        We don't have such information about this laptop.
                        @endif
                        </li>
                    </ul>

                </div>

            </div>

            <div class="box-product">

                <div id="max-temperature" class="box card pt-4 lift">

                    <div id="thermometer" class="box-image">
                        <div class="thermo-container">
                            <div class="outer-circle">
                                <div class="middle-circle">
                                    <div class="inner-circle">
                                        <span class="top">2</span>
                                        <span class="mid">{{$laptop->max_temp}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-list">
                        <ul class="list-group list-group-flush pt-4 text-center">
                            <li class="list-group-item">Chassis Max Temperature
                                <span class="float-right" data-toggle="tooltip" data-placement="top"
                                      title="Maximum temperature reached by laptop's chassis with CPU/GPU running at high rate clock."><img
                                        src="{{asset('storage') . '/' . 'images/info.png'}}" alt="info"></span></li>
                            <li class="list-group-item list-group-item-dark font-weight-200">
                                @if($laptop->max_temp <= 41 && $laptop->max_temp != 0)
                                    At this temperature placing the notebook on your lap, even for prolonged period of time does not cause any discomfort.
                                @elseif ($laptop->max_temp == 0)
                                    We don't have such information about this laptop.
                                @elseif ($laptop->max_temp > 41 && $laptop->max_temp < 50)
                                    Start to feel hot! Placing the notebook on your lap for a prolonged period of time may cause you discomfort.
                                @else
                                    Burning! At this temperature even laptop's keyboard may result in causing discomfort at your finger.
                                @endif
                            </li>
                        </ul>
                    </div>

                </div>

                <div id="max-noise" class="box card pt-4 lift">

                    <div class="box-image text-center box-image">
                        <img src="{{asset('storage') . '/' . 'images/fan.png'}}" alt="cpu">

                        <h5 class="text-center font-weight-bold pt-2">
                            @if($laptop->max_noise == 0)
                            N.D.
                            @else
                            {{$laptop->max_noise}}db
                            @endif
                        </h5>
                    </div>



                    <div class="box-list">
                        <ul class="list-group list-group-flush pt-4 text-center">
                            <li class="list-group-item">Fans Loudness
                                <span class="float-right" data-toggle="tooltip" data-placement="top"
                                      title="Maximum noise produced by the fans laptop with CPU/GPU running at high rate clock."><img
                                        src="{{asset('storage') . '/' . 'images/info.png'}}" alt="info"></span>
                            </li>
                            <li class="list-group-item list-group-item-dark font-weight-200">
                                @if($laptop->max_noise <= 35 && $laptop->max_noise != 0)
                                    At this level fan noise is quite inaudible or inaudible at all.
                                @elseif ($laptop->max_noise == 0)
                                    We don't have such information about this laptop.
                                @elseif ($laptop->max_noise > 35 && $laptop->max_noise < 50)
                                    Start to feel something! At this level fan noise start to be cause of distraction for you and people around.
                                @else
                                    Loud! Over 50db fan noise start to be cause of discomfort. In this case a pair of headphone is mandatory.
                                @endif
                            </li>
                        </ul>
                    </div>


                </div>

                <div id="motherboard-info" class="box card pt-5 lift">

                    <div class="text-center box-image">
                        <img src="{{asset('storage') . '/' . 'images/ethernet.png'}}" alt="cpu">
                    </div>

                    <ul class="list-group list-group-flush pt-4 text-center">

                        <li class="list-group-item">Network</li>
                        <li class="list-group-item list-group-item-dark font-weight-300">
                            @if($laptop->network)
                            {{$laptop->network}}
                            @else
                            We don't have such information about this laptop.
                            @endif
                        </li>
                    </ul>

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

{{--    <hr class="m-0"/>--}}


@endsection

<link rel="stylesheet" href="{{asset('css/show.css')}}">
<link rel="stylesheet" href="{{asset('css/thermometer.css')}}">
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/template.js') }}"></script>





