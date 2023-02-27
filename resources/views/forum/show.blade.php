@extends('layouts.layout')
@section('title')
    {{ __('lang.post_details') }}
@endsection
@section('content')

        @php $locale = session()->get('locale'); @endphp

        <!-- Détails -->
        <section class="page-section">
            <div class="container px-4 px-lg-5">

                @if($locale === 'fr')
                <h2 class="text-center mt-0 mb-4"> @if(isset($blogPost->titre)) {{ $blogPost->titre }} @else {{ $blogPost->title }} @endif </h2>
                <hr class="divider" />
                <div class="justify-content-center">
                    <div class="text-center">
                        <div class="mt-5 mb-5">
                            <p class="text-muted mb-0"> @if(isset($blogPost->texte)) {{ $blogPost->texte }} @else {{ $blogPost->body }} @endif </p>
                        </div>
                    </div>
                    <hr class="divider" />
                    <h5 class="text-center mt-0">@lang('lang.written_by') <i class="bi-person fs-5 text-primary"></i> {{ $blogPost->user->name }} </h5>
                    <hr class="divider mb-5" />
                    
                @else
                <h2 class="text-center mt-0">{{ $blogPost->title }}</h2>
                <hr class="divider" />
                <div class="justify-content-center">
                    <div class="text-center">
                        <div class="mt-5 mb-5">
                            <p class="text-muted mb-0">{{ $blogPost->body }}</p>
                        </div>
                    </div>
                    <hr class="divider" />
                    <h5 class="text-center mt-0">@lang('lang.written_by') <i class="bi-person fs-5 text-primary"></i> {{ $blogPost->user->name }} </h5>
                    <hr class="divider mb-5" />
                @endif

                    @if($user === $blogPost->user_id)
                    <div class="text-center mt-3">
                        <a class="btn btn-primary btn-xl" href="{{ route('forum.edit', $blogPost->id) }}">@lang('lang.edit_post')</a>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-xl" data-bs-toggle="modal" data-bs-target="#deleteModal">@lang('lang.delete_post')</button>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.delete_post')</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        @lang('lang.delete_post_confirmation')
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('forum.edit', $blogPost->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="button" class="btn btn-primary btn-xl" data-bs-dismiss="modal" value="@lang('lang.cancel')">
                                <input type="submit" class="btn btn-primary btn-xl" value="@lang('lang.delete')">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>

@endsection