@extends('layouts.layout')
@section('title')
    {{ __('lang.file_details') }}
@endsection
@section('content')

        @php $locale = session()->get('locale'); @endphp
        @php $pathFile = $file->path_file; @endphp
        @php $fileName = $file->file_name; @endphp
        @php $pathToFile = public_path('uploads/'.$fileName); @endphp
        @php $pathToFile = storage_path('uploads/' . $fileName); @endphp

        <!-- Détails -->
        <section class="page-section">
            <div class="container px-4 px-lg-5">

                @if($locale === 'fr')
                <h2 class="text-center mt-0"> <i class="bi-file-earmark-arrow-down fs-1 text-primary"></i> @if(isset($file->nom)) {{ $file->nom }} @else {{ $file->name }} @endif </h2>
                <h6 class="text-center mt-0"> {{ $file->file_name }} </h6>
                <hr class="divider" />
                <div class="justify-content-center">
                    <div class="text-center">
                        <div class="mt-5 mb-5">
                            <h5 class="text-muted mb-0">@lang('lang.uploaded_by') <i class="bi-person fs-5 text-primary"></i> {{ $file->user->name }} </h5>
                        </div>
                    </div>
                    <hr class="divider" />
                @else
                <h2 class="text-center mt-0"> <i class="bi-file-earmark-arrow-down fs-1 text-primary"></i> {{ $file->name }}</h2>
                <h6 class="text-center mt-0"> {{ $file->file_name }} </h6>
                <hr class="divider" />
                <div class="justify-content-center">
                    <div class="text-center">
                        <div class="mt-5 mb-5">
                            <h5 class="text-muted mb-0">@lang('lang.uploaded_by') <i class="bi-person fs-5 text-primary"></i> {{ $file->user->name }} </h5>
                        </div>
                    </div>
                    <hr class="divider" />
                @endif

                    <div class="text-center mt-3">
                    @if($user->id === $file->user_id)
                        <a class="btn btn-primary btn-xl" href="{{ route('file.edit', $file) }}">@lang('lang.edit_file')</a>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-xl" data-bs-toggle="modal" data-bs-target="#deleteModal">@lang('lang.delete_file')</button>
                    @endif
                        
                        <!-- <a class="btn btn-primary btn-xl" href="{{ route('file.download', $fileName) }}" download>@lang('lang.download_file')</a> -->

                        <a class="btn btn-primary btn-xl" href="{{ route('file.download', $file->file_name) }}" >@lang('lang.download_file')</a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.delete_file')</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        @lang('lang.delete_file_confirmation')
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('file.edit', $file->id) }}" method="POST">
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