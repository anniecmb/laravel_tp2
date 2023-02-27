@extends('layouts.layout')
@section('title')
    {{ __('lang.connection') }}
@endsection
@section('content')


        <!-- Formulaire de connexion -->
        <section class="page-section">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">@lang('lang.connection')</h2>
                        <hr class="divider" />
                        <p class="text-muted mb-5"></p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if(!$errors->isEmpty())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                @foreach($errors->all() as $error)
                                {{ $error }}
                                @endforeach
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <form id="contactForm" action="{{ route('user.auth') }}" method="POST">
                            @csrf
                            <!-- Courriel input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" name="email" type="email" placeholder="Entrez votre courriel"  data-sb-validations="required" value="{{ old('email') }}">
                                <label for="email">@lang('lang.email')</label>
                                @if($errors->has('email'))
                                    <div class="text-danger mt-2">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <!-- Password input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="password" name="password" type="password" placeholder="Entrez votre mot de passe"  data-sb-validations="required">
                                <label for="password">@lang('lang.password')</label>
                                @if($errors->has('password'))
                                    <div class="text-danger mt-2">{{ $errors->first('password') }}</div>
                                @endif
                            </div>

                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">@lang('lang.successful_modif')</div>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">@lang('lang.error')</div></div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">@lang('lang.login')</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

@endsection