@extends('layouts.app')

@section('content')
<div class="mx-3">
    <div class="row justify-content-center">
        <x-admin-nav />
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{ __('Add student') }}</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" name="name" id="name" placeholder="full name" value="{{ old('name') }}">
                          @error('name')
                             <p class="text-danger"> {{$message}} </p>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone number</label>
                            <input type="text" class="form-control" name="phone" id="phone" maxlength="13" placeholder="phone number" value="{{ old('phone') }}">
                            @error('phone')
                             <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div>
                        <div class="form-group m-2">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                            @error('image')
                                <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
                        <a class="btn btn-secondary fs-6" type="button" href = "{{ route('students') }}">Cancel</a>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection