@extends('layouts.app')

@section('content')
<div class="mx-3">
    <div class="row justify-content-center">
        <x-admin-nav />
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{ __('ДИГАР МАВОД') }}</h5>
                    @if (session()->has('message'))
                        {{session()->get('message')}}
                    @endif
                    <a class="btn btn-primary" href="{{ route('admin.post.create') }}" role="button">Иловаи мавод</a>
                </div>

                <div class="card-body">

                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                              <tr>
                                <th scope="col">Ном</th>
                                <th scope="col">Муаллиф</th>
                                <th scope="col">Шакл</th>
                                <th scope="col">Бахш</th>
                                <th scope="col">Ҷойи нашр</th>
                                <th scope="col">Рӯзи нашр</th>
                                <th class="text-center" scope="col"></th>
                                <th class="text-center" scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($posts as $post)
                              <tr>
                                <th scope="row">{{$post->title}}</th>
                                <td>{{$post->author->name_tg}}</td>
                                <td>{{$post->type->name_tg}}</td>
                                <td>{{$post->category->name_tg}}</td>
                                <td>{{$post->pub_place}}</td>
                                <td>{{$post->pub_date}}</td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" type="button" href = "{{ route('admin.post.edit', ['post' => $post]) }}">Вироиш</a>
                                </td>
                                <td class="text-center">
                                  <form method="post" onclick="return confirm('Дар ҳақиқат мехоҳед ин мақола ҳазф шавад?')" action="{{route('admin.post.delete', ['post' => $post])}}">
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
                  {!! $posts->links() !!}
              </div>
            </div>
        </div>
    </div>
</div>
@endsection