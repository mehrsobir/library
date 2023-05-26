@extends('layouts.layout')
@php($name = 'name_' . app()->getLocale())
@section('content')
<div class="row container-xl p-0 justify-content-center">
    <div class="card col-lg-8">
        <div class="card-header">
            <h6 class="fs-4 fw-bold">{{ $article->title ?? ''}}</h6>
            <p>{{__('Муаллиф')}}: <a class="text-decoration-none" href="{{route('profile', ['lang' => app()->getLocale(), 'author' => $article->author])}}">{{ $article->author->$name ?? ''}} </a> </p>
        </div>

        <div class="card-body">
            <p>{{ $article->annotation ?? ''}}</p>
        </div>

        <div class="card-footer">
            <p>{{ __('Калидвожаҳо')}}: {{ $article->keywords ?? ''}}</p>
            <p>{{ __('Бахш')}}: {{ $article->category->$name ?? ''}}</p>
            <p>{{ __('Ҷойи нашр')}}: {{ $article->pub_place ?? ''}}</p>
            <p>{{ __('Санаи нашр')}}: {{$article->pub_date ?? date('Y-d-m', strtotime($article->created_at))}} </p>
            <p>{{ __('Нишонии электронӣ')}}: {{ $article->pub_link ?? ''}}</p>
            <p>{{ __('Боргирӣ')}}: <a href="{{route('pdf', ['article' => $article])}}" target="_blank"><img src="{{URL::asset('/app-images/icons8-pdf-100.png')}}" 
                width="30px" height="30px" class="adap-foto"></a></p>
        </div>
        <p class="text-center"><a href="{{ URL::previous() }}" class="col-6 col-sm-3 btn btn-outline-secondary btn-small">{{__('БОЗГАШТ')}}</a></p>
    </div>
</div>
@endsection