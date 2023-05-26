@extends('layouts.journal')

@section('content')
<div class="row container-xl p-0">
    <div class="card col-md-8">
        <div class="card-header text-center fs-6 fw-bold">{{ __('Маҷалла дорои рақами стандартии байналхалқии силсиланашрия мебошад (ISSN 2790-7198)') }}</div>
        <div class="card-body">
            <img src="{{asset('/app-images/jh.jpg')}}" class="rounded mx-auto d-block mw-100" alt="Расм" height="400px" width="auto" style="border: 4px solid #282828">
           <h6 class="text-center lh-lg mt-3"> {{ __('Дар маҷалла мақолаҳою фишурдаҳои илмӣ, тақризҳо ва ахбор дар бахши муносибатҳои байналмилалӣ, сиёсати беруна, иқтисодиёти ҷаҳонӣ, забон ва адабиёти кишварҳои хориҷа ба табъ мерасанд') }}
           </h6>
        </div>
        <div class="card-footer d-flex-column">
            @if ($journal)
                <h6>{{__('Нусхаи охирини маҷалла')}}: <a href="{{route('journal.pdf', ['journal' => $journal])}}" target="_blank">{{__('«ОСИЁ ВА АВРУПО»')}}, №{{$journal->number}}({{$journal->total_number}}), {{$journal->year }}</a></h6>
            @endif
            <h6>{{__('Мақолаҳои маҷалларо дар алоҳидагӣ аз сомонаи мо дарёфт кунед')}}: <a href="{{ url('/', app()->getLocale()) }}" target="_blank">osiyoavrupo.tj</a></h6>
        </div>
    </div>
    <div class="card col-md-4">
        <div class="card-header text-center fs-6 fw-bold">{{ __('Нашри мақолаҳои илмӣ дар маҷавллаи «ОСИЁ ВА АВРУПО»') }}</div>
        <div class="card-body">
            <img src="{{asset('/app-images/moa.jpg')}}" class="rounded mx-auto d-block" alt="Расм" height="300px" width="auto" style="border: 4px solid #282828">
           <h6 class="text-center lh-lg mt-3"> {{ __('Аз пажуҳишгарон, омӯзгорон, аспирантон, магистрон ва донишҷӯён даъват карда мешавад, ки мақолаҳои илмии худро дар маҷаллаи илмии «ОСИЁ ВА АВРУПО» нашр кунанд. Мо натиҷаи пажуҳишҳои Шуморо ба мухотабонатон мерасонем') }}
           </h6>
        </div>
        <div class="card-footer d-flex">
            
        </div>
    </div>
</div>
                
@endsection