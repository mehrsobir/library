@extends('layouts.app')

@section('content')
<div class="mx-3">
    <div class="row justify-content-center">
        <x-admin-nav />
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{ __('ВИРОИШИ МАВОД') }}</h5>
                </div>

                <div class="card-body">
                    <form method="post"  action="{{ route('admin.post.update', ['post' => $post]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Номи мақола</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="номи мақола" value="{{ $post->title }}">
                            @error('title')
                               <p class="text-danger"> {{$message}} </p>
                            @enderror
                          </div>
                          <div class="form-group">
                              <label for="body">Мавод</label>
                              <textarea rows="20" type="text" class="form-control" name="body" id="body">{{ $post->body }}</textarea>
                              @error('body')
                               <p class="text-danger"> {{$message}} </p>
                              @enderror
                            </div>
                        
                          <x-select-type :types="$types" value='{{$post->type->id}}'></x-select-type>
                          <x-select-category :categorys="$categorys" value='{{$post->category->id}}'></x-select-category>
                          
                          <div class="form-group">
                              <label for="author_id">Муаллиф</label>
                              <div class="col-md-9">
                                  <select class="form-control" name="author_id" id="">
                                      <option value=""><small class="text-muted">--Лутфан муаллифро интихоб кунед!--</small></option>
                                      @foreach ($authors as $author)
                                          <option value="{{$author->id}}" {{ $post->author->id == $author->id ? 'selected' : ''}}>{{$author->name_tg}}</option>
                                      @endforeach         
                                  </select>
                              </div>
                              @error('author_id')
                                  <p class="text-danger"> {{$message}} </p>
                              @enderror
                          </div>
  
                          <x-select-lang value="{{$post->lang}}"></x-select-lang>
  
                          <div class="form-group">
                              <label for="pub_place">Ҷойи нашр</label>
                              <input type="text" class="form-control" name="pub_place" id="pub_place" placeholder="ҷойи нашри мақола" value="{{ $post->pub_place }}">
                          </div>
                          <div class="form-group col-md-3">
                              <label for="pub_date">Рӯзи нашр</label>
                              <input type="date" class="form-control" name="pub_date" id="pub_date" placeholder="dd-mm-yyyy" min="1991-09-09" max="2030-12-31" value="{{ $post->pub_date }}">
                          </div>
                          <div class="form-group">
                              <label for="pub_link">Нишонии электронӣ</label>
                              <input type="text" class="form-control" name="pub_link" id="pub_link" placeholder="нишонии электронӣ" value="{{ $post->pub_link }}">
                          </div>
                          <div class="form-group m-2">
                              <label for="image">Расм:</label>
                              <input type="file" class="form-control-file" name="image" id="image">
                              @error('image')
                                  <p class="text-danger"> {{$message}} </p>
                              @enderror
                          </div>
                        <button class="btn btn-primary" type="submit">ВИРОИШ</button>
                        <a class="btn btn-secondary fs-6" type="button" href = "{{ route('admin.posts') }}">БЕКОР</a>
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