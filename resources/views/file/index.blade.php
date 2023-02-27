@extends('layouts.layout')
@section('title')
    {{ __('lang.repo') }}
@endsection
@section('content')

        @php $locale = session()->get('locale'); @endphp

        <!-- Liste-->
        <section class="page-section bg-primary">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">

                        <h2 class="text-white mt-0 text-center">@lang('lang.repo')</h2>
                        <hr class="divider divider-light" />
                            <table class="table text-white text-start mb-5">
                                <tbody>
                                    @forelse ($files as $file)
                                        @if($locale === 'fr')
                                        <tr>
                                            <td><a class="text-white-75 mb-4" href="{{ route('file.show', $file->id) }}"><i class="bi-file-earmark-arrow-down fs-3"></i> @if(isset($file->nom)) {{ $file->nom }} @else {{ $file->name }} @endif </a></td>                    
                                            <td class="text-white-75"> <i class="bi-person fs-3"></i> {{ $file->user->name }} </td>
                                            </tr>
                                        @else
                                        <tr>
                                            <td><a class="text-white-75 mb-4" href="{{ route('file.show', $file->id) }}"><i class="bi-file-earmark-arrow-down fs-3"></i> {{ $file->name }} </a></td>
                                            <td class="text-white-75"><i class="bi-person fs-3"></i> {{ $file->user->name }}</td>
                                        </tr>
                                        @endif
                                    @empty
                                    <h6 class="text-white">@lang('lang.no_file_av')</h6>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="row gx-4 gx-lg-5 justify-content-center">
                                <div class="col-lg-8 "> {{ $files->links('pagination::bootstrap-4') }} </div>
                            </div>
                        <a class="btn btn-light btn-xl" href="{{ route('file.create') }}">@lang('lang.new_file')</a>
                    </div>
                </div>
            </div>
        </section>

@endsection