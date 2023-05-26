@extends('layouts.app')

@section('content')
<div class="mx-3">
    <div class="row justify-content-center">
        <x-admin-nav />
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{ __('ИЛОВАИ МУАЛЛИФ') }}</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.author.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="name_tg">Ному насаб(Тоҷикӣ)</label>
                          <input type="text" class="form-control" name="name_tg" id="name_tg" placeholder="ному насаби муаллиф" value="{{ old('name_tg') }}">
                          @error('name_tg')
                             <p class="text-danger"> {{$message}} </p>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="name_ru">Ному насаб(Русӣ)</label>
                            <input type="text" class="form-control" name="name_ru" id="name_ru" placeholder="ному насаби муаллиф" value="{{ old('name_ru') }}">
                            @error('name_ru')
                               <p class="text-danger"> {{$message}} </p>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="name_en">Ному насаб(Англисӣ)</label>
                            <input type="text" class="form-control" name="name_en" id="name_en" placeholder="ному насаби муаллиф" value="{{ old('name_en') }}">
                            @error('name_en')
                               <p class="text-danger"> {{$message}} </p>
                            @enderror
                          </div>
                        <x-select-education :educations="$educations"></x-select-education>
                        <x-select-position :positions="$positions"></x-select-position>
                        <x-select-institution :institutions="$institutions"></x-select-institution>
                        <div class="form-group">
                            <label for="phone">Телефон</label>
                            <input type="text" class="form-control" name="phone" id="phone" maxlength="13" placeholder="телефон" value="{{ old('phone') }}">
                            @error('phone')
                             <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}">
                            @error('email')
                                <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div>
                        <div class="form-group m-2">
                            <label for="image">Расм:</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                            @error('image')
                                <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div>
                        <button class="btn btn-primary" type="submit">САБТ</button>
                        <a class="btn btn-secondary fs-6" type="button" href = "{{ route('admin.authors') }}">БЕКОР</a>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection