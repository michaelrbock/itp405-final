@extends('app')

@section('title', 'Blogger')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="margin-top: 70px;">
                <div class="panel-heading">Available Advertisements</div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <thead><tr>
                            <td>Advertiser</td>
                            <td>Title</td>
                            <td>URL of Content</td>
                            <td>Description/Keywords</td>
                            <td>Status</td>
                        </tr></thead>
                        <tbody>
                        @foreach ($jobs as $job)
                            <tr>
                                <td>{{ $job->user->name }}</td>
                                <td><a href="/jobs/{{ $job->id }}">{{ $job->title }}</a></td>
                                <td>{{ $job->content_url }}</td>
                                <td>{{ $job->description }}</td>
                                <td>{{ $job->status }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
