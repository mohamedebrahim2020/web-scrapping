@extends('layout')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Articles</h2>

            @if (count($articles) > 0)

                @foreach ($articles as $article)
                    <div class="row">
                        <div class="col-md-12">


                            <h4><a href="{{ url('article-details/' . $article->id) }}">{{ $article->title }}</a></h4>

                            @if (!empty($article->description))
                                <article>
                                    <em>Website description: </em><a class="label label-danger"> {!! $article->description
                                        !!}</a>

                                </article>
                                <br>
                            @endif

                            <em>Website Name: </em><a class="label label-danger">{{ $article->website->Website_name }}</a>
                            <br>
                            <br>
                            <em>Article link: </em><a class="label label-danger">{{ $article->article_link }}</a>
                            <br>
                            <br>
                            <em>Created at: </em><a class="label label-danger">{{ $article->created_at }}</a>
                            <br>
                            <br>
                            <article>
                                <h4>article detail</h4>
                                <p>{!! $article->article_dom !!}</p>
                            </article>>
                            <a class="btn btn-warning pull-right" href="{{ $article->article_link }}" target="_blank">Go to
                                original article</a>
                        </div>
                    </div>
                    <hr />
                @endforeach

                @if (count($articles) > 0)
                    <center>
                        <div class="pagination">
                            <?php echo $articles->render(); ?>
                        </div>
                    </center>
                @endif

            @else
                <i>No articles found</i>

            @endif
        </div>
    </div>

@endsection
