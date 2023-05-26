@extends('layouts.app')

@section('content')
<div class="mx-3">
    <div class="row justify-content-center">
        <x-admin-nav />
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Statistics') }}</div>

                <div class="card-body">
                   <h5 class="border p-1">Some stats</h5>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

