@extends('app')

@section('title', 'Blogger')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="margin-top: 70px;">
                <div class="panel-heading">Current Jobs</div>

                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>Success!</strong><br>
                            <ul>
                                <li>{{ Session::get('success') }}</li>
                            </ul>
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead><tr>
                            <td>Advertiser</td>
                            <td>Title</td>
                            <td>Description/Keywords</td>
                            <td>Advertiser Budget</td>
                            <td>Status</td>
                            <td></td>
                            <td>Live URL</td>
                        </tr></thead>
                        <tbody>
                        @foreach ($current_jobs as $job)
                            <tr @if ($job->status == 'bid') class="warning"
                             @elseif ($job->status == 'completed') class="info"
                             @elseif ($job->status == 'accepted') class="success" @endif>
                                <td>{{ $job->advertiser->name }}</td>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->description }}</td>
                                <td>${{ $job->budget }}</td>
                                <td>{{ $job->status }} @if ($job->status == 'bid') ${{ $job->bid }} @endif</td>
                                <td><a class="btn btn-default" role="button" href="/jobs/{{ $job->id }}">Preview Content</a></td>
                                @if ($job->status == 'accepted')
                                    <form class="form" role="form" method="POST" action="{{ url('/jobs/' . $job->id . '/complete') }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <td><input type="text" name="live_url" class="form-control" style="width: 100px;">
                                        <td><input type="submit" class="btn btn-primary" value="Complete Job"></td>
                                    </form>
                                @elseif ($job->status == 'completed')
                                    <td><a href="{{ $job->live_url }}">Link</a></td>
                                    <td></td>
                                @else
                                    <td></td>
                                    <td></td>
                                @endif
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
                            <td>Advertiser Budget</td>
                            <td></td>
                            <td>Status</td>
                            <td>Bid $</td>
                            <td></td>
                        </tr></thead>
                        <tbody>
                        @foreach ($available_jobs as $job)
                            <tr>
                                <td><a href="{{ $job->advertiser->website }}">{{ $job->advertiser->name }}</a></td>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->description }}</td>
                                <td>${{ $job->budget }}</td>
                                <td><a class="btn btn-default" role="button"  href="/jobs/{{ $job->id }}/content">Preview Content</a></td>
                                <td>{{ $job->status }}</td>
                                <form class="form" role="form" method="POST" action="{{ url('/jobs/' . $job->id . '/bid') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <td><input type="number" name="bid" class="form-control"></td>
                                    <td><input type="submit" class="btn btn-primary" value="Bid for Job"></td>
                                </form>
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
