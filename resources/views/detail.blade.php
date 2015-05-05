@extends('app')

@section('title', 'Job Deail')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="margin-top: 70px;">
                <div class="panel-heading">Content Detail</div>

                <div class="panel-body">
                    <h2>{{ $content->title }} (<a target="_blank" href="{{ $content->url }}">link</a>)</h2>
                    @if ($content->author)
                        <p>
                            Author: <small>{{ $content->author }}</small>
                        </p>
                    @endif
                    @if ($content->date_published)
                        <p>
                            Date published: <small>{{ $formatted_date }}</small>
                        </p>
                    @endif
                    <p>
                        Word count: <small>{{ $content->word_count }}</small>
                    <p class="lead">
                        {{ $content->excerpt }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
