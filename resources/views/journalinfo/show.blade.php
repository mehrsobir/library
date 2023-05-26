<link href="{{ asset('css/post.css') }}" rel="stylesheet">
@extends('layouts.journal')
@php($title = 'title_' . app()->getLocale())
@php($body = 'body_' . app()->getLocale())
@section('content')
<div class="row container-xl">
    <div class="card my-2">
        <div class="card-header text-center fs-6 fw-bolder">{{ $journalinfo->$title }}</div>
            <div class="card-body">      
                <div class="clearfix my-3">
                    <img src="{{asset('storage/' . $journalinfo->image)}}" class="ms-md-3 mb-2 float-md-end rounded mw-100 " alt="Расм" height="300px" width="" style="border: 4px solid #282828">
                    <p class="fs-6">{!! $journalinfo->$body ?? '' !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection