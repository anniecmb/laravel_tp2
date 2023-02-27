@extends('layouts.layout')
@section('title')
    {{ __('lang.welcome_user') }} {{ $user->name }}!
@endsection
@section('content')

        <!-- Liste-->
        <section class="page-section bg-primary">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">

                        <h2 class="text-white mt-0">@lang('lang.welcome_user') {{ $user->name }}!</h2>
                        <h4 class="text-white mt-3">@lang('lang.reading_title') <i class="bi bi-emoji-smile-fill"></i> </h4>

                        <hr class="divider divider-light" />
                        <div class="row gx-4 gx-lg-5 justify-content-center">
                            <div class="col-md-6 text-center">
                                <div class="mt-5 mb-5">
                                    <h6 class="text-white mt-0">@lang('lang.click_forum')</h6>
                                    <a class="btn btn-light btn-xl mt-2" href="{{ route('forum.index') }}">@lang('lang.see_forum')</a>
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <div class="mt-5 mb-5">
                                    <h6 class="text-white mt-0">@lang('lang.click_new_post')</h6>
                                    <a class="btn btn-light btn-xl mt-2" href="{{ route('forum.create') }}">@lang('lang.new_post')</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

@endsection