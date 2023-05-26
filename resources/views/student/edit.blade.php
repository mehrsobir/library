@extends('layouts.app')

@section('content')
<div class="mx-3">
    <div class="row justify-content-center">
        <x-admin-nav />
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{ __('Edit Student') }}</h5>
                </div>

                <div class="card-body">
                    <form method="post"  action="{{ route('student.update', ['student' => $student]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="name">Full name</label>
                          <input type="text" class="form-control" id="" name="name" value='{{ $student->name }}'>
                          @error('name')
                             <p class="text-danger"> {{$message}} </p>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone number</label>
                            <input type="text" class="form-control" name="phone" id="" maxlength="13" value='{{ $student->phone }}'>
                            @error('phone')
                             <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div>
                        <div class="form-group m-2">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control-file" name="image" id="">
                            @error('image')
                                <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div>
                        <button class="btn btn-primary" type="submit">Edit</button>
                        <a class="btn btn-secondary fs-6" type="button" href = "{{ route('students') }}">Cancel</a>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection