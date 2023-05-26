@extends('layouts.layout')

@section('content')
<div class="row container-xxl p-0">
  <!-- COL-3 -->
  <div class="card col-md-3">
    <nav class="navbar navbar-expand-md">
      <div class=""> 
        <div class="d-flex justify-content-arround">
          <div class="card-header" style="font-style: normal;font-weight: 700;font-size: 18px; border-left: 8px solid #5280F5;">{{ __('Мақолаҳои илмии охирин') }}</div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#ArticleSidebar" aria-controls="ArticleSidebar" aria-expanded="false" aria-label="Toggle navigation">
            <img src="{{URL::asset('/app-images/icons8-expand-arrow-100.png')}}" width="12px" height="12px">
          </button>
        </div>
        <div class="collapse navbar-collapse" id="ArticleSidebar">
          <div class="d-flex flex-column">
            <div class="card-body p-0">
              <ul class="list-group list-group-flush">
                @foreach ($articles as $article)
                    <x-article-card :article="$article" /> 
                @endforeach
              </ul>
            </div>
            <div class="row justify-content-center">
              <a class="card-footer w-75 text-decoration-none rounded text-center py-2 m-1 fw-bolder" href="{{route('articles', app()->getLocale())}}" 
                  style="color: #2F2C2C;border: 1px solid #ABA2A2;background: #D9D9D9;">{{__('БЕШТАР')}} 
                <img src="{{URL::asset('/app-images/icons8-right-arrow-60.png')}}" width="14px" height="14px">
              </a>
            </div>
          </div>
        </div>
      </div> 
    </nav>
  </div>
  <!-- COL-6 -->
    <div class="card col-md-6">
      <div class="card-header mt-2" style="font-style: normal;font-weight: 700;font-size: 18px; border-left: 8px solid #5280F5;">{{ __('Дигар маводи тозанашр') }}</div> 
      <div class="card-body">   
        <div class="row d-flex justify-content-arround">
            <!-- Artcile -->           
            @foreach ($posts as $post)
                    <x-post-card :post="$post" /> 
            @endforeach
        </div>
        <div class="row justify-content-center">
          <a class="w-50 text-decoration-none rounded text-center py-2 my-2 fw-bolder" href="{{route('posts', app()->getLocale())}}" 
            style="color: #2F2C2C;border: 1px solid #ABA2A2;background: #D9D9D9;">
            {{__('БЕШТАР')}} <img src="{{URL::asset('/app-images/icons8-right-arrow-60.png')}}" width="14px" height="14px">
          </a></div>
        </div>     
  </div>
    <div class="card col-md-3">
      <!-- search -->
      <div class="card-header">
        <form class="form-inline d-flex" action="{{ route('posts.search', app()->getLocale()) }}">
          <input class="form-control" type="search" name="search" placeholder="{{__('Ҷустуҷӯ')}}" required>
          <button type="submit"
            class="btn btn-small btn-outline-success ms-1"><img src="{{URL::asset('/app-images/icons8-search-100.png')}}" width="15px" height="15px"></button>
        </form>
      </div>
      <div class="card-body">
        <div class="mt-0 pb-1 mb-4" style="border-bottom: 1px solid #B7ABAB;">
          <img src="{{URL::asset('/app-images/president.jpg')}}" width="100%" height="140px" style="border: 1px solid #000000;" class="adap-foto  img-fluid">
          <figure class="text-center">
            <blockquote class="blockquote fs-6">
              <p class=""><small>
                "{{__('Академияи миллии илмҳои ҷумҳурӣ ин оинаест, ки симои интеллектуалӣ, сатҳи маърифату дониш ва тамаддуни ҷомеаи моро инъикос менамояд. Дар ҷомеаи башарӣ ҳар миллату халқеро аз рӯи ҳамин нишондиҳандаҳо, яъне дараҷаи рушди интеллектуалӣ ва маърифату тамаддунаш мешиносанду қадр мекунанд. Ҳар қадар ин оина покизаву беғубор бошад, ба ҳамон андоза симои маънавии миллату давлати мо рӯшантару барҷастатар ба ҷаҳониён ҷилвагар мешавад')}}".
              </small></p>
            </blockquote>
            <figcaption class="blockquote-footer fs-6">
              {{__('Эмомалӣ Раҳмон')}}
            </figcaption>
          </figure>
        </div>
        
        <div class="mt-3 pb-3" style="border-bottom: 1px solid #B7ABAB;">
          <h1 class="text-center" style="font-size: 16px;line-height: 20px;font-weight: 800;">{{__('МАҶАЛЛАИ «ОСИЁ ВА АВРУПО»')}}</h1>
          <a href="{{ url('journal') }}" target="_blank"><img src="{{URL::asset('/app-images/Majalla-1.png')}}" width="100%" height="165px" class="adap-foto img-fluid"></a>
        </div>
        
        <div class="mt-3 pb-3" style="border-bottom: 1px solid #B7ABAB;">
          <h1 class="text-center" style="font-size: 16px;line-height: 20px;font-weight: 800;">{{__('КИТОБҲО')}}</h1>
          <a href="{{ route('books', app()->getLocale()) }}"><img src="{{URL::asset('/app-images/GIH_gamla_anatomibocker.jpg')}}" width="100%" height="165px" class="adap-foto img-fluid"></a>
        </div>
      </div>
    </div>
</div>
@endsection