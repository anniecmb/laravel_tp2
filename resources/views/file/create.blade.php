@extends('layouts.layout')
@section('title')
    {{ __('lang.new_file') }}
@endsection
@section('content')

        <!-- Formulaire de modification -->
        <section class="page-section">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">@lang('lang.new_file')</h2>
                        <hr class="divider" />
                        <p class="text-muted mb-5"></p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <form class="row" id="contactForm" action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 col-lg-6">
                                <!-- Nom input-->
                                <h4 class="text-center">@lang('lang.english')*</h4>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" name="name" type="text" placeholder="Entrez votre nom..." data-sb-validations="required"/>
                                    <label for="name">@lang('lang.file')</label>
                                    @if($errors->has('name'))
                                    <div class="text-danger mt-2">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 col-lg-6">
                                <!-- Name input-->
                                <h4 class="text-center">@lang('lang.french')*</h4>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="nom" name="nom" type="text" placeholder="Entrez votre nom..." data-sb-validations="required"/>
                                    <label for="nom">@lang('lang.file')</label>
                                    @if($errors->has('nom'))
                                    <div class="text-danger mt-2">{{ $errors->first('nom') }}</div>
                                    @endif
                                </div>
                            </div>                            


                            <!-- File input-->
                            <div class="form-floating mb-5 text-center">
                                <input name="file" type="file" data-sb-validations="required"/>
                                @if($errors->has('file'))
                                    <div class="text-danger mt-2">{{ $errors->first('file') }}</div>
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
                            <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">@lang('lang.upload_file')</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

@endsection