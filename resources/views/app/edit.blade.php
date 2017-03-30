@extends('layout2')

@section('content')

{{-- Page title & Title Right --}}
<div class="page-title">
	<div class="title_left">
		<h3>App Panel</h3>
	</div>

	<div class="title_right">
		<div class="col-md-5 col-sm-5 col-xs-12 pull-right title-btn">
			<button class="btn btn-primary addon-btn pull-right"><i class="fa fa-plug"></i>Connect to My App</button>
		</div>
	</div>
</div>
{{-- Page title end --}}


@include('error')

<!--body wrapper start-->


<div class="wrapper">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>App Panel</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form action="{{ route('app.update') }}" class="form-horizontal" method="POST">
						<div class="form-group @if($errors->has('username')) has-error @endif" >
							<label for="username" class="col-md-4 col-sm-4 col-xs-12 control-label">Username</label>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<input type="text" id="username-field" name="username" class="form-control" value="{{ $user->username }}" required="">
								@if($errors->has("username"))
								<span class="help-block">{{ $errors->first("username") }}</span>
								@endif
							</div>
						</div>
						<div class="form-group @if($errors->has('email')) has-error @endif" >
							<label for="email" class="col-md-4 col-sm-4 col-xs-12 control-label">Email</label>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<input type="email" id="email-field" name="email" class="form-control" value="{{ $user->email }}" required="">
								@if($errors->has("email"))
								<span class="help-block">{{ $errors->first("email") }}</span>
								@endif
							</div>
						</div>
						<div class="form-group @if($errors->has('name')) has-error @endif" >
							<label for="name" class="col-md-4 col-sm-4 col-xs-12 control-label">App Name</label>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<input type="text" id="name-field" name="name" class="form-control" value="{{ $app->name }}" required="">
								@if($errors->has("name"))
								<span class="help-block">{{ $errors->first("name") }}</span>
								@endif
							</div>
						</div>
						<div class="form-group @if($errors->has('name')) has-error @endif">
							<label for="description-field" class="col-md-4 col-sm-4 col-xs-12 control-label">Description</label>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<textarea class="form-control" id="description-field" rows="3" name="description">{{ $app->description }}</textarea>
								@if($errors->has("description"))
								<span class="help-block">{{ $errors->first("description") }}</span>
								@endif
							</div>
						</div>
						<div class="form-group @if($errors->has('token')) has-error @endif">

							<label for="token-field" class="col-md-4 col-sm-4 col-xs-12 control-label">Token</label>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<div class="input-group m-b-10" >
									<input type="text" id="token" readonly value="{{$app->token}}" class="form-control">
									<span class="input-group-btn">
										<input type="hidden" name="_method" value="PUT">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<button class="btn btn-primary" onclick="update_token()" type="button"><i class="fa fa-refresh"></i> Regenerate</button>
									</span>
								</div>
								@if($errors->has("token"))
								<span class="help-block">{{ $errors->first("token") }}</span>
								@endif
							</div>
						</div>
						<div class="form-group @if($errors->has('password')) has-error @endif" >
							<label for="password" class="col-md-4 col-sm-4 col-xs-12 control-label">Password</label>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<input type="password" id="password-field" name="password" class="form-control">
								@if($errors->has("password"))
								<span class="help-block">{{ $errors->first("password") }}</span>
								@endif
							</div>
						</div>
						<div class="form-group @if($errors->has('password_confirmation')) has-error @endif" >
							<label for="password_confirmation" class="col-md-4 col-sm-4 col-xs-12 control-label">Password Confirmation</label>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<input type="password" id="password_confirmation-field" name="password_confirmation" class="form-control">
								@if($errors->has("password_confirmation"))
								<span class="help-block">{{ $errors->first("password_confirmation") }}</span>
								@endif
							</div>
						</div>
						<div class="form-group @if($errors->has('old_password')) has-error @endif" >
							<label for="old_password" class="col-md-4 col-sm-4 col-xs-12 control-label">Old Password</label>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<input type="password" id="old_password-field" name="old_password" class="form-control" required="">
								@if($errors->has("old_password"))
								<span class="help-block">{{ $errors->first("old_password") }}</span>
								@endif
							</div>
						</div>

						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="text-center col-md-4 col-sm-4 col-xs-12 col-md-offset-4 col-sm-offset-4">
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-info  pull-left" data-toggle="modal" data-target="#connect-to-app">
									<i class="fa fa-plug"></i>
									Connect to my App
								</button>
								<button type="submit" class="btn btn-info pull-right"><i class="fa fa-floppy-o"></i> Save Changes</button>
							</div>
						</div>
					</form>
				</div>
			</section>
		</div>
	</div>
</div>
<!--body wrapper end-->

<!-- Modal -->
<div class="modal fade" id="connect-to-app" tabindex="-1" role="dialog" aria-labelledby="Label" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Choose connection type</h4>
			</div>
			<div class="modal-body">
				<ul class="nav nav-tabs" id="options-tab">
					<li><a data-target="#web" data-toggle="tab">Web</a></li>
					<li><a data-target="#android" data-toggle="tab">Android</a></li>
					<li><a data-target="#ios" data-toggle="tab">IOS</a></li>
					<li><a data-target="#raw" data-toggle="tab">Raw</a></li>
				</ul>

				<div class="tab-content">
					<div class="tab-pane active" id="web">
						<pre>
							<code class="language-markup"><xmp style="margin-bottom: -25px; margin-left: 10px; margin-right: 10px; margin-top: -40px; overflow-wrap: break-word; white-space: pre-wrap;">

<script src="{{URL::to('/')}}/js/devless-sdk.js" class="devless-connection" devless-con-token="{{$app->token}}"></script>

							</xmp></code></pre>

						</div>
						<div class="tab-pane" id="android"><center>NA</center></div>
						<div class="tab-pane" id="ios"><center>NA</center></div>
						<div class="tab-pane" id="raw"><center>
							Domain: 
						</center></div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<script>
		function generate_token(){
			var settings = {
				"async": true,
				"crossDomain": true,
				"url": "/generatetoken",
				"method": "patch",
				"headers": {
					"content-type": "application/json",
					"cache-control": "no-cache",
				},
				"processData": false,
				"data": "{\"action\":\"regen\"}"
			};
			$.ajax(settings).done(function (response) {
				result = JSON.parse(response);
				if(result.status_code == 622){
					$("#token").val(result.payload.new_token);
				}
				else{
					alert("token could not be updated");
				}
			});
		}
		function update_token(message){
			if(confirm("Do you want to update token")){
				generate_token();
			}else{
				return false;
			}
		}
	</script>
	@endsection
