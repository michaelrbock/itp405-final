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
                            <strong>Success!</strong><br>
                            <ul>
                                <li>{{ Session::get('success') }}</li>
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

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="budget">Budget (USD)</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="budget" id="budget" value="{{ old('budget') }}"
                                 placeholder="$1000">
                            </div>
                        </div>

                        <input type="hidden" name="advertiser_id" value="{{ Auth::user()->advertiser->id }}">

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
                    <table class="table table-hover">
                        <thead><tr>
                            <td>Title</td>
                            <td>Description/Keywords</td>
                            <td>Budget</td>
                            <td></td>
                            <td>Status</td>
                            <td></td>
                        </tr></thead>
                        <tbody>
                        @foreach ($jobs as $job)
                            <tr @if ($job->status == 'bid') class="success"
                             @elseif ($job->status == 'completed') class="info"
                             @elseif ($job->status == 'accepted') class="warning" @endif>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->description }}</td>
                                <td>${{ $job->budget }}</td>
                                <td><a class="btn btn-default" role="button" href="/jobs/{{ $job->id }}/content">Preview Content</a></td>
                                <td>
                                    @if ($job->status == 'bid')
                                        <a class="btn btn-success" role="button" href="/jobs/{{ $job->id }}/bid">View ${{ $job->bid }} Bid</a>
                                    @else
                                        {{ $job->status }}
                                    @endif
                                </td>
                                @if ($job->status == 'bid')
                                    <form class="form" role="form" method="POST" action="{{ url('/jobs/' . $job->id . '/accept') }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <td><input type="submit" class="btn btn-primary" value="Accept Bid"></td>
                                    </form>
                                    <form class="form" role="form" method="POST" action="{{ url('/jobs/' . $job->id . '/reject') }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <td><input type="submit" class="btn btn-danger" value="Reject Bid"></td>
                                    </form>
                                @elseif ($job->status == 'new')
                                    <td>Waiting for Bid</td>
                                    <td></td>
                                @else
                                    <td><a class="btn btn-default" role="button" href="/jobs/{{ $job->id }}/bid">View ${{ $job->bid }} Job</a></td>
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
