@extends('app')

@section('title', 'Advertiser')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="margin-top: 70px;">
                <div class="panel-heading">Request new Advertisement</div>

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
                            <strong>Success!</strong> {{ Session::get('success') }}<br>
                            <ul>
                                <li>Your add will be matched with our bloggers to be posted!</li>
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/jobs') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="title">Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}"
                                 placeholder="ex: 11 Lonely Foods Who Need A Friend">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="content_url">URL of Content</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="content_url" id="content_url" value="{{ old('content_url') }}"
                                 placeholder="ex: http://bzfd.it/1zJuPhE">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="description">Description/Keywords</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}"
                                 placeholder="ex: food, funny, health">
                            </div>
                        </div>

                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="margin-top: 10px;">
                <div class="panel-heading">Current Ads</div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <thead><tr>
                            <td>Title</td>
                            <td>URL of Content</td>
                            <td>Description/Keywords</td>
                            <td>Status</td>
                        </tr></thead>
                        <tbody>
                        @foreach ($jobs as $job)
                            <tr>
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
