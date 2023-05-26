@extends('layouts.app')

@section('content')
<div class="mx-3">
    <div class="row justify-content-center">
        <x-admin-nav />
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{ __('ИВАЗИ МАЪЛУМОТИ НИҲОД') }}</h5>
                </div>

                <div class="card-body">
                    <form method="post"  action="{{ route('admin.institution.update', ['institution' => $institution]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="name_tg">Ном(Тоҷикӣ)</label>
                          <input type="text" class="form-control" id="" name="name_tg" value='{{ $institution->name_tg }}'>
                          @error('name_tg')
                             <p class="text-danger"> {{$message}} </p>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="name_ru">Ном(Русӣ)</label>
                            <input type="text" class="form-control" id="" name="name_ru" value='{{ $institution->name_ru }}'>
                            @error('name_ru')
                               <p class="text-danger"> {{$message}} </p>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="name_en">Ном(Англисӣ)</label>
                            <input type="text" class="form-control" id="" name="name_en" value='{{ $institution->name_en }}'>
                            @error('name_en')
                               <p class="text-danger"> {{$message}} </p>
                            @enderror
                          </div>
                        <button class="btn btn-primary" type="submit">ВИРОИШ</button>
                        <a class="btn btn-secondary fs-6" type="button" href = "{{ route('admin.institutions') }}">БЕКОР</a>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection