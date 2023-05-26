@extends('layouts.app')

@section('content')
<div class="mx-3">
    <div class="row justify-content-center">
        <x-admin-nav />
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{ __('ВИРОИШИ МАҚОЛА') }}</h5>
                </div>

                <div class="card-body">
                    <form method="post"  action="{{ route('journal.update', ['journal' => $journal]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="year">Сол</label>
                            <input type="text" class="form-control" name="year" id="year" placeholder="номи мақола" value="{{ $journal->year }}">
                            @error('year')
                               <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="number">Рақам</label>
                        <input type="number" class="form-control" name="number" id="number" min="1" max="12" value="{{ $journal->number }}">
                            @error('number')
                            <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="total_number">Рақами умумӣ</label>
                            <input type="number" class="form-control" name="total_number" id="total_number" min="1" max="12" value="{{ $journal->total_number }}">
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
                        <button class="btn btn-primary" type="submit">ВИРОИШ</button>
                        <a class="btn btn-secondary fs-6" type="button" href = "{{ route('admin.journals') }}">БЕКОР</a>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection