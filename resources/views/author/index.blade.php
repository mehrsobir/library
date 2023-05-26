@extends('layouts.layout')

@section('content')
<div class="row container-xl">
    <div class="card col-md-8 my-2">
        <div class="card-header text-center fs-6 font-weight-bolder">{{ __('МАҚОЛАҲОИ ИЛМӢ') }}</div>
        <div class="card-body p-0">
            <ul class="list-group list-group-flush">
                @foreach ($articles as $article)
                    <x-article-card :article="$article" /> 
                @endforeach
            </ul>
        </div>
        <div class="card-footer w-75 d-flex">
            {!! $articles->links() !!}
        </div>
    </div>
    <div class="card col-4 my-2">
        <div class="card-header text-center fs-6 font-weight-bolder">{{ __('ПОЛОИШҲО') }}</div>
        <div class="card-body p-0">
            <ul class="list-group list-group-flush">
                @foreach ($articles as $article)
                    <x-article-card :article="$article" /> 
                @endforeach
            </ul>
        </div>
            
    </div>
</div>
                
@endsection