<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-1HSEB1TB9C"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-1HSEB1TB9C');
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="The best search-engine online that allows to find the best laptop according to your needs." />
    <meta name="keyword" content="laptop,notebook,finder,gaming,filter,guide,cheap">
    <meta name="author" content="Oliver Benoit" />
    @yield('title')
    <link rel="stylesheet" href="{{asset('css/lc_switch.css')}}"  >
    <link rel="stylesheet" href="{{asset('css/nouislider.min.css')}}" >
    <link rel="stylesheet" href="{{asset('css/slider.css')}}"  >
    <link rel="stylesheet" href="{{asset('css/app.css')}}"  />
    <link rel="icon" type="image/x-icon" href="" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
<div id="layoutDefault">
    <div id="layoutDefault_content">
        <main>

@include('partials.navbar')

@yield('section')

        </main>
    </div>

@include('partials.footer')

</div>


@yield('scripts')

</body>
</html>
