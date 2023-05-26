@extends('layouts.app')

@section('content')
<div class="mx-3">
    <div class="row justify-content-center">
        <x-admin-nav />
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{ __('Edit Book') }}</h5>
                </div>

                <div class="card-body">
                    <form method="post"  action="{{ route('book.update', ['book' => $book]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{ $book->title }}">
                            @error('title')
                               <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div>
                          
                          <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" name="author" id="author" placeholder="author" value="{{ $book->author }}">
                            @error('author')
                               <p class="text-danger"> {{$message}} </p>
                            @enderror
                          </div>
                          <div class="form-group">
                              <label for="pages">Pages</label>
                              <input type="number" min="1" max="1199" class="form-control" name="pages" id="pages" placeholder="pages" value="{{ $book->pages }}">
                              @error('pages')
                                  <p class="text-danger"> {{$message}} </p>
                              @enderror
                          </div>
  
                          <div class="form-group col-md-3">
                              <label for="pub_year">Year</label>
                              <input type="number" class="form-control" name="pub_year" id="pub_year" placeholder="соли нашр" min="1960" max="2030" value="{{ $book->pub_year }}">
                          </div>
                        <button class="btn btn-primary" type="submit">Edit</button>
                        <a class="btn btn-secondary fs-6" type="button" href = "{{ route('books') }}">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection