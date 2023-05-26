@extends('layouts.app')

@section('content')
<div class="mx-3">
    <div class="row justify-content-center">
        <x-admin-nav />
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{ __('ИЛОВАИ МАЪЛУМОТ') }}</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.about.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="title_tg">Ном(Тоҷикӣ)</label>
                          <input type="text" class="form-control" name="title_tg" id="title_tg" placeholder="номи шуъба" value="{{ old('title_tg') }}">
                          @error('title_tg')
                             <p class="text-danger"> {{$message}} </p>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="annotation_tg">Маълумот(Тоҷикӣ)</label>
                            <textarea rows="12" type="text" class="form-control" name="annotation_tg" id="annotation_tg" placeholder="маълумот">{{ old('annotation_tg') }}</textarea>
                            @error('annotation_tg')
                             <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div><hr>
                        <div class="form-group">
                            <label for="title_ru">Ном(Русӣ)</label>
                            <input type="text" class="form-control" name="title_ru" id="title_ru" placeholder="номи шуъба" value="{{ old('title_ru') }}">
                            @error('title_ru')
                               <p class="text-danger"> {{$message}} </p>
                            @enderror
                          </div>
                          <div class="form-group">
                              <label for="annotation_ru">Маълумот(Русӣ)</label>
                              <textarea rows="12" type="text" class="form-control" name="annotation_ru" id="annotation_ru" placeholder="маълумот">{{ old('annotation_ru') }}</textarea>
                              @error('annotation_ru')
                               <p class="text-danger"> {{$message}} </p>
                              @enderror
                          </div><hr>
                          <div class="form-group">
                            <label for="title_en">Ном(Англисӣ)</label>
                            <input type="text" class="form-control" name="title_en" id="title_en" placeholder="номи шуъба" value="{{ old('title_en') }}">
                            @error('title_en')
                               <p class="text-danger"> {{$message}} </p>
                            @enderror
                          </div>
                          <div class="form-group">
                              <label for="annotation_en">Маълумот(Англисӣ)</label>
                              <textarea rows="12" type="text" class="form-control" name="annotation_en" id="annotation_en" placeholder="маълумот">{{ old('annotation_en') }}</textarea>
                              @error('annotation_en')
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
                        <a class="btn btn-secondary fs-6" type="button" href = "{{ route('admin.abouts') }}">БЕКОР</a>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'annotation_tg' );
    CKEDITOR.replace( 'annotation_ru' );
    CKEDITOR.replace( 'annotation_en' );
</script>
@endsection