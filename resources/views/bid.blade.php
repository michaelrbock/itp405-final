@extends('app')

@section('title', 'Bid Deail')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="margin-top: 70px;">
                <div class="panel-heading">Bid Detail - Status: {{ $job->status }}</div>

                <div class="panel-body">
                    <h2>
                        {{ $job->title }}
                        @if($job->live_url)
                            <a href="{{ $job->live_url }}">(Live Link)</a>
                        @endif
                    </h2>
                    <p>Description: {{ $job->description }}</p>
                    <p>Your budget: ${{ $job->budget }}</p>
                    <hr>
                    <h4>The Bid: ${{ $job->bid }}</h4>

                    <p>Blog Name: {{ $job->blogger->name }}</p>
                    <p>Blog Website: <a href="{{ $job->blogger->website }}">Link</a></p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
