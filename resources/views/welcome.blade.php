@extends('app')

@section('title', 'Welcome')

@section('content')
	<!-- Header -->
	<a name="about"></a>
	<div class="intro-header">
		<div class="container">

			<div class="row">
				<div class="col-lg-12">
					<div class="intro-message">
						<h1>Arctic Ads</h1>
						<h3>A new marketplace for native advertising</h3>
						<hr class="intro-divider">
						<ul class="list-inline intro-social-buttons">
							<li>
								<a href="/auth/register?type=blogger" class="btn btn-default btn-lg"><i class="fa fa-angle-double-left fa-fw"></i><span class="network-name">I am a blogger</span></a>
							</li>
							<li>
								<a href="/auth/register?type=advertiser" class="btn btn-default btn-lg"><span class="network-name">I am an advertiser</span><i class="fa fa-angle-double-right fa-fw"></i></a>
							</li>
						</ul>
						<br>
						<h4>Read below for more info on how it works</h4>
					</div>
				</div>
			</div>

		</div>
		<!-- /.container -->

	</div>
	<!-- /.intro-header -->

	<!-- Page Content -->

	<a name="services"></a>
	<div class="content-section-a">

		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-sm-6">
					<hr class="section-heading-spacer">
					<div class="clearfix"></div>
					<h2 class="section-heading">
						Bloggers, make money<br>by posting sponsored content
					</h2>
					<p class="lead">
						Bloggers &amp; publishers of all size can now make money by posting content sponsored
						by companies and advertising agencies.
					</p>
				</div>
				<div class="col-lg-5 col-lg-offset-2 col-sm-6">
					<img class="img-responsive" src="img/night-square.jpg" alt="">
				</div>
			</div>

		</div>
		<!-- /.container -->

	</div>
	<!-- /.content-section-a -->

	<div class="content-section-b">

		<div class="container">

			<div class="row">
				<div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
					<hr class="section-heading-spacer">
					<div class="clearfix"></div>
					<h2 class="section-heading">Advertisers &amp; Companies,<br>reach the right people</h2>
					<p class="lead">
						By using Arctic, advertisers and companies can reach the right audience using sponsored posts for a fraction of the cost.
					</p>
				</div>
				<div class="col-lg-5 col-sm-pull-6  col-sm-6">
					<img class="img-responsive" src="img/people.jpg" alt="">
				</div>
			</div>

		</div>
		<!-- /.container -->

	</div>
	<!-- /.content-section-b -->

	<div class="content-section-a">

		<div class="container">

			<div class="row">
				<div class="col-lg-5 col-sm-6">
					<hr class="section-heading-spacer">
					<div class="clearfix"></div>
					<h2 class="section-heading">Bloggers and Advertiser<br>Use Arctic to connect</h2>
					<p class="lead">
						Arctic makes it easy for bloggers and advertisers to connect to sponsored and run contnet.
					</p>
				</div>
				<div class="col-lg-5 col-lg-offset-2 col-sm-6">
					<img class="img-responsive" src="img/mag.jpg" alt="">
				</div>
			</div>

		</div>
		<!-- /.container -->

	</div>
	<!-- /.content-section-a -->

	<a  name="contact"></a>
	<div class="banner">

		<div class="container">

			<div class="row">
				<div class="col-lg-6">
					<h2>Connect to Start Advertising and Making Money</h2>
				</div>
				<div class="col-lg-6">
					<ul class="list-inline banner-social-buttons">
						<li>
							<a href="/auth/register?type=blogger" class="btn btn-default btn-lg"><span class="network-name">Sign up as a blogger</span></a>
						</li>
						<li>
							<a href="/auth/register?type=advertiser" class="btn btn-default btn-lg"><span class="network-name">Sign up as an advertiser</span></a>
						</li>
					</ul>
				</div>
			</div>

		</div>
		<!-- /.container -->

	</div>
	<!-- /.banner -->
@stop