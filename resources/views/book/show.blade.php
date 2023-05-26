@extends('layouts.layout')
@php($name = 'name_' . app()->getLocale())
@section('content')
<div class="row container-xl justify-content-center p-0">
    <div class="card col-lg-8">
        <div class="card-header">
            <h6 class="fs-4 fw-bold">{{ $book->title ?? ''}}</h6>
            <p> {{ __('Муаллиф')}}: <a class="text-decoration-none" href="{{route('profile', ['lang' => app()->getLocale(), 'author' => $book->author])}}">{{ $book->author->$name}} </a> </p>
        </div>

        <div class="card-body">
            <div class="row">
                <img src="{{$book->image ? asset('storage/' . $book->image) : asset('storage/images/ma.jpg')}}" class="mw-100 col-sm-5">
                <div class="ps-2 col-sm-7 mt-1">
                    <p>{{$book->annotation}}</p>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <p>{{ __('Бахш')}}: {{ $book->category->$name ?? ''}}</p>
            <p>{{ __('Ҷойи нашр')}}: {{ $book->pub_place ?? ''}}</p>
            <p>{{ __('Соли нашр')}}: {{ $book->pub_year ?? $book->created_at}} </p>
            <p>{{ __('Боргирӣ')}}: <a href="{{route('book.pdf', ['book' => $book])}}" target="_blank"><img src="{{URL::asset('/app-images/icons8-pdf-100.png')}}" 
                width="30px" height="30px" class="adap-foto"></a></p>
        </div>
        <p class="text-center"><a href="{{ URL::previous() }}" class="col-6 col-sm-3 btn btn-outline-secondary btn-small">{{ __('БОЗГАШТ')}}</a></p>
    </div>
</div>
@endsection