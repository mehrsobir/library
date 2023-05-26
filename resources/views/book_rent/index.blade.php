@extends('layouts.app')

@section('content')
<div class="mx-3">
    <div class="row justify-content-center">
        <x-admin-nav />
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{ __('Book Rents') }}</h5>
                    @if (session()->has('message'))
                        {{session()->get('message')}}
                    @endif
                    <a class="btn btn-primary" href="{{ route('book_rent.create') }}" role="button">Add Book Rent</a>
                </div>

                <div class="card-body">

                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                              <tr>
                                <th scope="col">Student</th>
                                <th scope="col">Book</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th class="text-center" scope="col"></th>
                                <th class="text-center" scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($book_rents as $book_rent)
                              <tr>
                                <th scope="row">{{$book_rent->student->name}}</th>
                                <td>{{$book_rent->book->title}}</td>
                                <td>{{$book_rent->start_date}}</td>
                                <td>{{$book_rent->end_date}}</td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" type="button" href = "{{ route('book_rent.edit', ['book_rent' => $book_rent]) }}">Edit</a>
                                </td>
                                <td class="text-center">
                                  <form method="post" onclick="return confirm('Are you sure?')" action="{{route('book_rent.delete', ['book_rent' => $book_rent])}}">
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
                  {!! $book_rents->links() !!}
              </div>
            </div>
        </div>
    </div>
</div>
@endsection