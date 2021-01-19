@extends('layout.app')

@section('title')
    <title>Contact Us</title>
@endsection


@section('section')

    <header class="page-header page-header-dark bg-gradient-primary-to-secondary">
        <div class="page-header-content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 text-center pb-2">
                        <h1 class="page-header-title font-weight-bold">Contact Us</h1>
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

    <section class="mt-5 bg-white py-5">


        <div class="container mb-5">


            <div class="text-center">
                <h2>Can't find the answer you need?</h2>
                <p class="lead mb-5">Contact us and we'll get back to you as soon as possible with a solution to
                    whatever issues you're having with Laptop Easy.</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('danger'))
                <div class="alert alert-danger">
                    {{ session('danger') }}
                </div>
            @endif


            <form method="POST" action="{{route('contactPost')}}" id="contact-form">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6 {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label class="text-dark" for="inputName">Full name</label>
                        <input name="name" class="form-control py-4" id="inputName" type="text" placeholder="Full name" required>
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group col-md-6 {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label class="text-dark" for="inputEmail">Email</label>
                        <input name="email" class="form-control py-4" id="inputEmail" type="email"
                               placeholder="name@example.com" required>
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label class="text-dark" for="inputMessage">Message</label>
                    <textarea name="comment" class="form-control py-3" id="inputMessage" type="text"
                              placeholder="Enter your message..." rows="4" required></textarea>
                    <span class="text-danger">{{ $errors->first('comment') }}</span>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary btn-marketing mt-4 g-recaptcha" data-sitekey="6LenFy8aAAAAAD9vQhIfZx_B1mP5mpCQSghE_sC0"
                            data-callback='onSubmit' data-action='submit' type="submit">Submit Request</button>
                </div>
            </form>

            <script>
                function onSubmit(token) {
                    document.getElementById("contact-form").submit();
                }
            </script>

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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
@endsection





