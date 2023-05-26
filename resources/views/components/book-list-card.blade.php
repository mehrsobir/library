@props([
    'book',
    'name' => 'name_' . app()->getLocale()
    ])

<div class="card p-0 bg-white my-2">
    <a class="text-decoration-none text-dark" href="{{route('book', ['lang' => app()->getLocale(), 'book' => $book])}}">
        <div class="p-0">
            <div class="card-body">
                <h6 class="card-title fs-6">{{ $book->title ?? ''}}</h6>
            </div>
            <div class="card-footer text-muted">
                {{$book->author->$name}}, 
                {{$book->pub_year}}, 
                {{__('Бахш')}}: {{$book->category->$name}}
            </div>
        </div>
    </a>
</div>

