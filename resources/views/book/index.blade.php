@extends('layouts.layout')

@section('content')
<div class="row container-xxl p-0">
    <div class="card col-md-8">
        <div class="card-header text-center fs-6 fw-bold">{{ __('КИТОБҲО') }}</div>
        <div class="card-body">
            @if (count($books) > 0)
                <div class="row d-flex justify-content-arround">
                    @foreach ($books as $book)
                        <x-book-card :book="$book" /> 
                    @endforeach
                </div>
            @else
                <ul class="list-group list-group-flush">
                    <h5>{{__('Мавод ёфт нашуд!!') }}</h5>
                </ul>
            @endif
        </div>
        <div class="card-footer w-75 d-flex">
            {!! $books->links() !!}
        </div>
    </div>
    <div class="card col-md-4">
        <div class="card-header text-center fs-6 font-weight-bolder">
            <form class="form-inline d-flex" action="{{ route('books.search', app()->getLocale()) }}">
                <input class="form-control" type="search" name="search" placeholder="{{ __('Ҷустуҷӯ')}}" required>
                <button type="submit"
                  class="btn btn-small btn-outline-success ms-1"><img src="{{URL::asset('/app-images/icons8-search-100.png')}}" width="15px" height="15px"></button>
              </form>
            <br /> {{ __('ПОЛОИШҲО') }}
        </div>
        <div class="card-body p-0">
            <x-filter-book :cats="$cats" selected="{{$selected ?? ''}}" />
        </div>
            
    </div>
</div>
                
@endsection