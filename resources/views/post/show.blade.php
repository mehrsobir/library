<link href="{{ asset('css/post.css') }}" rel="stylesheet">

@extends('layouts.layout')
@php($name = 'name_' . app()->getLocale())
@section('content')
<div class="row container-xl p-0 justify-content-center">
    <div class="card col-lg-8">
        <div class="card-header">
            <h6 class="fs-4 fw-bold">{{ $post->title ?? ''}}</h6>
            <p>{{ __('Муаллиф')}}: <a class="text-decoration-none" href="{{route('profile', ['lang' => app()->getLocale(), 'author' => $post->author])}}">{{ $post->author->$name ?? ''}} </a> </p>
        </div>

        <div class="card-body">
            <img src="{{$post->image ? asset('storage/' . $post->image) : asset('storage/images/ma.jpg')}}" class="card-img-top mb-2 img-fluid" alt="Расм" height="300px" width="480px" >
            <p>{!! $post->body ?? ''!!}</p>
        </div>

        <div class="card-footer">
            <p>{{ __('Бахш')}}: {{ $post->category->$name ?? ''}}</p>
            <p>{{ __('Ҷойи нашр')}}: {{ $post->pub_place ?? ''}}</p>
            <p>{{ __('Санаи нашр')}}: {{$post->pub_date ?? date('Y-d-m', strtotime($post->created_at))}} </p>
            <p>{{ __('Нишонии электронӣ')}}: {{ $post->pub_link ?? ''}}</p>
        </div>
        <p class="text-center"><a href="{{ URL::previous() }}" class="col-6 col-sm-3 btn btn-outline-secondary btn-small">{{ __('БОЗГАШТ')}}</a></p>
    </div>
</div>
@endsection