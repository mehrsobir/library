@extends('layouts.app')

@section('content')
<div class="mx-3">
    <div class="row justify-content-center">
        <x-admin-nav />
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{ __('Add Book') }}</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{ old('title') }}">
                          @error('title')
                             <p class="text-danger"> {{$message}} </p>
                          @enderror
                        </div>
                                                
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" name="author" id="author" placeholder="author" value="{{ old('author') }}">
                           
                            @error('author')
                                <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pages">Pages</label>
                            <input type="number" min="1" max="1199" class="form-control" name="pages" id="pages" placeholder="pages" value="{{ old('pages') }}">
                            @error('pages')
                                <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="pub_year">Year</label>
                            <input type="number" class="form-control" name="pub_year" id="pub_year" placeholder="year" min="1960" max="2030" value="{{ old('pub_year') }}">
                            @error('pub_year')
                                <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div><br>
                        <button class="btn btn-primary btn-sm" type="submit">Save</button>
                        <a class="btn btn-secondary btn-sm" type="button" href = "{{ route('books') }}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection