@layout('layouts.default')

@section('content')

<div id="pageContainer">

	<!-- Tabs -->
	<ul id="tabs" class="clearfix">
		<li class="inactiveTab fl" id="signInTab">
			<a href="/users/dashboard">
				<div class="signInTabContentDash">
					<span>Welcome to your Dashboard</span>
					@include('users.partials.user_header') 
				</div>
			</a>
			<span class="activeTabArrow"><!-- --></span>
		</li>
		<li class="activeTab fr" id="signUpTab">
				<div class="signUpTabContentDash">
					<span>Fill the online</span>
					<h1>Registration Forms</h1>
				</div>
			<span class="activeTabArrow"><!-- --></span>
		</li>
	</ul>
	
	<!-- Sign In Tab Content -->
	<div id="dashboard">
	
		<div id="logout" class="inner-container clearfix">

		@include('users.partials.user_metadata')
		                         				
		</div><!-- end logout -->			

		<div id="main-dashboard" class="inner-container clearfix">
			<div class="dash-sep"><!--  --></div>
			<h2><!-- --></h2>
			<div class="formHeading">
				<p>C - Parent / Guardian / Sponsor's Information</p>
			</div>
			@if(Session::has('message'))
				{{ Session::get('message') }}
			@endif

<!-- Sign Up Tab Content -->
<div id="signUp-dash" class="clearfix">
		{{ Form::open('users/parents','POST',array('id'=>'signUpForm','class'=>'cleanForm')) }}
		{{ Form::token() }}
		<fieldset>

			<p>
				<label for="parent_name">Parent Name: <span class="requiredField">*</span></label>
				{{ Form::text('parent_name',(!empty($parent->parent_name))? $parent->parent_name : Input::old('parent_name'), array('class'=>'inputStyle','id'=>'parent_name')) }}
				{{ $errors->first('parent_name','<em class="emsg">:message</em>') }}
			</p>
		
			<p>
				<label for="home_address">Home Address: <span class="requiredField">*</span></label>
				{{ Form::textarea('home_address',(!empty($parent->parent_home_address))? $parent->parent_home_address : Input::old('home_address'), array('class'=>'inputStyleTa','id'=>'home_address')) }}
				{{ $errors->first('home_address','<em class="emsg">:message</em>') }}
			</p>

			<p>
				<label for="office_address">Office Address:</label>
				{{ Form::textarea('office_address',(!empty($parent->parent_office_address))? $parent->parent_office_address : Input::old('office_address'), array('class'=>'inputStyleTa','id'=>'office_address')) }}
				{{ $errors->first('office_address','<em class="emsg">:message</em>') }}
			</p>

			<p>
				<label for="relationship">Relationship: <span class="requiredField">*</span></label>
				{{ Form::text('relationship',(!empty($parent->relationship))? $parent->relationship : Input::old('relationship'), array('class'=>'inputStyle','id'=>'relationship')) }}
				{{ $errors->first('relationship','<em class="emsg">:message</em>') }}
			</p>
			
			<p>
				<label for="gsm_no">GSM Number: <span class="requiredField">*</span></label>
				{{ Form::text('gsm_no',(!empty($parent->parent_gsm_no))? $parent->parent_gsm_no : Input::old('gsm_no'), array('class'=>'inputStyle','id'=>'gsm_no','maxlength'=>'11')) }}
				{{ $errors->first('gsm_no','<em class="emsg">:message</em>') }}
			</p>
		
			<p>
				<label for="email">Email Address:</label>
				{{ Form::text('email',(!empty($parent->parent_email_address))? $parent->parent_email_address : Input::old('email'), array('class'=>'inputStyle','id'=>'email')) }}
				{{ $errors->first('email','<em class="emsg">:message</em>') }}
			</p>
								
			<p>
				<label for="parent_occupation">Occupation: <span class="requiredField">*</span></label>
				{{ Form::text('parent_occupation',(!empty($parent->parent_occupation))? $parent->parent_occupation : Input::old('parent_occupation'), array('class'=>'inputStyle','id'=>'parent_occupation')) }}
				{{ $errors->first('parent_occupation','<em class="emsg">:message</em>') }}
			</p>
		
			<p>
				<div class="distanceLeft">
					{{ Form::checkbox('if_same','', false, array('class'=>'inputStyleChk','id'=>'if_same')) }}
					<!-- <input type="checkbox" id="if_same" name="if_same" class="inputStyleChk" /> -->
					<label for="if_same">Same as above.</label>
				</div>
			</p>

			<p>
				<label for="sponsor_name">Sponsor Name:</label>
				{{ Form::text('sponsor_name',(!empty($parent->sponsor_name))? $parent->sponsor_name : Input::old('sponsor_name'), array('class'=>'inputStyle','id'=>'sponsor_name')) }}
			</p>
		
			<p>
				<label for="sponsor_address">Sponsor Address:</label>
				{{ Form::textarea('sponsor_address',(!empty($parent->sponsor_address))? $parent->sponsor_address : Input::old('sponsor_address'), array('class'=>'inputStyleTa','id'=>'sponsor_address')) }}
			</p>
		
			<p>
				<label for="sponsor_gsm_no">GSM Number:</label>
				{{ Form::text('sponsor_gsm_no',(!empty($parent->sponsor_gsm_no))? $parent->sponsor_gsm_no : Input::old('sponsor_gsm_no'), array('class'=>'inputStyle','id'=>'sponsor_gsm_no','maxlength'=>'11')) }}
			</p>

			<p>
				<label for="sponsor_occupation">Occupation:</label>
				{{ Form::text('sponsor_occupation',(!empty($parent->sponsor_occupation))? $parent->sponsor_occupation : Input::old('sponsor_occupation'), array('class'=>'inputStyle','id'=>'sponsor_occupation')) }}
			</p>
		
			<input type="submit" value="Save" class="inputStyleBtn" />&nbsp;&nbsp;&nbsp;&nbsp;{{ HTML::link('users/forms','Cancel',array('class'=>'inputStyleBtn')) }}

		</fieldset>
	
	{{ Form::close() }}
	
	<!-- Sidebar -->
	<div id="sidebar">
		<h2>IMPORTANT NOTICE</h2>
		<ul>
			<li>Please read carefully before filling this form.</li>
			<li>Fields marked with <span class="requiredField">*</span> are required.</li>
			<li>Only provide one GSM number for parent and sponsor.</li>
			<li>If Parent information is the same with Sponsor, just tick the "<strong>same as above</strong>" checkbox.</li>
		</ul>
	</div> <!-- end sidebar -->

</div> <!-- end signUp -->

		</div><!-- end main-dashboard -->

	</div> <!-- end signIn -->

</div> <!-- end pageContainer -->
@include('users.partials.user_js')
@endsection