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
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="The best search-engine online that allows to find the best laptop according to your needs." />
    <meta name="author" content="Oliver Benoit" />
    <title>Laptop Easy</title>
    <link rel="stylesheet" href="css/lc_switch.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/slider.css">
    <link href="css/app.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
{{--    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>--}}
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

<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{ asset('js/template.js') }}"></script>
<script src="{{ asset('js/lc_switch.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/nouislider.min.js') }}"></script>
<script src="{{ asset('js/wNumb.min.js') }}" ></script>
<script src="{{ asset('js/rangeslider.min.js') }}"></script>
<script src="{{ asset('js/underscore-min.js') }}"></script>
<script src="{{ asset('js/moreFiltersB.js') }}"></script>
<script src="{{ asset('js/show.js') }}"></script>

</body>
</html>
