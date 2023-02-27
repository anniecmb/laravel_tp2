@extends('layouts.layout')
@section('title')
    {{ __('lang.create_post') }}
@endsection
@section('content')

        <!-- Formulaire de modification -->
        <section class="page-section">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">@lang('lang.create_post')</h2>
                        <hr class="divider" />
                        <p class="text-muted mb-5"></p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form class="row" id="contactForm" method="POST">
                        @csrf
                        <div class="mb-3 col-lg-6"> 
                            <h4 class="text-center">@lang('lang.english')</h4>
                            <!-- Title input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="title" name="title" type="text" placeholder="Écrivez un titre..." data-sb-validations="required" value="{{ old('title') }}"/>
                                <label for="title">@lang('lang.title')</label>
                                @if($errors->has('title'))
                                    <div class="text-danger mt-2">{{ $errors->first('title') }}</div>
                                @endif
                            </div>
                            <!-- Body input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="body" name="body" placeholder="Écrivez un article..." data-sb-validations="required">{{ old('body') }}</textarea>
                                <label for="body">@lang('lang.text')</label>
                                @if($errors->has('body'))
                                    <div class="text-danger mt-2">{{ $errors->first('body') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 col-lg-6">
                            <h4 class="text-center">@lang('lang.french')</h4>
                            <!-- Title français input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="titre" name="titre" type="text" placeholder="Écrivez un titre..." data-sb-validations="required" value="{{ old('titre') }}"/>
                                <label for="titre">@lang('lang.title')</label>
                                @if($errors->has('titre'))
                                    <div class="text-danger mt-2">{{ $errors->first('titre') }}</div>
                                @endif
                            </div>
                            <!-- Body français input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="texte" name="texte" placeholder="Écrivez un article..." data-sb-validations="required">{{ old('texte') }}</textarea>
                                <label for="texte">@lang('lang.text')</label>
                                @if($errors->has('texte'))
                                    <div class="text-danger mt-2">{{ $errors->first('texte') }}</div>
                                @endif
                            </div>
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
                        <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">@lang('lang.add_post')</button></div>
                    </form>
                </div>
            </div>
        </section>

@endsection