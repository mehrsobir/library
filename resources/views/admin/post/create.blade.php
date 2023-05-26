@extends('layouts.app')

@section('content')
<div class="mx-3">
    <div class="row justify-content-center">
        <x-admin-nav />
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{ __('ИЛОВАИ МАВОД') }}</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="title">Номи мавод</label>
                          <input type="text" class="form-control" name="title" id="title" placeholder="номи мавод" value="{{ old('title') }}">
                          @error('title')
                             <p class="text-danger"> {{$message}} </p>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="body">Мавод</label>
                            <textarea rows="20" type="text" class="form-control" name="body" id="body" placeholder="мавод">{{ old('body') }}</textarea>
                            @error('body')
                             <p class="text-danger"> {{$message}} </p>
                            @enderror
                          </div>
                        
                        <x-select-type :types="$types"></x-select-type>
                        <x-select-category :categorys="$categorys"></x-select-category>
                        
                        <div class="form-group">
                            <label for="author_id">Муаллиф</label>
                            <div class="col-md-9">
                                <select class="form-control" name="author_id" id="">
                                    <option value=""><small class="text-muted">--Лутфан муаллифро интихоб кунед!--</small></option>
                                    @foreach ($authors as $author)
                                        <option value="{{$author->id}}" {{ old('author_id') == $author->id ? 'selected' : ''}}>{{$author->name_tg}}</option>
                                    @endforeach         
                                </select>
                            </div>
                            @error('author_id')
                                <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div>

                        <x-select-lang></x-select-lang>

                        <div class="form-group">
                            <label for="pub_place">Ҷойи нашр</label>
                            <input type="text" class="form-control" name="pub_place" id="pub_place" placeholder="ҷойи нашри мақола" value="{{ old('pub_place') }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pub_date">Рӯзи нашр</label>
                            <input type="date" class="form-control" name="pub_date" id="pub_date" placeholder="dd-mm-yyyy" min="1991-09-09" max="2030-12-31" value="{{ old('pub_date') }}">
                        </div>
                        <div class="form-group">
                            <label for="pub_link">Нишонии электронӣ</label>
                            <input type="text" class="form-control" name="pub_link" id="pub_link" placeholder="нишонии электронӣ" value="{{ old('pub_link') }}">
                        </div>
                        <div class="form-group m-2">
                            <label for="image">Расм:</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                            @error('image')
                                <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div>
                        <button class="btn btn-primary btn-sm" type="submit">САБТ</button>
                        <a class="btn btn-secondary btn-sm" type="button" href = "{{ route('admin.posts') }}">БЕКОР</a>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'body' );
</script>
@endsection