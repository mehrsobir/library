@extends('layouts.app')

@section('content')
<div class="mx-3">
    <div class="row justify-content-center">
        <x-admin-nav />
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{ __('ИВАЗИ МАЪЛУМОТИ МУАЛЛИФ') }}</h5>
                </div>

                <div class="card-body">
                    <form method="post"  action="{{ route('admin.author.update', ['author' => $author]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="name_tg">Ному насаб(Тоҷикӣ)</label>
                          <input type="text" class="form-control" id="" name="name_tg" value='{{ $author->name_tg }}'>
                          @error('name_tg')
                             <p class="text-danger"> {{$message}} </p>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="name_ru">Ному насаб(Русӣ)</label>
                            <input type="text" class="form-control" id="" name="name_ru" value='{{ $author->name_ru }}'>
                            @error('name_ru')
                               <p class="text-danger"> {{$message}} </p>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="name_en">Ному насаб(Англисӣ)</label>
                            <input type="text" class="form-control" id="" name="name_en" value='{{ $author->name_en }}'>
                            @error('name_en')
                               <p class="text-danger"> {{$message}} </p>
                            @enderror
                          </div>
                        <x-select-education :educations="$educations" value='{{ $author->education->id}}'></x-select-education>
                        <x-select-position :positions="$positions" value='{{ $author->position->id }}'></x-select-position>
                        <x-select-institution :institutions="$institutions" value='{{ $author->institution->id}}'></x-select-institution>
                        <div class="form-group">
                            <label for="phone">Телефон</label>
                            <input type="text" class="form-control" name="phone" id="" maxlength="13" value='{{ $author->phone }}'>
                            @error('phone')
                             <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="" value='{{ $author->email }}'>
                            @error('email')
                             <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div>
                        <div class="form-group m-2">
                            <label for="image">Расм:</label>
                            <input type="file" class="form-control-file" name="image" id="">
                            @error('image')
                                <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div>
                        <button class="btn btn-primary" type="submit">ВИРОИШ</button>
                        <a class="btn btn-secondary fs-6" type="button" href = "{{ route('admin.authors') }}">БЕКОР</a>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection