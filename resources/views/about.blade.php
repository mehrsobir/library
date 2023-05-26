@extends('layouts.layout')
@php($title = 'title_' . app()->getLocale())
@php($annotation = 'annotation_' . app()->getLocale())
@section('content')
<div class="row container-xl">
    <div class="card my-2">
        <div class="card-header text-center fs-6 fw-bolder">{{ __('ДАР БОРАИ ИНСТИТУТ') }}</div>
        <div class="card-body">      
                @foreach ($abouts as $about)
                    <div class="clearfix my-3">
                        <img src="{{asset('storage/' . $about->image)}}" class="ms-md-3 mb-2 float-md-end rounded mw-100 " alt="Расм" height="230px" width="" style="border: 4px solid #282828">
                        <div class="fs-6">
                            <h6 class="text-center fw-bold">{{ $about->$title ?? ''}}</h6>
                                <p class="fs-6">{!! $about->$annotation ?? '' !!}</p>
                        </div>
                    </div><hr />
                @endforeach
        </div>
    </div>
</div>
                
@endsection