@extends('layout.app')

@section('title')
    <title>Compare Products</title>
@endsection


@section('section')

    <header class="page-header page-header-dark bg-gradient-primary-to-secondary">
        <div class="page-header-content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 text-center pb-2">
                        <h1 class="page-header-title font-weight-bold">Compare Products</h1>
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


    <section id="compare-products" class="bg-white py-5">

        {{--        Contenuto         --}}
        <div class="container">

            <div class="compare-image">
                <div class="vuoto compare-image-box"></div>
                <div class="compare-image-box">
                    <a href="{{route('show', $laptop1)}}">
                        <img src="{{asset('storage') . '/' . $laptop1->image_path}}" alt="laptop1">
                    </a>
                </div>
                <div class="compare-image-box">
                    <a href="{{route('show', $laptop2)}}">
                        <img src="{{asset('storage') . '/' . $laptop2->image_path}}" alt="laptop2">
                    </a>
                </div>
                @if($laptop3)
                <div class="compare-image-box">
                    <a href="{{route('show', $laptop3)}}">
                        <img src="{{asset('storage') . '/' . $laptop3->image_path}}" alt="laptop3">
                    </a>
                </div>
                {{--          Sistemare problema del laptop3 che da errore se cerco di compare solo 2 laptop          --}}
                @else


                @endif
            </div>

            <div class="compare-specs">
                <div class="compare-specs-box">
                    <ul>
                        <li>Name</li>
                        <li>Brand</li>
                        <li>Chassis Material</li>
                        <li>Ram</li>
                        <li>Network</li>
                        <li>Connections</li>
                        <li>Cpu Name</li>
                        <li>Cpu Score</li>
                        <li>Display size</li>
                        <li>Storage</li>
                        <li>GPU</li>
                        <li>GPU Score</li>
                        <li>Battery</li>
                        <li>Weight</li>
                        <li>Max temp</li>
                        <li>Max noise</li>
                        <li>Price</li>
                        <li>Buy it on Amazon</li>
                    </ul>
                </div>
                <div class="compare-specs-box border-left">
                    <ul>
                        <li>{{$laptop1->name}}</li>
                        <li>{{$laptop1->brand}}</li>
                        <li>
                            @if($laptop1->material == 'mixed')
                                Plastic & Aluminum
                            @else
                                {{$laptop1->material}}
                            @endif
                        </li>

                        @if($laptop1->ram_memory >= $laptop2->ram_memory && $laptop1->ram_memory >= $laptop3->ram_memory)
                            <li class="highlight">{{$laptop1->ram_memory}}Gb</li>
                        @else
                            <li>{{$laptop1->ram_memory}}Gb</li>
                        @endif

                        <li>{{$laptop1->network}}</li>
                        <li>{{$laptop1->connections}}</li>
                        <li>{{$laptop1->cpu_name}}</li>

                        @if($laptop1->cpu->score >= $laptop2->cpu->score && $laptop1->cpu->score >= $laptop3->cpu->score)
                            <li class="highlight">{{$laptop1->cpu->score}}</li>
                        @else
                            <li>{{$laptop1->cpu->score}}</li>
                        @endif

                        <li>{{$laptop1->display_size}}"</li>
                        <li>{{$laptop1->storage_size}}Gb</li>
                        <li>{{$laptop1->videocard_name}}</li>

                        @if($laptop1->videocard->score >= $laptop2->videocard->score && $laptop1->videocard->score >= $laptop3->videocard->score)
                            <li class="highlight">{{$laptop1->videocard->score}}</li>
                        @else
                            <li>{{$laptop1->videocard->score}}</li>
                        @endif

                        @if($laptop1->battery >= $laptop2->battery && $laptop1->battery >= $laptop3->battery)
                            <li class="highlight">{{$laptop1->battery}}Wh</li>
                        @else
                            <li>{{$laptop1->battery}}Wh</li>
                        @endif

                        <li>{{$laptop1->weight}}Kg</li>

                        @if($laptop1->max_temp <= $laptop2->max_temp && $laptop1->max_temp <= $laptop3->max_temp && $laptop1->max_temp != 0)
                            <li class="highlight">{{$laptop1->max_temp}}C°</li>
                        @else
                            <li>{{$laptop1->max_temp}}C°</li>
                        @endif

                        @if($laptop1->max_noise <= $laptop2->max_noise && $laptop1->max_noise <= $laptop3->max_noise && $laptop1->max_noise != 0)
                            <li class="highlight">{{$laptop1->max_noise}}db</li>
                        @else
                            <li>{{$laptop1->max_noise}}db</li>
                        @endif

                        @if($laptop1->price <= $laptop2->price && $laptop1->price <= $laptop3->price && $laptop1->price != 0)
                            <li class="highlight">{{$laptop1->price}}$</li>
                        @else
                            <li>{{$laptop1->price}}$</li>
                        @endif

                    </ul>
                </div>
                <div class="compare-specs-box border-left">
                    <ul>
                        <li>{{$laptop2->name}}</li>
                        <li>{{$laptop2->brand}}</li>
                        <li>
                            @if($laptop2->material == 'mixed')
                                Plastic & Aluminum
                            @else
                                {{$laptop2->material}}
                            @endif
                        </li>

                        @if($laptop2->ram_memory >= $laptop1->ram_memory && $laptop2->ram_memory >= $laptop3->ram_memory)
                            <li class="highlight">{{$laptop2->ram_memory}}Gb</li>
                        @else
                            <li>{{$laptop1->ram_memory}}Gb</li>
                        @endif

                        <li>{{$laptop2->network}}</li>
                        <li>{{$laptop2->connections}}</li>
                        <li>{{$laptop2->cpu_name}}</li>

                        @if($laptop2->cpu->score >= $laptop1->cpu->score && $laptop2->cpu->score >= $laptop3->cpu->score)
                            <li class="highlight">{{$laptop2->cpu->score}}</li>
                        @else
                            <li>{{$laptop2->cpu->score}}</li>
                        @endif

                        <li>{{$laptop2->display_size}}"</li>
                        <li>{{$laptop2->storage_size}}Gb</li>
                        <li>{{$laptop2->videocard_name}}</li>

                        @if($laptop2->videocard->score >= $laptop1->videocard->score && $laptop2->videocard->score >= $laptop3->videocard->score)
                            <li class="highlight">{{$laptop2->videocard->score}}</li>
                        @else
                            <li>{{$laptop2->videocard->score}}</li>
                        @endif

                        @if($laptop2->battery >= $laptop1->battery && $laptop2->battery >= $laptop3->battery)
                            <li class="highlight">{{$laptop2->battery}}Wh</li>
                        @else
                            <li>{{$laptop2->battery}}Wh</li>
                        @endif

                        <li>{{$laptop2->weight}}Kg</li>

                        @if($laptop2->max_temp <= $laptop1->max_temp && $laptop2->max_temp <= $laptop3->max_temp && $laptop2->max_temp != 0)
                            <li class="highlight">{{$laptop2->max_temp}}C°</li>
                        @else
                            <li>{{$laptop2->max_temp}}C°</li>
                        @endif

                        @if($laptop2->max_noise <= $laptop1->max_noise && $laptop2->max_noise <= $laptop3->max_noise && $laptop2->max_noise != 0)
                            <li class="highlight">{{$laptop2->max_noise}}db</li>
                        @else
                            <li>{{$laptop2->max_noise}}db</li>
                        @endif

                        @if($laptop2->price <= $laptop1->price && $laptop2->price <= $laptop3->price && $laptop2->price != 0)
                            <li class="highlight">{{$laptop2->price}}$</li>
                        @else
                            <li>{{$laptop2->price}}$</li>
                        @endif
                    </ul>
                </div>

                @if($laptop3)
                <div class="compare-specs-box border-left">
                    <ul>
                        <li>{{$laptop3->name}}</li>
                        <li>{{$laptop3->brand}}</li>
                        <li>
                            @if($laptop3->material == 'mixed')
                                Plastic & Aluminum
                            @else
                                {{$laptop3->material}}
                            @endif
                        </li>

                        @if($laptop3->ram_memory >= $laptop1->ram_memory && $laptop3->ram_memory >= $laptop2->ram_memory)
                            <li class="highlight">{{$laptop3->ram_memory}}Gb</li>
                        @else
                            <li>{{$laptop3->ram_memory}}Gb</li>
                        @endif

                        <li>{{$laptop3->network}}</li>
                        <li>{{$laptop3->connections}}</li>
                        <li>{{$laptop3->cpu_name}}</li>

                        @if($laptop3->cpu->score >= $laptop1->cpu->score && $laptop3->cpu->score >= $laptop2->cpu->score)
                            <li class="highlight">{{$laptop3->cpu->score}}</li>
                        @else
                            <li>{{$laptop3->cpu->score}}</li>
                        @endif

                        <li>{{$laptop3->display_size}}"</li>
                        <li>{{$laptop3->storage_size}}Gb</li>
                        <li>{{$laptop3->videocard_name}}</li>

                        @if($laptop3->videocard->score >= $laptop1->videocard->score && $laptop3->videocard->score >= $laptop2->videocard->score)
                            <li class="highlight">{{$laptop3->videocard->score}}</li>
                        @else
                            <li>{{$laptop3->videocard->score}}</li>
                        @endif

                        @if($laptop3->battery >= $laptop1->battery && $laptop3->battery >= $laptop2->battery)
                            <li class="highlight">{{$laptop3->battery}}Wh</li>
                        @else
                            <li>{{$laptop3->battery}}Wh</li>
                        @endif

                        <li>{{$laptop3->weight}}Kg</li>

                        @if($laptop3->max_temp <= $laptop1->max_temp && $laptop3->max_temp <= $laptop2->max_temp && $laptop3->max_temp != 0)
                            <li class="highlight">{{$laptop3->max_temp}}C°</li>
                        @else
                            <li>{{$laptop3->max_temp}}C°</li>
                        @endif

                        @if($laptop3->max_noise <= $laptop1->max_noise && $laptop3->max_noise <= $laptop2->max_noise && $laptop3->max_noise != 0)
                            <li class="highlight">{{$laptop3->max_noise}}db</li>
                        @else
                            <li>{{$laptop3->max_noise}}db</li>
                        @endif

                        @if($laptop3->price <= $laptop1->price && $laptop3->price <= $laptop2->price && $laptop3->price != 0)
                            <li class="highlight">{{$laptop3->price}}$</li>
                        @else
                            <li>{{$laptop3->price}}$</li>
                        @endif
                    </ul>
                </div>
                @endif

            </div>



        </div>

        {{--   Fine contenuto    --}}

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

<link rel="stylesheet" href="{{asset('css/compare.css')}}">
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/template.js') }}"></script>






