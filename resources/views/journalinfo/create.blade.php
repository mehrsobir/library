@extends('layouts.app')

@section('content')
<div class="mx-3">
    <div class="row justify-content-center">
        <x-admin-nav />
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{ __('ИЛОВАИ МАЪЛУМОТИ МАҶАЛЛА') }}</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('journalinfo.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title_tg">Ном(Тоҷикӣ)</label>
                            <input type="text" class="form-control" name="title_tg" id="title_tg" placeholder="ном" value="{{ old('title_tg') }}">
                            @error('title_tg')
                               <p class="text-danger"> {{$message}} </p>
                            @enderror
                          </div>
                          <div class="form-group">
                              <label for="body_tg">Маълумот(Тоҷикӣ)</label>
                              <textarea rows="12" type="text" class="form-control" name="body_tg" id="body_tg" placeholder="маълумот">{{ old('body_tg') }}</textarea>
                              @error('body_tg')
                               <p class="text-danger"> {{$message}} </p>
                              @enderror
                          </div><hr>
                          <div class="form-group">
                              <label for="title_ru">Ном(Русӣ)</label>
                              <input type="text" class="form-control" name="title_ru" id="title_ru" placeholder="ном" value="{{ old('title_ru') }}">
                              @error('title_ru')
                                 <p class="text-danger"> {{$message}} </p>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label for="body_ru">Маълумот(Русӣ)</label>
                                <textarea rows="12" type="text" class="form-control" name="body_ru" id="body_ru" placeholder="маълумот">{{ old('body_ru') }}</textarea>
                                @error('body_ru')
                                 <p class="text-danger"> {{$message}} </p>
                                @enderror
                            </div><hr>
                            <div class="form-group">
                              <label for="title_en">Ном(Англисӣ)</label>
                              <input type="text" class="form-control" name="title_en" id="title_en" placeholder="номи" value="{{ old('title_en') }}">
                              @error('title_en')
                                 <p class="text-danger"> {{$message}} </p>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label for="body_en">Маълумот(Англисӣ)</label>
                                <textarea rows="12" type="text" class="form-control" name="body_en" id="body_en" placeholder="маълумот">{{ old('body_en') }}</textarea>
                                @error('body_en')
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
                        <button class="btn btn-primary btn-sm" type="submit">САБТ</button>
                        <a class="btn btn-secondary btn-sm" type="button" href = "{{ route('admin.journalinfos') }}">БЕКОР</a>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'body_tg' );
    CKEDITOR.replace( 'body_ru' );
    CKEDITOR.replace( 'body_en' );
</script>
@endsection