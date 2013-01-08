@layout('layouts.default')

@section('content')

<div id="pageContainer">
		
		<div id="signUp" class="clearfix">
			<div class="successFeedback">
			  <p>Your Password has been reset successfully!</p>
			</div>

			<div id="signup-success">
				<!-- TODO: implement the Email and SMS library to elimate displaying password here -->
				<p>
					We have sent the new password to your GSM number: <strong>{{ $reset_data['gsm_no'] }}</strong> and email address: <strong>{{ strtolower($reset_data['email']) }}</strong>
				</p>
				<p>
					<strong>NOTE:</strong> Remember to change the password immediately after you login!
				</p>
				<p>Click {{ HTML::link_to_route('home','here') }} to login!</p>
			</div><!-- end signup-success -->

		</div>


</div> <!-- end pageContainer -->

@endsection