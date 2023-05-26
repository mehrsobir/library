@extends('layouts.app')

@section('content')
<div class="mx-3">
    <div class="row justify-content-center">
        <x-admin-nav />
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{ __('МАҶАЛАҲО') }}</h5>
                    @if (session()->has('message'))
                        {{session()->get('message')}}
                    @endif
                    <a class="btn btn-primary" href="{{ route('journal.create') }}" role="button">Иловаи маҷала</a>
                </div>

                <div class="card-body">

                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                              <tr>
                                <th scope="col">Сол</th>
                                <th scope="col">Рақам</th>
                                <th scope="col">Рақами умумӣ</th>
                                <th scope="col">Файл</th>
                                <th scope="col">Слаг</th>
                                <th class="text-center" scope="col"></th>
                                <th class="text-center" scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($journals as $journal)
                              <tr>
                                <th scope="row">{{$journal->year}}</th>
                                <td>{{$journal->number}}</td>
                                <td>{{$journal->total_number}}</td>
                                <td>
                                  <a href="{{route('journal.pdf', ['journal' => $journal])}}" target="_blank"><img src="{{URL::asset('/app-images/icons8-pdf-100.png')}}" 
                                    width="30px" height="30px" class="adap-foto"></a></td>
                                <td>{{$journal->slug}}</td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" type="button" href = "{{ route('journal.edit', ['journal' => $journal]) }}">Вироиш</a>
                                </td>
                                <td class="text-center">
                                  <form method="post" onclick="return confirm('Дар ҳақиқат мехоҳед ин маҷалла ҳазф шавад?')" action="{{route('journal.delete', ['journal' => $journal])}}">
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