@props([
    'cats',
    'selected' => null,
    'name' => 'name_' . app()->getLocale()
    ])

<div class="d-flex-column">
    @foreach ($cats as $cat)
        <h6 class="row m-0"> 
            <a href="{{ route('books', ['lang' => app()->getLocale(), 'category' => $cat->id]) }}" class="mt-1 btn btn-small {{$selected == $cat->id ? 'btn-secondary' : 'btn-outline-dark'}}">
                {{$cat->$name}}
            </a>
        </h6>
    @endforeach
</div>
