@extends('layouts.layout')
@section('title')
    {{ __('lang.list_blog') }}
@endsection
@section('content')

    @php $locale = session()->get('locale'); @endphp

        <!-- Liste des articles -->
        <section class="page-section bg-primary">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">

                        <h2 class="text-white mt-0">@lang('lang.list_blog')</h2>
                        <hr class="divider divider-light" />
                            <!-- <ul class="ul-3columns">
                                @forelse($blogPosts as $blogPost)
                                    <li class="list-unstyled">
                                        @if($locale === 'fr')
                                        <h6><a class="text-white-75 mb-4" href="{{ route('forum.show', $blogPost->id) }}"> @if(isset($blogPost->titre)) {{ $blogPost->titre }} @else {{ $blogPost->title }} @endif </a></h6>
                                        @else
                                        <h6><a class="text-white-75 mb-4" href="{{ route('forum.show', $blogPost->id) }}">{{ $blogPost->title }}</a></h6>
                                        @endif
                                    </li>
                                @empty
                                    <h6 class="list-unstyled text-white-75">@lang('lang.no_post_available')</h6>
                                @endforelse
                            </ul> -->
                            <table class="table text-white text-start mb-5">
                                <tbody>
                                    @forelse ($blogPosts as $blogPost)
                                        @if($locale === 'fr')
                                        <tr>
                                            <td><a class="text-white-75 mb-4" href="{{ route('forum.show', $blogPost->id) }}"><i class="bi-file-text fs-3"></i>  @if(isset($blogPost->titre)) {{ $blogPost->titre }} @else {{ $blogPost->title }} @endif </a></td>                    
                                            <td class="text-white-75"> <i class="bi-person fs-3"></i> {{ $blogPost->user->name }} </td>
                                            </tr>
                                        @else
                                        <tr>
                                            <td><a class="text-white-75 mb-4" href="{{ route('forum.show', $blogPost->id) }}"><i class="bi-file-text fs-3"></i> {{ $blogPost->title }} </a></td>
                                            <td class="text-white-75"><i class="bi-person fs-3"></i> {{ $blogPost->user->name }}</td>
                                        </tr>
                                        @endif
                                    @empty
                                    <h6 class="text-white">@lang('lang.no_file_av')</h6>
                                    @endforelse
                                </tbody>
                            </table>
                        <a class="btn btn-light btn-xl" href="{{ route('forum.create') }}">@lang('lang.new_post')</a>
                    </div>
                </div>
            </div>
        </section>

@endsection