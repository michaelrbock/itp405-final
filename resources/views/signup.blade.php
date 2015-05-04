@extends('app')

@section('title', 'Signup')

@section('content')
    <div class="row intro-header" style="margin-top: 10px;
                background: url(../img/longex.jpg) no-repeat center center;
                padding-bottom: 300px;">
        <div class="container">
            <div class="row">
                <h1 class="text-center">Signup</h1>
                <br>
            </div>
            <div class="col-lg-6 col-lg-offset-3">
                <form action="/signup" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select class="form-control" id="type" name="type">
                            <option value="blogger" @if($type=='blogger') selected @endif>Blogger</option>
                            <option value="advertiser" @if($type=='advertiser') selected @endif>Advertiser</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Don Draper">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="don@scdp.com">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group" style="margin-top: 20px;">
                        <button  type="submit" class="btn btn-default">
                            Sign up &nbsp;&nbsp;<i class="fa fa-sign-in"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- /.row intro-header -->
@stop
