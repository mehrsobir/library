@extends('layouts.app')

@section('content')
<div class="mx-3">
    <div class="row justify-content-center">
        <x-admin-nav />
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{ __('Create Rent') }}</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('book_rent.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                                               
                        <x-select-student :students="$students"></x-select-student>
                        <x-select-book :books="$books"></x-select-book>
                        
                       <div class="form-group col-md-3">
                            <label for="start_date">Start Date</label>
                            <input type="date" class="form-control" name="start_date" id="start_date" placeholder="dd-mm-yyyy" min="1991-09-09" max="2030-12-31" value="{{ old('start_date') }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="end_date">End Date</label>
                            <input type="date" class="form-control" name="end_date" id="end_date" placeholder="dd-mm-yyyy" min="1991-09-09" max="2030-12-31" value="{{ old('end_date') }}">
                        </div><br>
                        <button class="btn btn-primary btn-sm" type="submit">Save</button>
                        <a class="btn btn-secondary btn-sm" type="button" href = "{{ route('book_rents') }}">Cancel</a>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection