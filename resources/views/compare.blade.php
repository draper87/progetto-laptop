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
                        <li>{{$laptop1->material}}</li>
                        <li>{{$laptop1->ram_memory}}Gb</li>
                        <li>{{$laptop1->network}}</li>
                        <li>{{$laptop1->connections}}</li>
                        <li>{{$laptop1->cpu_name}}</li>
                        <li>{{$laptop1->cpu->score}}</li>
                        <li>{{$laptop1->display_size}}"</li>
                        <li>{{$laptop1->storage_size}}Gb</li>
                        <li>{{$laptop1->videocard_name}}</li>
                        <li>{{$laptop1->videocard->score}}</li>
                        <li>{{$laptop1->battery}}Wh</li>
                        <li>{{$laptop1->weight}}Kg</li>
                        <li>{{$laptop1->max_temp}}C°</li>
                        <li>{{$laptop1->max_noise}}db</li>
                        <li>{{$laptop1->price}}$</li>
                    </ul>
                </div>
                <div class="compare-specs-box border-left">
                    <ul>
                        <li>{{$laptop2->name}}</li>
                        <li>{{$laptop2->brand}}</li>
                        <li>{{$laptop2->material}}</li>
                        <li>{{$laptop2->ram_memory}}Gb</li>
                        <li>{{$laptop2->network}}</li>
                        <li>{{$laptop2->connections}}</li>
                        <li>{{$laptop2->cpu_name}}</li>
                        <li>{{$laptop2->cpu->score}}</li>
                        <li>{{$laptop2->display_size}}"</li>
                        <li>{{$laptop2->storage_size}}Gb</li>
                        <li>{{$laptop2->videocard_name}}</li>
                        <li>{{$laptop2->videocard->score}}</li>
                        <li>{{$laptop2->battery}}Wh</li>
                        <li>{{$laptop2->weight}}Kg</li>
                        <li>{{$laptop2->max_temp}}C°</li>
                        <li>{{$laptop2->max_noise}}db</li>
                        <li>{{$laptop2->price}}$</li>
                    </ul>
                </div>

                @if($laptop3)
                <div class="compare-specs-box border-left">
                    <ul>
                        <li>{{$laptop3->name}}</li>
                        <li>{{$laptop3->brand}}</li>
                        <li>{{$laptop3->material}}</li>
                        <li>{{$laptop3->ram_memory}}Gb</li>
                        <li>{{$laptop3->network}}</li>
                        <li>{{$laptop3->connections}}</li>
                        <li>{{$laptop3->cpu_name}}</li>
                        <li>{{$laptop3->cpu->score}}</li>
                        <li>{{$laptop3->display_size}}"</li>
                        <li>{{$laptop3->storage_size}}Gb</li>
                        <li>{{$laptop3->videocard_name}}</li>
                        <li>{{$laptop3->videocard->score}}</li>
                        <li>{{$laptop3->battery}}Wh</li>
                        <li>{{$laptop3->weight}}Kg</li>
                        <li>{{$laptop3->max_temp}}C°</li>
                        <li>{{$laptop3->max_noise}}db</li>
                        <li>{{$laptop3->price}}$</li>
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




