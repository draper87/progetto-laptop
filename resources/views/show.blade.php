@extends('layout.app')

@section('title')
    Laptop Easy
@endsection


@section('section')

    <header class="page-header page-header-dark bg-gradient-primary-to-secondary">
        <div class="page-header-content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 text-center pb-2">
                        <h1 class="page-header-title">{{$laptop->name}}</h1>
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

                <div class="left-box">
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

            <div class="box-product mb-3">

                <div id="cpu-info" class="box card pt-5">

                    <div class="text-center box-image">
                        <img src="{{asset('storage') . '/' . 'images/cpu.png'}}" alt="cpu">
                    </div>
                    <ul class="list-group list-group-flush pt-5 text-center">
                        <li class="list-group-item">{{$laptop->cpu_name}}</li>
                        <li class="list-group-item list-group-item-dark"># Cores: {{$laptop->cpu->cores}}</li>
                    </ul>

                </div>

                <div id="videocard-info" class="box card pt-5">

                    <div class="text-center box-image">
                        <img src="{{asset('storage') . '/' . 'images/gpu.png'}}" alt="cpu">
                    </div>

                    <ul class="list-group list-group-flush pt-5 text-center">
                        <li class="list-group-item">{{$laptop->videocard_name}}</li>
                        <li class="list-group-item list-group-item-dark">Passmark Score: {{$laptop->videocard->score}}
                            <span class="float-right" data-toggle="tooltip" data-placement="top"
                                  title="Show the score of the video card based on the Passmark benchmark. The higher the better."><img
                                    src="{{asset('storage') . '/' . 'images/info.png'}}" alt="info"></span></li>
                    </ul>

                </div>

                <div id="motherboard" class="box card pt-5">

                    <div class="text-center box-image">
                        <img src="{{asset('storage') . '/' . 'images/motherboard.png'}}">
                    </div>
                    <ul class="list-group list-group-flush text-center pt-3">
                        <li class="list-group-item">Motherboard</li>
                        <li class="list-group-item list-group-item-dark">{{$laptop->motherboard}}</li>
                    </ul>

                </div>

            </div>

            <div class="box-product">

                <div id="max-temperature" class="box card pt-4">

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
                            <li class="list-group-item">Chassis Max Temperature</li>
                            <li class="list-group-item list-group-item-dark font-weight-200">
                                @if($laptop->max_temp < 41)
                                    At this temperature the laptop should feel comfortable if lapped on your knee.
                                @elseif ($laptop->max_temp > 41 || $laptop->max_temp < 50)
                                    Start to feel hot! Long session with CPU running high could result in uncomfortable feeling with the laptop lapped on your knee.
                                @else
                                    Burning!! Above this temperature even laptop's keyboard could start to feel uncomfortable when pressed.
                                @endif
                            </li>
                        </ul>
                    </div>

                </div>

                <div id="max-noise" class="box card pt-4">

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
                            <li class="list-group-item">Laptop Max Loudness
                                <span class="float-right" data-toggle="tooltip" data-placement="top"
                                      title="Maximum noise produced by the fans laptop with CPU/GPU running at high rate clock."><img
                                        src="{{asset('storage') . '/' . 'images/info.png'}}" alt="info"></span>
                            </li>
                            <li class="list-group-item list-group-item-dark font-weight-200">
                                @if($laptop->max_noise <= 35 && $laptop->max_noise != 0)
                                    At this level noise is quite or inaudible at all.
                                @elseif ($laptop->max_noise == 0)
                                    We don't have such information about this laptop.
                                @elseif ($laptop->max_noise > 35 || $laptop->max_noise < 50)
                                    Start to feel something! At this level noise is audible and long session with laptop's fans running high could result in uncomfortable session.
                                @else
                                    Loud!!! Over 50db noise start to be cause of distraction. In case of long session with laptop's fans running high a pair of headphone is mandatory.
                                @endif
                            </li>
                        </ul>
                    </div>


                </div>

                <div id="motherboard-info" class="box card pt-5">

                    <div class="text-center box-image">
                        <img src="{{asset('storage') . '/' . 'images/ethernet.png'}}" alt="cpu">
                    </div>

                    <ul class="list-group list-group-flush pt-4 text-center">

                        <li class="list-group-item">Network</li>
                        <li class="list-group-item list-group-item-dark font-weight-300">{{$laptop->network}}</li>
                    </ul>

                </div>


            </div>

            <div class="card mt-4 mb-2">
                <h5 class="card-header">Description</h5>
                <div class="card-body">
                    <p class="card-text">The {{$laptop->name}} is equipped with a chassis made of {{$laptop->material}}, {{$laptop->ram_memory}}Gb of Ram, a {{$laptop->display_size}}" monitor, and
                        it costs {{$laptop->price}}$</p>
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


    <section class="bg-light py-10">
        <div class="container">
            <div class="row align-items-center justify-content-center">
            </div>
        </div>
    </section>

    <hr class="m-0"/>


@endsection

<link rel="stylesheet" href="{{asset('css/show.css')}}">
<link rel="stylesheet" href="{{asset('css/thermometer.css')}}">




