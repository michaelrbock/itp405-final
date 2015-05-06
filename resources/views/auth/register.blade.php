@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default" style="margin-top: 70px;">
				<div class="panel-heading">Register</div>
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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label" for="type">Type</label>
							<div class="col-md-6">
								<select class="form-control" name="type" id="type"
								 onchange="javascript:location.href = this.value;">
									<option value="?type=blogger" @if (Request::input('type') == 'blogger') selected @endif>Blogger</option>
									<option value="?type=advertiser" @if (Request::input('type') == 'advertiser') selected @endif>Advertiser</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" for="name">Full Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"
								 @if (Request::input('type') == 'blogger') placeholder="ex: John Gruber" @endif
								 @if (Request::input('type') == 'advertiser') placeholder="ex: Don Draper" @endif>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" for="additional_name">
								@if (Request::input('type') == 'blogger') Blog Name
								@elseif (Request::input('type') == 'advertiser') Company/Agency Name
								@else Company Name @endif
							</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="additional_name" id="additional_name" value="{{ old('additional_name') }}"
								 @if (Request::input('type') == 'blogger') placeholder="ex: Daring Fireball" @endif
								 @if (Request::input('type') == 'advertiser') placeholder="ex: Sterling Cooper Draper Pryce" @endif>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" for="website">Website</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="website" id="website" value="{{ old('website') }}"
								 @if (Request::input('type') == 'blogger') placeholder="ex: http://daringfireball.net" @endif
								 @if (Request::input('type') == 'advertiser') placeholder="ex: http://scdp.com" @endif>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" for="email">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
								@if (Request::input('type') == 'blogger') placeholder="ex: john@daringfireball.net" @endif
								@if (Request::input('type') == 'advertiser') placeholder="ex: don@scdp.com" @endif>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" for="password">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password" id="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" for="password_confirmation">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
