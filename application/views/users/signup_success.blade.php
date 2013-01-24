@layout('layouts.default')

@section('content')

<div id="pageContainer">
		
		<div id="signUp" class="clearfix">
			<div class="successFeedback">
			  <p>Your PIN has been activated successfully!</p>
			</div>

			<div id="signup-success">

				<p>
					A Username and Password has been generated for you below:
				</p>
				<p>
				    Username: <strong>{{ $user_details['username'] }}</strong>
				    <br />
				    Password: <strong>{{ $user_details['password'] }}</strong>
				</p>	
				<p>
				    We have sent this details to your email address: <strong>{{ $user_details['email'] }}</strong> and GSM number: <strong>{{ $user_details['gsm_no'] }}</strong>
				</p>
				<p>{{ HTML::link('/','Login') }}<!-- <a href="index.html"></a> --> to continue your registration.</p>
			</div><!-- end signup-success -->

		</div>


		</div> <!-- end pageContainer -->

@endsection