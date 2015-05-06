@extends('app')

@section('title', 'Admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="margin-top: 70px;">
                <div class="panel-heading">All Jobs</div>

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
                            <td>Title</td>
                            <td>Description/Keywords</td>
                            <td>Advertiser Budget</td>
                            <td>Status</td>
                            <td>Advertiser</td>
                            <td>Blogger</td>
                            <td>Live URL</td>
                        </tr></thead>
                        <tbody>
                        @foreach ($jobs as $job)
                            <tr @if ($job->status == 'bid') class="warning"
                             @elseif ($job->status == 'completed') class="success"
                             @elseif ($job->status == 'accepted') class="info"
                             @elseif ($job->status == 'new') class="danger" @endif>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->description }}</td>
                                <td>${{ $job->budget }}</td>
                                <td>{{ $job->status }} @if ($job->status == 'bid') ${{ $job->bid }} @endif</td>
                                @if ($job->advertiser)
                                    <td>{{ $job->advertiser->name }}</td>
                                @else
                                    <td></td>
                                @endif
                                @if ($job->blogger)
                                    <td>{{ $job->blogger->name }}</td>
                                @else
                                    <td></td>
                                @endif
                                @if ($job->live_url)
                                    <td><a href="{{ $job->live_url }}">Link</a></td>
                                @else
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

</div>
@endsection
