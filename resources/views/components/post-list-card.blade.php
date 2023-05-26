@props([
    'post',
    'name' => 'name_' . app()->getLocale()
    ])

<div class="card p-0 bg-white my-2">
    <a class="text-decoration-none text-dark" href="{{route('post', ['lang' => app()->getLocale(), 'post' => $post])}}">
        <div class="p-0">
            <div class="card-body">
                <h6 class="card-title fs-6">{{ $post->title ?? ''}}</h6>
            </div>
            <div class="card-footer text-muted">
                {{$post->author->$name}}, 
                {{$post->pub_date ?? date('Y-d-m', strtotime($post->created_at))}}, 
                {{__('Бахш')}}: {{$post->category->$name}}
            </div>
        </div>
    </a>
</div>

