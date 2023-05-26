<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('ИОМДОА') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body class="d-flex flex-column min-vh-100" style="font-family: 'Roboto', sans-serif !important;  background: #F1F1F1">
    <header>
      <div class="d-flex d-flex-column flex-lg-row  justify-content-center p-1 m-auto"  style="background: #DADADA;">
        <img src="{{URL::asset('/app-images/logo-amit.ico')}}" width="80px" height="80px">
          <div class=""> 
            <div class="p-0">
              <a href="{{ url('/', app()->getLocale()) }}" class="text-decoration-none" style="color: #45156b;">
                <p class="text-center fw-bold m-0">{{__('АКАДЕМИЯИ МИЛЛИИ ИЛМҲОИ ТОҶИКИСТОН')}}</p>
                <p class="text-center fw-bold m-0 px-1">{{__('ИНСТИТУТИ ОМӮЗИШИ МАСЪАЛАҲОИ ДАВЛАТҲОИ ОСИЁ ВА АВРУПО')}}</p>
              </a>
            </div><hr class="m-0"/>
            <!-- Change language -->
            <div class="d-flex justify-content-center pt-1"  style="font-size: 12px;">                
              <a href="{{ url('/') }}" class="d-flex text-decoration-none text-dark align-items-center me-2 {{ app()->getLocale() === 'tg' ? 'border-bottom border-secondary' : ''}}">
                <img src="{{URL::asset('/app-images/tg.png')}}" width="18px" height="12px">
                <p class="m-0 ms-1">Тоҷикӣ</p>
              </a>
              <a href="{{ url('/', 'ru') }}" class="d-flex text-decoration-none text-dark align-items-center me-2 {{ app()->getLocale() === 'ru' ? 'border-bottom border-secondary' : ''}}">
                <img src="{{URL::asset('/app-images/ru.png')}}" width="18px" height="12px">
                <p class="m-0 ms-1">Русский</p>
              </a> 
              <a href="{{ url('/', 'en') }}" class="d-flex text-decoration-none text-dark align-items-center me-2 {{ app()->getLocale() === 'en' ? 'border-bottom border-secondary' : ''}}">
                <img src="{{URL::asset('/app-images/en.png')}}" width="18px" height="12px">
                <p class="m-0 ms-1">English</p>
              </a>         
            </div>
          </div>
        <img src="{{URL::asset('/app-images/logo.ico')}}" width="80px" height="80px">
      </div>
      <nav class="navbar navbar-expand-lg p-0" style="background: url({{URL::asset('/app-images/dd.png')}})no-repeat top/cover; font-size: 14px"> 
        @php($name = 'name_' . app()->getLocale())
          <button class="navbar-toggler ms-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <img src="{{URL::asset('/app-images/menu.png')}}" width="25px" height="25px">
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex flex-column flex-md-row container-xxl justify-content-md-between mt-3 mt-lg-0">
              <a href="{{ url('/', app()->getLocale()) }}" class="text-decoration-none ms-4 my-2 my-md-0 text-white"><p class="m-0">{{__('АСОСӢ')}}</p></a>
              <a href="{{ route('articles', app()->getLocale()) }}" class="text-decoration-none ms-4 my-2 my-md-0 text-white"><p class="m-0">{{__('МАҚОЛАҲОИ ИЛМӢ')}}</p></a>
              <div class="dropdown"> 
                <button class="btn btn-xs text-white dropdown-toggle ms-4 my-2 my-md-0" type="" id="dropdownMenuButton1" data-bs-toggle="dropdown" 
                    aria-expanded="false" style="--bs-btn-padding-y: 0; --bs-btn-padding-x: 0; --bs-btn-font-size: 14px;">{{__('ДИГАР МАВОД')}}</button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="color: #45156b;">
                  @foreach ($types as $type)
                    <li><a class="dropdown-item" href="{{ route('post.type', ['lang' => app()->getLocale(), 'type' => $type]) }}"><p class="m-0">{{$type->$name}}</p></a></li>
                  @endforeach
                </ul>
              </div>
              <a href="{{ route('books', app()->getLocale()) }}" class="text-decoration-none ms-4 my-2 my-md-0 text-white"><p class="m-0">{{__('КИТОБҲО')}}</p></a>
              <a href="{{ url('journal') }}" target="_blank" class=" text-decoration-none ms-4 my-2 my-md-0 text-white"><p class="m-0">{{__('МАҶАЛЛА')}}</p></a>
              <a href="{{ route('abouts', app()->getLocale()) }}" class="text-decoration-none ms-4 my-2 my-md-0 text-white"><p class="m-0">{{__('ДАР БОРАИ ИНСТИТУТ')}}</p></a>
            </div>
          </div>
      </nav>
    </header>

    <!-- BODY -->
    <section class="container-fluid d-flex justify-content-center p-0" style="font-size: 14px">
        @yield('content')
    </section>

    <footer class="d-flex justify-content-center mt-auto" style="background: #DADADA; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);">
        <div class="col-11">
          <div class="d-md-flex justify-content-between align-items-center py-3" style="border-bottom: 1px solid #B3A4A4;">
            <a href="{{ url('/', app()->getLocale()) }}" class="text-decoration-none m-2 my-md-0" style="color: #45156b;">
              <div class="d-flex">
                <img src="{{URL::asset('/app-images/logo-amit.ico')}}" width="40px" height="40px">
                <img src="{{URL::asset('/app-images/logo.ico')}}" width="40px" height="40px">
              </div>
            </a>
            
            <div class="">
              <a href="https://www.facebook.com/groups/676990354124165" target="_blank" class="ps-1"><img src="{{URL::asset('/app-images/fb.png')}}" width="30px" height="30px"></a>
              <a href="https://www.youtube.com/@-ravshanfikr9278" target="_blank" class="ps-1"><img src="{{URL::asset('/app-images/yt.png')}}" width="25px" height="25px"></a>
            </div>
            <div class="d-flex flex-column flex-lg-row mt-3 mt-md-0">
              <p style="font-style: normal;font-weight: 600;font-size: 14px;line-height: 18px;" class="m-0 me-0 me-lg-3">
                <img src="{{URL::asset('/app-images/icons8-google-maps-old-100.png')}}" width="18px" height="18px" class="me-2">{{__('ш. Душанбе, хиёбони Рӯдакӣ 33')}}</p>
              <p style="font-style: normal;font-weight: 600;font-size: 14px;line-height: 18px;" class="m-0 mt-3 mt-lg-0 me-lg-3">
                <img src="{{URL::asset('/app-images/icons8-call-female-90.png')}}" width="18px" height="18px" class="me-2">(+992 37) 221 05 72</p>
                <p style="font-style: normal;font-weight: 600;font-size: 14px;line-height: 18px;" class="m-0 mt-3 mt-lg-0">
                    <img src="{{URL::asset('/app-images/icons8-earth-planet-100.png')}}" width="18px" height="18px" class="me-2">mehrsobir2@gmail.com</p>
            </div>
          </div>
          <div class="d-flex justify-content-between  my-1">
            <p class="" style="font-style: normal;font-weight: 400;">{{__('Ҳама ҳуқукҳо маҳфузанд')}} &copy; <?php echo date("Y"); ?></p>
            <a class="text-decoration-none" href="https://anrt.tj/tj/" target="_blank">{{__('АКАДЕМИЯИ МИЛЛИИ ИЛМҲОИ ТОҶИКИСТОН')}}</a>
          </div>
        </div>
      </footer>
    </body>

</body>
</html>