@extends('layouts.app')

@section('content')
<div class="mx-3">
    <div class="row justify-content-center">
        <x-admin-nav />
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{ __('МУАЛЛИФОН') }}</h5>
                    @if (session()->has('message'))
                        {{session()->get('message')}}
                    @endif
                    <a class="btn btn-primary" href="{{ route('admin.author.create') }}" role="button">Иловаи муаллиф</a>
                </div>

                <div class="card-body">

                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                              <tr>
                                <th scope="col">Расм</th>
                                <th scope="col">Ному насаб</th>
                                <th scope="col">Вазифа</th>
                                <th scope="col">Маълумот</th>
                                <th scope="col">Телефон</th>
                                <th scope="col">Email</th>
                                <th class="text-center" scope="col"></th>
                                <th class="text-center" scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($authors as $author)
                              <tr>
                                <td><img class="rounded-circle" style="width: auto; height: 30px;" src="{{$author->image ? asset('storage/' . $author->image) : asset('storage/images/ma.png')}}" alt=""></td>
                                <th scope="row">{{$author->name_tg}}</th>
                                <td>{{$author->position->name_tg}}</td>
                                <td>{{$author->education->name_tg}}</td>
                                <td>{{$author->phone}}</td>
                                <td>{{$author->email}}</td>

                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" type="button" href = "{{ route('admin.author.edit', ['author' => $author]) }}">Вироиш</a>
                                </td>
                                <td class="text-center">
                                  <form method="post" onclick="return confirm('Диққат!! Бо ҳазфи муаллиф ҳамаи мақолаҳои вай ҳазф хоҳанд шуд!!! Ҳазф шавад?')" action="{{route('admin.author.delete', ['author' => $author])}}">
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
                  {!! $authors->links() !!}
              </div>
            </div>
        </div>
    </div>
</div>
@endsection