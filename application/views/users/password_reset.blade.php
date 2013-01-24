@layout('layouts.default')

@section('content')

<div id="pageContainer">
		
		<div id="signUp" class="clearfix">
			@if(Session::has('message'))
				{{ Session::get('message') }}
			@endif
			{{ Form::open('users/password_reset','POST',array('class'=>'cleanForm', 'id'=>'signUpForm')) }}
			{{ Form::token() }}
				<fieldset>
					<p>
						<label for="username">Username: <span class="requiredField">*</span></label>
						{{ Form::text('username', Input::old('username'), array('class'=>'inputStyle', 'id'=>'username')) }}
						{{ $errors->first('username','<em class="emsg">:message</em>') }}
					</p>
				
				{{ Form::submit('Reset', array('class'=>'inputStyleBtn')) }}&nbsp;&nbsp;&nbsp;&nbsp;{{ HTML::link_to_route('home','Cancel','',array('class'=>'inputStyleBtn')) }}

				</fieldset>
			{{ Form::close() }}

		<!-- Sidebar -->
			<div id="sidebar">
				<h3>Important Information</h3>
				
				<ul>
					<li>An email containing your new password will be sent to your email address and your GSM number.</li>
				</ul>
			</div> <!-- end sidebar -->
		
		</div> <!-- end signUp -->

		</div>


		</div> <!-- end pageContainer -->

@endsection