@extends('layouts.journal')

@section('content')
<div class="row container-xl p-0">
    <div class="card col-md-8">
        <div class="card-header text-center fs-6 fw-bold">{{ __('МАҚОЛАҲОИ ИЛМӢ') }}</div>
        <div class="card-body p-0">
            @if (count($journalinfos) > 0)
            <ul class="list-group list-group-flush">
                @foreach ($journalinfos as $journalinfo)
                    {{$journalinfo->title_tg}} --
                    {{$journalinfo->body_tg}} ( {{$journalinfo->image}} )
                @endforeach
            </ul>
            @else
                <ul class="list-group list-group-flush">
                    <h5>{{__('Мавод ёфт нашуд!!') }}</h5>
                </ul>
            @endif
            
        </div>
        <div class="card-footer w-75 d-flex">
            {{-- {!! $articles->links() !!} --}}
        </div>
    </div>
    <div class="card col-md-4">
        {{-- <div class="card-header text-center fs-6 font-weight-bolder">
            <form class="form-inline d-flex" action="{{ route('articles.search', app()->getLocale()) }}" >
                <input class="form-control" type="search" name="search" placeholder="{{__('Ҷустуҷӯ')}}" required>
                <button type="submit"
                  class="btn btn-small btn-outline-success ms-1"><img src="{{URL::asset('/app-images/icons8-search-100.png')}}" width="15px" height="15px"></button>
              </form>
            <br /> {{ __('ПОЛОИШҲО') }}
        </div>
        <div class="card-body p-0">
            <x-filter-article :cats="$cats" selected="{{$selected ?? ''}}" />
        </div> --}}
            
    </div>
</div>
                
@endsection