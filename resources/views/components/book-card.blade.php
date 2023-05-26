@props([
    'book',
    'name' => 'name_' . app()->getLocale()
    ])

<div class="card p-0 col-xl-6 bg-white my-2">
    <a class="text-decoration-none text-dark" href="{{route('book', ['lang' => app()->getLocale(), 'book' => $book])}}">
        <div class="p-0">
            <div class="card-body">
                <div class="d-flex">
                    <div class="row">
                        <img src="{{$book->image ? asset('storage/' . $book->image) : asset('storage/images/ma.jpg')}}" height="200" class="col-8 col-sm-5 mx-auto">
                        <div class="ps-2 pt-1 col-sm-7">
                            <h6 class="fs-6 fw-bold">{{ $book->title ?? ''}}</h6>
                            <hr />
                            <p>{{__('Муаллиф')}}: {{$book->author->$name}}</p> 
                            <p>{{__('Соли нашр')}}: {{$book->pub_year}}</p>
                            <p>{{__('Бахш')}}: {{$book->category->$name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>

