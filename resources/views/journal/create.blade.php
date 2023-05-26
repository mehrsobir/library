@extends('layouts.app')

@section('content')
<div class="mx-3">
    <div class="row justify-content-center">
        <x-admin-nav />
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{ __('ИЛОВАИ МАҶАЛЛА') }}</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('journal.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="year">Сол</label>
                          <input type="number" class="form-control" name="year" id="year" min="2017" max="2030" value="{{ old('year') }}">
                          @error('year')
                             <p class="text-danger"> {{$message}} </p>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="number">Рақам</label>
                            <input type="number" class="form-control" name="number" id="number" min="1" max="12" value="{{ old('number') }}">
                            @error('number')
                             <p class="text-danger"> {{$message}} </p>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="total_number">Рақами умумӣ</label>
                            <input type="number" class="form-control" name="total_number" id="total_number" min="1" max="100" value="{{ old('total_number') }}">
                            @error('total_number')
                             <p class="text-danger"> {{$message}} </p>
                            @enderror
                          </div>

                        <div class="form-group m-2">
                            <label for="pdf">Файл:</label>
                            <input type="file" class="form-control-file" name="pdf" id="pdf">
                            @error('pdf')
                                <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div>
                        <button class="btn btn-primary btn-sm" type="submit">САБТ</button>
                        <a class="btn btn-secondary btn-sm" type="button" href = "{{ route('admin.journals') }}">БЕКОР</a>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection