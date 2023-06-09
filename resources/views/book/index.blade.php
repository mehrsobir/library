@extends('layouts.app')

@section('content')
<div class="mx-3">
    <div class="row justify-content-center">
        <x-admin-nav />
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{ __('Books') }}</h5>
                    @if (session()->has('message'))
                        {{session()->get('message')}}
                    @endif
                    <a class="btn btn-primary" href="{{ route('book.create') }}" role="button">Add Book</a>
                </div>

                <div class="card-body">

                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                              <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Pages</th>
                                <th scope="col">Year</th>
                                <th class="text-center" scope="col"></th>
                                <th class="text-center" scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($books as $book)
                              <tr>
                                <th scope="row">{{$book->title}}</th>
                                <td>{{$book->author}}</td>
                                <td>{{$book->pages}}</td>
                                <td>{{$book->pub_year}}</td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" type="button" href = "{{ route('book.edit', ['book' => $book]) }}">Edit</a>
                                </td>
                                <td class="text-center">
                                  <form method="post" onclick="return confirm('Are you sure?')" action="{{route('book.delete', ['book' => $book])}}">
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
                  {!! $books->links() !!}
              </div>
            </div>
        </div>
    </div>
</div>
@endsection