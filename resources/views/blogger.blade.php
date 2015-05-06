@extends('app')

@section('title', 'Blogger')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="margin-top: 70px;">
                <div class="panel-heading">Current Jobs</div>

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
                        @foreach ($current_jobs as $job)
                            <tr>
                                <td>{{ $job->advertiser->name }}</td>
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

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="margin-top: 10px;">
                <div class="panel-heading">Available Jobs</div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <thead><tr>
                            <td>Advertiser</td>
                            <td>Title</td>
                            <td>Description/Keywords</td>
                            <td>Status</td>
                            <td></td>
                            <td></td>
                        </tr></thead>
                        <tbody>
                        @foreach ($available_jobs as $job)
                            <tr>
                                <td><a href="{{ $job->advertiser->website }}">{{ $job->advertiser->name }}</a></td>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->description }}</td>
                                <td>{{ $job->status }}</td>
                                <td><a class="btn btn-default" role="button" href="/jobs/{{ $job->id }}">Preview Content</a></td>
                                <td><a class="btn btn-primary" role="button" href="jobs/{{ $job->id }}/accept">Accept Job</a></td>
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
