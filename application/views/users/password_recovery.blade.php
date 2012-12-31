@layout('layouts.default')

@section('content')

<div id="pageContainer">
		
		<div id="signUp" class="clearfix">
		
		<form action="#" method="POST" class="cleanForm" id="signUpForm">
			
				<fieldset>
					<p>
						<label for="username">Username: <span class="requiredField">*</span></label>
						<input type="text" id="username" name="username" class="inputStyle" />
						<!-- <em>Enter your Teller number.</em> -->
					</p>
				
					<input type="submit" value="Reset Password" class="inputStyleBtn" />
				
				<div class="formExtra">
					<p>Go back to {{ HTML::link_to_route('home','login') }}<!-- <a href="index.html"> </a> --> page.</p>
				</div>

				</fieldset>

				
			
			</form>

		<!-- Sidebar -->
			<div id="sidebar">
				<h3>Important Information</h3>
				
				<ul>
					<li>An email containing your new password will be sent to your email address.</li>
				</ul>
			</div> <!-- end sidebar -->
		
		</div> <!-- end signUp -->

		</div>


		</div> <!-- end pageContainer -->

@endsection