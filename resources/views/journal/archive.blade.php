@extends('layouts.journal')

@section('content')
<div class="row container-xl p-0">
    <div class="card">
        <div class="card-header text-center fs-6 fw-bold">{{ __('БОЙГОНИИ МАҶАЛЛА') }}</div>
            <div class="card-body row d-flex justify-content-center">
                @foreach ($years as $key => $value)
                    <div class="col-6 col-md-4 col-lg-3 col-xxl-2 p-0 me-1 mb-3 border border-secondary rounded text-center">
                        <h4 class="m-0 p-2 align-middle rounded-top" style="background: #DADADA;">{{$key}}</h4>
                        @foreach ($value as $journal)
                        <hr class="m-0 mb-2" /><h6 class="align-middle"><a href="{{route('journal.pdf', ['journal' => $journal])}}" target="_blank">№{{$journal->number}}({{$journal->total_number}})</a></h6>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
                
@endsection