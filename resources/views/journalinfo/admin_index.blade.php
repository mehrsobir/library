@extends('layouts.app')

@section('content')
<div class="mx-3">
    <div class="row justify-content-center">
        <x-admin-nav />
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{ __('МАЪЛУМОТИ МАҶАЛЛА') }}</h5>
                    @if (session()->has('message'))
                        {{session()->get('message')}}
                    @endif
                    <a class="btn btn-primary" href="{{ route('journalinfo.create') }}" role="button">Иловаи маълумоти маҷала</a>
                </div>

                <div class="card-body">
                  <table class="table table-striped table-hover">
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">Ном</th>
                          <th class="text-center" scope="col"></th>
                          <th class="text-center" scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($journalinfos as $journalinfo)
                        <tr>
                          <th scope="row">{{$journalinfo->title_tg}}</th>
                          
                          <td class="text-center">
                              <a class="btn btn-primary btn-sm" type="button" href = "{{ route('journalinfo.edit', ['journalinfo' => $journalinfo]) }}">Вироиш</a>
                          </td>
                          <td class="text-center">
                            <form method="post" onclick="return confirm('Дар ҳақиқат мехоҳед ин маълумоти маҷалла ҳазф шавад?')" 
                                action="{{route('journalinfo.delete', ['journalinfo' => $journalinfo])}}">
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