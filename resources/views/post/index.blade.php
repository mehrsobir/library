@extends('layouts.layout')

@section('content')
<div class="row container-xxl p-0">
    <div class="card col-lg-8">
        <div class="card-header text-center fs-6 fw-bold">{{ __('ДИГАР МАВОД') }}</div>
        <div class="card-body">
            @if (count($posts) > 0)
                <div class="row d-flex justify-content-arround">
                    <!-- Artcile -->          
                    @foreach ($posts as $post)
                            <x-post-card :post="$post" /> 
                    @endforeach
                </div>
            @else
                <ul class="list-group list-group-flush">
                    <h5>{{__('Мавод ёфт нашуд!!') }}</h5>
                </ul>
            @endif
        </div>
        <div class="card-footer">
           <div class="d-flex justify-content-center"> {!! $posts->links() !!} </div>
        </div>
    </div>
    <div class="card col-md-4">
        <div class="card-header text-center fs-6 font-weight-bolder">
            <form class="form-inline d-flex" action="{{ route('posts.search', app()->getLocale()) }}">
                <input class="form-control" type="search" name="search" placeholder="{{ __('Ҷустуҷӯ')}}" required>
                <button type="submit"
                  class="btn btn-small btn-outline-success ms-1"><img src="{{URL::asset('/app-images/icons8-search-100.png')}}" width="15px" height="15px"></button>
              </form>
            <br /> {{ __('ПОЛОИШҲО') }}
        </div>
        <div class="card-body p-0">
            <x-filter-post :cats="$cats" reqtype='{{$reqtype  ?? null}}' selected="{{$selected ?? ''}}"></x-filter-post>
        </div>
            
    </div>
</div>
                
@endsection