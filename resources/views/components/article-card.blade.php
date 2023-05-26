@props([
    'article',
    'name' => 'name_' . app()->getLocale()
    ])

<li class="list-group-item">
    <a class="text-decoration-none text-dark" href="{{route('article', ['lang' => app()->getLocale(), 'article' => $article])}}">  
        <h6 class="fs-6">
            {{ $article->title ?? ''}}
        </h6>
        <p class="text-secondary small mt-1">
            {{$article->author->$name}}, 
            {{$article->pub_date ?? date('Y-d-m', strtotime($article->created_at))}}, 
            {{__('Бахш')}}: {{$article->category->$name}}
        </p>
        
    </a>
</li>
