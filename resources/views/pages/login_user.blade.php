@extends('welcome')

@section('content')


<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						
						<form action="{{url('/user-login')}}" method="post">
							{{csrf_field()}}
							<input type="email" placeholder="Email" name="user_email" required=""/>
							<input type="password" placeholder="password" name="password" required=""/>
							
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-6">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{url('/user-registration')}}" method="post">
							{{csrf_field()}}

							<input type="text" placeholder="Full Name" name="name" required="" />
							<input type="email" placeholder="Email" name="user_email" required=""/>
							<input type="password" placeholder="password" name="password" required=""/>
							<input type="text" placeholder="Mobile No" name="mobile_no" required=""/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->


@stop