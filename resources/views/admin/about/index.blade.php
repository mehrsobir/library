@extends('layouts.app')

@section('content')
<div class="mx-3">
    <div class="row justify-content-center">
        <x-admin-nav />
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{ __('ДАР БОРАИ ИНСТИТУТ') }}</h5>
                    @if (session()->has('message'))
                        {{session()->get('message')}}
                    @endif
                    <a class="btn btn-primary" href="{{ route('admin.about.create') }}" role="button">Иловаи маълумот</a>
                </div>

                <div class="card-body">

                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                              <tr>
                                <th scope="col">Расм</th>
                                <th scope="col">Ном</th>
                                <th scope="col">Маълумот</th>
                                <th class="text-center" scope="col"></th>
                                <th class="text-center" scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($abouts as $about)
                              <tr>
                                <td><img class="rounded-circle" style="width: auto; height: 30px;" src="{{$about->image ? asset('storage/' . $about->image) : asset('storage/images/ma.png')}}" alt=""></td>
                                <th scope="row">{{$about->title_tg}}</th>
                                <td>{{$about->annotation_tg}}</td>

                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" type="button" href = "{{ route('admin.about.edit', ['about' => $about]) }}">Вироиш</a>
                                </td>
                                <td class="text-center">
                                  <form method="post" onclick="return confirm('Диққат!! Ҳазф шавад?')" action="{{route('admin.about.delete', ['about' => $about])}}">
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
            </div>
        </div>
    </div>
</div>
@endsection