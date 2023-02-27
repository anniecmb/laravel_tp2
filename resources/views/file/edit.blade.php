@extends('layouts.layout')
@section('title')
    {{ __('lang.editing_file') }}
@endsection
@section('content')

        @php $locale = session()->get('locale'); @endphp

        <!-- Formulaire de modification -->
        <section class="page-section">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">@lang('lang.editing_post')</h2>
                        <hr class="divider" />
                        @if($locale === 'fr')
                        <p class="text-muted mb-5"> @if(isset($file->nom)) {{ $file->nom }} @else {{ $file->name }} @endif </p>
                        @else
                        <p class="text-muted mb-5">{{ $file->name }}</p>
                        @endif
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <form class="row" id="contactForm" method="POST" enctype="multipart/form-data" >
                            @csrf
                            @method('put')

                            <div class="mb-3 col-lg-6">
                                <h4 class="text-center">@lang('lang.english')</h4>
                                <!-- Name input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" name="name" type="text" placeholder="Écrivez un nom..." data-sb-validations="required" value="{{ $file->name }}"/>
                                    <label for="name">@lang('lang.file')</label>
                                    @if($errors->has('name'))
                                    <div class="text-danger mt-2">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 col-lg-6">
                                <h4 class="text-center">@lang('lang.french')</h4>
                                <!-- Title français input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="nom" name="nom" type="text" placeholder="Écrivez un nom..."  value="{{ $file->nom }}"/>
                                    <label for="nom">@lang('lang.file')</label>
                                    @if($errors->has('nom'))
                                    <div class="text-danger mt-2">{{ $errors->first('nom') }}</div>
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
                            <!-- This is what your users will see when there is an error submitting the form -->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">@lang('lang.error')</div></div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">@lang('lang.edit_post')</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

@endsection