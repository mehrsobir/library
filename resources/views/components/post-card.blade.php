@props([
    'post',
    'name' => 'name_' . app()->getLocale()
    ])

<div class="card p-0 col-lg-6 bg-white my-2">
    <a class="text-decoration-none text-dark" href="{{route('post', ['lang' => app()->getLocale(), 'post' => $post])}}">
        <div class="p-0">
            <div class="text-white" style="position: relative;">
                <p class="px-1 rounded" style="font-weight: 500;font-size: 12px;position: absolute;background: rgba(0, 0, 0, 0.60);">{{ $post->type->$name ?? ''}}</p>
                <img src="{{$post->image ? asset('storage/' . $post->image) : asset('storage/images/ma.jpg')}}" class="card-img-top img-fluid" alt="Расм" height="139px">
            </div>
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

