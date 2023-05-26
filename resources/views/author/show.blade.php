@extends('layouts.layout')
@php($name = 'name_' . app()->getLocale())
@section('content')
<div class="row container-xl p-0 justify-content-center">
    <div class="card col-lg-8">
        <div class="card-header row">
            <img class="rounded col-md-4  img-fluid" style="width: 150px; height: 150px;" src="{{$author->image ? asset('storage/' . $author->image) : asset('storage/images/ma.png')}}" alt="">
            <div class="col-md-8">
                <h6 class="fs-4 fw-bold">{{ $author->$name ?? ''}}</h6>
                <p class="m-0">{{ __('Маълумот/Унвон')}}: {{ $author->education->$name ?? ''}}</p>
                <p class="m-0">{{ __('Вазифа')}}: {{ $author->position->$name ?? ''}}</p>
                <p class="m-0">{{ __('Ниҳод')}}: {{ $author->institution->$name ?? ''}}</p>
                <p class="m-0">Email: {{ $author->email ?? ''}}</p>
                <div class="row d-flex justify-content-between border-top border-info pt-1">
                    <div class="col-4 col-md-2 text-center m-md-0">
                        <a class="text-decoration-none text-dark" href="{{route('profile', ['lang' => app()->getLocale(), 'author' => $author])}}">
                            <img class="" style="width: 30px; height: 30px;" src="{{URL::asset('/app-images/icons8-news-150.png')}}" alt="">
                            <p class="m-0">{{ __('Мақолаи илмӣ')}}</p>
                            <p class="fs-6 fw-bold m-0">{{$arts_num}}</p>
                        </a>
                    </div>
                    <div class="col-4 col-md-2 text-between m-md-0">
                        <a class="text-decoration-none text-dark" href="{{route('profile', ['lang' => app()->getLocale(), 'author' => $author, 'type' => 91])}}">
                            <img class="" style="width: 30px; height: 30px;" src="{{URL::asset('/app-images/icons8-news-150.png')}}" alt="">
                            <p class="m-0">{{ __('Китоб')}}</p>
                            <p class="fs-6 fw-bold m-0">{{$books_num}}</p>
                        </a>
                    </div>
                    @foreach ($posts as $post)
                    <div class="col-4 col-md-2 text-between m-md-0">
                        <a class="text-decoration-none text-dark" href="{{route('profile', ['lang' => app()->getLocale(), 'author' => $author, 'type' => $post->type->id])}}">
                            <img class="" style="width: 30px; height: 30px;" src="{{URL::asset('/app-images/icons8-news-150.png')}}" alt="">
                            <p class="m-0">{{$post->type->$name}}</p>
                            <p class="fs-6 fw-bold m-0">{{$post->num}}</p>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <br />
        <div class="d-flex justify-content-between fw-bold border-bottom border-info">
            <h6 class="fs-6">{{$req_type}}</h6>
            <div class="d-flex justify-content-center text-danger">
                @foreach ($langs as $key => $value)
                 {{-- <a href="{{route('profile', ['lang' => $key, 'author' => $author])}}?filter=true" class="d-flex text-decoration-none text-danger"> --}}
                    <img src="{{URL::asset('/app-images/' . $key . '.png')}}" width="14px" height="10px" class="m-1">
                    <p class="my-0 me-1">{{$key . '(' . $value . ')'}}</p>
                {{-- </a> --}}
                 @endforeach
            </div>
        </div>
        <div class="card-body p-0">
            <ul class="list-group list-group-flush">
               <div class="d-flex-column">
                    @foreach ($articles as $article)
                        @if ($type_id === 90)
                            <x-article-card :article="$article" /> 
                        @elseif($type_id === 91)
                            <x-book-list-card :book="$article" />
                        @else
                            <x-post-list-card :post="$article" />
                        @endif
                    @endforeach
                </div>
            </ul>
        </div>

        <div class="card-footer">

        </div>
    </div>
</div>
@endsection