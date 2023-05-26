@extends('layouts.app')

@section('content')
<div class="mx-3">
    <div class="row justify-content-center">
        <x-admin-nav />
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{ __('КИТОБҲО') }}</h5>
                    @if (session()->has('message'))
                        {{session()->get('message')}}
                    @endif
                    <a class="btn btn-primary" href="{{ route('admin.book.create') }}" role="button">Иловаи китоб</a>
                </div>

                <div class="card-body">

                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                              <tr>
                                <th scope="col">Номи китоб</th>
                                <th scope="col">Муаллиф</th>
                                <th scope="col">Бахш</th>
                                <th scope="col">Файл</th>
                                <th scope="col">Ҷойи нашр</th>
                                <th scope="col">Соли нашр</th>
                                <th class="text-center" scope="col"></th>
                                <th class="text-center" scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($books as $book)
                              <tr>
                                <th scope="row">{{$book->title}}</th>
                                <td>{{$book->author->name_tg}}</td>
                                <td>{{$book->category->name_tg}}</td>
                                <td><a href="{{route('book.pdf', ['book' => $book])}}" target="_blank"><img src="{{URL::asset('/app-images/icons8-pdf-100.png')}}" 
                                  width="30px" height="30px" class="adap-foto"></a></td>
                                <td>{{$book->pub_place}}</td>
                                <td>{{$book->pub_year}}</td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" type="button" href = "{{ route('admin.book.edit', ['book' => $book]) }}">Вироиш</a>
                                </td>
                                <td class="text-center">
                                  <form method="post" onclick="return confirm('Дар ҳақиқат мехоҳед ин китоб ҳазф шавад?')" action="{{route('admin.book.delete', ['book' => $book])}}">
                                      @method('delete')
                                      @csrf
                                      <button type="submit" class="btn btn-danger btn-sm">Ҳазф</button>
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