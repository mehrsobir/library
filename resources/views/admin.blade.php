@extends('layouts.app')

@section('content')
<div class="mx-3">
    <div class="row justify-content-center">
        <x-admin-nav />
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('ОМОРИ СОМОНА') }}</div>

                <div class="card-body">
                   <h5 class="border p-1">Шумораи муаллифон: {{ $author_num }}</h5>
                   <h5 class="border p-1">Шумораи мақолаҳои илмӣ: {{ $article_num }}</h5>
                   <h5 class="border p-1">Шумораи мақолаҳои оммавӣ: {{ $pub_article_num }}</h5>
                   <h5 class="border p-1">Шумораи китобҳо: {{ $book_num }}</h5>
                   <h5 class="border p-1">Шумораи ниҳодҳои ҳамкор: {{ $institution_num }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

