@extends('layouts.layout')
@section('title')
    {{ __('lang.home_page') }}
@endsection
@section('content')

        <!-- Liste-->
        <section class="page-section bg-primary">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">

                        <h2 class="text-white mt-0">@lang('lang.list_student')</h2>
                        <hr class="divider divider-light" />
                                <ul class="ul-3columns">
                                    @forelse($etudiants as $etudiant)
                                        <li class="list-unstyled">
                                            <h6><a class="text-white-75 mb-4" href="{{ route('blog.show', $etudiant->id) }}">{{ $etudiant->name }}</a></h6>
                                        </li>
                                    @empty
                                        <li class="list-unstyled text-danger">@lang('lang.no_students_available')</li>
                                    @endforelse
                                </ul>
                        <a class="btn btn-light btn-xl" href="{{ route('blog.create') }}">@lang('lang.new_student')</a>
                    </div>
                </div>
            </div>
        </section>

@endsection