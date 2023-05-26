@extends('layouts.app')

@section('content')
<div class="mx-3">
    <div class="row justify-content-center">
        <x-admin-nav />
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{ __('Students') }}</h5>
                    @if (session()->has('message'))
                        {{session()->get('message')}}
                    @endif
                    <a class="btn btn-primary" href="{{ route('student.create') }}" role="button">Add Student</a>
                </div>

                <div class="card-body">

                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                              <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone number</th>
                                <th class="text-center" scope="col"></th>
                                <th class="text-center" scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($students as $student)
                              <tr>
                                <td><img class="rounded-circle" style="width: auto; height: 30px;" 
                                  src="{{$student->image ? asset('storage/' . $student->image) : asset('storage/images/ma.png')}}" alt=""></td>
                                <th scope="row">{{$student->name}}</th>
                                <td>{{$student->phone}}</td>

                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" type="button" href = "{{ route('student.edit', ['student' => $student]) }}">Edit</a>
                                </td>
                                <td class="text-center">
                                  <form method="post" onclick="return confirm('Are you sure?')" action="{{route('student.delete', ['student' => $student])}}">
                                      @method('delete')
                                      @csrf
                                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                  </form>
                              </td>
                              </tr>
                              @endforeach  
                            </tbody>
                          </table>
                        
                </div>
                <div class="d-flex">
                  {!! $students->links() !!}
              </div>
            </div>
        </div>
    </div>
</div>
@endsection