@layout('layouts.default')

@section('content')

<div id="pageContainer">
		
			<!-- Tabs -->
			<ul id="tabs" class="clearfix">
				<li class="inactiveTab fl" id="signInTab">
					<a href="/">
						<div class="signInTabContent">
							<span>Already activated your PIN?</span>
							<h1>Login here</h1>
						</div>
					</a>
					<span class="activeTabArrow"><!-- --></span>
				</li>
				<li class="activeTab fr" id="signUpTab">
						<div class="signUpTabContent">
							<span>Just got your PIN?</span>
							<h1>Signup here</h1>
						</div>
					<span class="activeTabArrow"><!-- --></span>
				</li>
			</ul>
			
		<!-- Sign Up Tab Content -->
		<div id="signUp" class="clearfix">
			@if(Session::has('message'))
				<div class="errorFeedback">
					<p>{{ Session::get('message') }}</p>
				</div>
			@endif
				
			{{ Form::open('users/signup','POST', array('class'=>'cleanForm','id'=>'signUpForm')) }}
		
			<fieldset>

				<p>
					<label for="surname">Surname: <span class="requiredField">*</span></label>
					{{ Form::text('surname',Input::old('surname'), array('id'=>'surname','class'=>'inputStyle')) }}
					{{ $errors->first('surname','<em class="emsg">:message</em>') }}
				</p>
			
				<p>
					<label for="first_name">First Name: <span class="requiredField">*</span></label>
					{{ Form::text('first_name',Input::old('first_name'), array('id'=>'first_name','class'=>'inputStyle')) }}
					{{ $errors->first('first_name','<em class="emsg">:message</em>') }}
				</p>

				<p>
					<label for="email">Email Address: <span class="requiredField">*</span></label>
					{{ Form::text('email',Input::old('email'), array('id'=>'email','class'=>'inputStyle')) }}
					{{ $errors->first('email','<em class="emsg">:message</em>') }}
				</p>

				<p>
					<label for="phone">GSM Number: <span class="requiredField">*</span></label>
					{{ Form::text('phone',Input::old('phone'), array('id'=>'phone','class'=>'inputStyle','maxlength'=>'11')) }}
					{{ $errors->first('phone','<em class="emsg">:message</em>') }}
				</p>

				<p>
					<label for="pin_number">PIN Number: <span class="requiredField">*</span></label>
					{{ Form::text('pin_number',Input::old('pin_number'), array('id'=>'pin_number','class'=>'inputStyle','maxlength'=>'12')) }}
					{{ $errors->first('pin_number','<em class="emsg">:message</em>') }}
				</p>


				<p>
					<label for="bank">Bank:</label>
					<!-- <input type="text" id="bank" name="bank" class="inputStyle" /> -->
					<select name="bank" class="inputStyle">
						<option value="1">Guaranty Trust Bank</option>
						<option value="2">Zenith Bank</option>
					</select>
					<!-- <em>Select the bank you purchased the PIN from.</em> -->
				</p>
				
				<p>
					<label for="teller">Teller Number: <span class="requiredField">*</span></label>
					{{ Form::text('teller',Input::old('teller'), array('id'=>'teller','class'=>'inputStyle')) }}
					{{ $errors->first('teller','<em class="emsg">:message</em>') }}
				</p>
			
				{{ Form::submit('Signup',array('class'=>'inputStyleBtn')) }}

				<div class="formExtra">
					<p><strong>Note: </strong> Fields marked with <span class="requiredField">*</span> are required.</p>
				</div>

			</fieldset>
			
			{{ Form::close() }}
			
			<!-- Sidebar -->
			<div id="sidebar">
				<h3>Important Information</h3>
				
				<ul>
					<li>Ensure that you provide a valid Email address and GSM number so as to receive your <strong>Username</strong> and <strong>Password</strong></li>
				</ul>
			</div> <!-- end sidebar -->
		
		</div> <!-- end signUp -->

		</div> <!-- end pageContainer -->

@endsection