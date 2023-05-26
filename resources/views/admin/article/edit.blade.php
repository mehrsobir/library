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
                    <form method="post"  action="{{ route('admin.article.update', ['article' => $article]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Номи мақола</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="номи мақола" value="{{ $article->title }}">
                            @error('title')
                               <p class="text-danger"> {{$message}} </p>
                            @enderror
                          </div>
                          <div class="form-group">
                              <label for="annotation">Фишурда</label>
                              <textarea rows="6" type="text" class="form-control" name="annotation" id="annotation">{{ $article->annotation }}</textarea>
                              @error('annotation')
                               <p class="text-danger"> {{$message}} </p>
                              @enderror
                            </div>
                          <div class="form-group">
                              <label for="keywords">Калидвожаҳо</label>
                              <input type="text" class="form-control" name="keywords" id="keywords" placeholder="калидвожаҳо" value="{{ $article->keywords }}">
                              @error('keywords')
                               <p class="text-danger"> {{$message}} </p>
                              @enderror
                          </div>
  
                          <x-select-category :categorys="$categorys" value='{{$article->category->id}}'></x-select-category>
                          
                          <div class="form-group">
                              <label for="author_id">Муаллиф</label>
                              <div class="col-md-9">
                                  <select class="form-control" name="author_id" id="">
                                      <option value=""><small class="text-muted">--Лутфан муаллифро интихоб кунед!--</small></option>
                                      @foreach ($authors as $author)
                                          <option value="{{$author->id}}" {{ $article->author->id == $author->id ? 'selected' : ''}}>{{$author->name_tg}}</option>
                                      @endforeach         
                                  </select>
                              </div>
                              @error('author_id')
                                  <p class="text-danger"> {{$message}} </p>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label for="pages">Саҳифаҳо</label>
                              <input type="number" min="1" max="99" class="form-control" name="pages" id="pages" placeholder="шумораи саҳифаҳо" value="{{ $article->pages }}">
                              @error('pages')
                                  <p class="text-danger"> {{$message}} </p>
                              @enderror
                          </div>
  
                          <x-select-lang value="{{$article->lang}}"></x-select-lang>
  
                          <div class="form-group">
                              <label for="pub_place">Ҷойи нашр</label>
                              <input type="text" class="form-control" name="pub_place" id="pub_place" placeholder="ҷойи нашри мақола" value="{{ $article->pub_place }}">
                          </div>
                          <div class="form-group col-md-3">
                              <label for="pub_date">Рӯзи нашр</label>
                              <input type="date" class="form-control" name="pub_date" id="pub_date" placeholder="dd-mm-yyyy" min="1991-09-09" max="2030-12-31" value="{{ $article->pub_date }}">
                          </div>
                          <div class="form-group">
                              <label for="pub_link">Нишонии электронӣ</label>
                              <input type="text" class="form-control" name="pub_link" id="pub_link" placeholder="нишонии электронӣ" value="{{ $article->pub_link }}">
                          </div>
                          <div class="form-group m-2">
                              <label for="pdf">Файл:</label>
                              <input type="file" class="form-control-file" name="pdf" id="pdf">
                              @error('pdf')
                                  <p class="text-danger"> {{$message}} </p>
                              @enderror
                          </div>
                        <button class="btn btn-primary" type="submit">ВИРОИШ</button>
                        <a class="btn btn-secondary fs-6" type="button" href = "{{ route('admin.articles') }}">БЕКОР</a>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection