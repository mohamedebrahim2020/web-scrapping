@extends('layout')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>{{ $article->title }}</h2>
            <div class="row">
                <div class="col-md-12">
                    <em>Source: </em><a class="label label-danger" href="{{ $article->article_link }}"
                        target="_blank">{{ $article->website->Website_name }}</a>
                    <article>
                        <p>{!! $article->article_dom !!}</p>
                    </article>>
                </div>
            </div>
        </div>
    </div>

@endsection
