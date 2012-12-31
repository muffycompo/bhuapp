@layout('layouts.default')

@section('content')

<div id="pageContainer">

	<!-- Tabs -->
	<ul id="tabs" class="clearfix">
		<li class="inactiveTab fl" id="signInTab">
			<a href="/users/dashboard">
				<div class="signInTabContentDash">
					<span>Welcome to your Dashboard</span>
					<h1>{{ Session::get('credentials')['surname'] . ' ' . Session::get('credentials')['firstname'] . ' ' . Session::get('credentials')['othernames'] }}</h1>
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
				<p>A - Personal Information</p>
			</div>

<!-- Sign Up Tab Content -->
<div id="signUp-dash" class="clearfix">

	{{ Form::open('users/biodata','POST',array('class'=>'cleanForm', 'id'=>'signUpForm')) }}
		<fieldset>

			<p>
				<label for="title">Title: <span class="requiredField">*</span></label>
				{{ Bhu::title_dropdown('title', $biodata->title_id, array('id'=>'title','class'=>'inputStyle')) }}
				<!-- <em>Select the bank you purchased the PIN from.</em> -->
			</p>
		
			<p>
				<label for="surname">Surname: <span class="requiredField">*</span></label>
				{{ Form::text('surname',$biodata->surname, array('id'=>'surname','class'=>'inputStyle')) }}
				{{ $errors->first('surname','<em class="emsg">:message</em>') }}
			</p>
		
			<p>
				<label for="first_name">First Name: <span class="requiredField">*</span></label>
				{{ Form::text('first_name',$biodata->firstname, array('id'=>'first_name','class'=>'inputStyle')) }}
				{{ $errors->first('first_name','<em class="emsg">:message</em>') }}
			</p>
		
			<p>
				{{ Form::label('other_name','Other Names:') }}
				{{ Form::text('other_name',$biodata->othernames, array('id'=>'other_name','class'=>'inputStyle')) }}
				{{ $errors->first('other_name','<em class="emsg">:message</em>') }}
			</p>
		
			<p>
				<label for="home_address">Home Address: <span class="requiredField">*</span></label>
				{{ Form::textarea('home_address',$biodata->home_address, array('id'=>'home_address','class'=>'inputStyleTa')) }}
				<em>Must not be P.O.Box address</em>
				{{ $errors->first('home_address','<em class="emsg">:message</em>') }}
			</p>
		
			<p>
				<label for="gsm_no">GSM Number: <span class="requiredField">*</span></label>
				{{ Form::text('gsm_no',$biodata->gsm_no, array('id'=>'gsm_no','class'=>'inputStyle','maxlength'=>'11')) }}
				{{ $errors->first('gsm_no','<em class="emsg">:message</em>') }}
			</p>
		
			<p>
				<label for="email">Email Address: <span class="requiredField">*</span></label>
				{{ Form::text('email',$biodata->email_address, array('id'=>'email','class'=>'inputStyle')) }}
				{{ $errors->first('email','<em class="emsg">:message</em>') }}
			</p>
		
			<p>
				<label>Date of birth: <span class="requiredField">*</span></label>
				@if(! empty($biodata->date_of_birth))
				<?php $dob = explode('-', $biodata->date_of_birth); ?>
				@endif
				  {{ Form::text('day', (isset($dob[2]))? $dob[2] : '', array('id'=>'day','class'=>'inputStyle-dob day','maxlength'=>'2')) }}
				/ {{ Form::text('month', (isset($dob[1]))? $dob[1] : '', array('id'=>'month','class'=>'inputStyle-dob month','maxlength'=>'2')) }}
				/ {{ Form::text('year', (isset($dob[0]))? $dob[0] : '', array('id'=>'year','class'=>'inputStyle-dob year','maxlength'=>'4')) }}
				<em>Use DD / MM / YYYY format. E.g. 26/02/1990</em>
				{{ $errors->first('day','<em class="emsg">:message</em>') }}
				{{ $errors->first('month','<em class="emsg">:message</em>') }}
				{{ $errors->first('year','<em class="emsg">:message</em>') }}
			</p>
		
			<p>
				<label for="sex">Sex/Gender: <span class="requiredField">*</span></label>
				{{ Bhu::gender_dropdown('sex', $biodata->sex_id, array('id'=>'sex','class'=>'inputStyle')) }}
				<!-- <em>Enter your surname name.</em> -->
			</p>
		
			<p>
				<label for="state">State of origin: <span class="requiredField">*</span></label>
				{{ Bhu::state_dropdown('state', $biodata->state_of_origin_id, array('id'=>'state','class'=>'inputStyle')) }}
				<!-- <em>Enter your surname name.</em> -->
			</p>
		
			<p>
				<label for="country">Country: <span class="requiredField">*</span></label>
				{{ Bhu::country_dropdown('country', (!empty($biodata->country_id))? $biodata->country_id : 118, array('id'=>'country','class'=>'inputStyle')) }}
				<!-- <em>Enter your surname name.</em> -->
			</p>
		
			<p>
				<label for="religion">Religion: <span class="requiredField">*</span></label>
				{{ Bhu::religion_dropdown('religion', $biodata->religion_id, array('id'=>'religion','class'=>'inputStyle')) }}
				<!-- <em>Enter your surname name.</em> -->
			</p>
		
			<p>
				{{ Form::label('pastor_name','Pastor Name:') }}
				{{ Form::text('pastor_name',$biodata->pastor_name, array('id'=>'pastor_name','class'=>'inputStyle')) }}
				<em>Required only if Religion chosen is Christian</em>
			</p>
		
			<p>
				{{ Form::label('pastor_address','Pastor Address:') }}
				{{ Form::textarea('pastor_address',$biodata->pastor_address, array('id'=>'pastor_address','class'=>'inputStyleTa')) }}
				<!-- <em>Enter your surname name.</em> -->
			</p>
		
			<p>
				{{ Form::label('pastor_gsm','Pastor Number:') }}
				{{ Form::text('pastor_gsm',$biodata->pastor_gsm_no, array('id'=>'pastor_gsm','class'=>'inputStyle','maxlength'=>'11')) }}
				<!-- <em>Enter your surname name.</em> -->
			</p>
		
			<p>
				{{ Form::label('denomination','Denomination:') }}
				{{ Bhu::denomination_dropdown('denomination', $biodata->denomination_id, array('id'=>'denomination','class'=>'inputStyle')) }}
				<em>Used for statistical purpose only. E.g. ECWA</em>
			</p>
		
			<p>
				<label for="marital_status">Marital Status: <span class="requiredField">*</span></label>
				{{ Bhu::marital_status_dropdown('marital_status', '', array('id'=>'marital_status','class'=>'inputStyle')) }}
				<!-- <em>Enter your surname name.</em> -->
			</p>
		
			<p>
				{{ Form::label('maiden_name','Maiden Name:') }}
				{{ Form::text('maiden_name',$biodata->maiden_name, array('id'=>'maiden_name','class'=>'inputStyle')) }}
				<em>Applicable to married women only.</em>
			</p>
		
			<p>
				{{ Form::label('former_names','Former Names:') }}
				{{ Form::text('former_names',$biodata->former_name, array('id'=>'former_names','class'=>'inputStyle')) }}
				<em>Used for any other change of name.</em>
			</p>

			<p>
				<div class="distanceLeft">
					{{ Form::checkbox('if_suspended',1,($biodata->is_suspended == 1)? true : false,array('class'=>'inputStyleChk','id'=>'if_suspended')) }}
					{{ Form::label('if_suspended','I have been suspended before.') }}
				</div>
			</p>

			<p>
				<div class="distanceLeft">
					{{ Form::checkbox('if_expelled',1,($biodata->is_expelled == 1)? true : false,array('class'=>'inputStyleChk','id'=>'if_expelled')) }}
					{{ Form::label('if_expelled','I have been expelled before.') }}
				</div>
			</p>

			<p>
				<div class="distanceLeft">
					{{ Form::checkbox('if_denied_admission',1,($biodata->is_denied_admission == 1)? true : false,array('class'=>'inputStyleChk','id'=>'if_denied_admission')) }}
					{{ Form::label('if_denied_admission','I have been denied admission before.') }}
				</div>
			</p>
			<p>
				{{ Form::label('reason','Reason:') }}
				{{ Form::textarea('reason',$biodata->reason, array('id'=>'reason','class'=>'inputStyleTa')) }}
				<em>Enter reason why you have been suspended, expelled or denied admission before.</em>
			</p>
			{{ Form::hidden('user_id',$biodata->user_id) }}

			<input type="submit" value="Save" class="inputStyleBtn" />&nbsp;&nbsp;&nbsp;&nbsp;{{ HTML::link('users/forms','Cancel',array('class'=>'inputStyleBtn')) }}

		</fieldset>
	
	{{ Form::close() }}
	
	<!-- Sidebar -->
	<div id="sidebar">
		<h2>IMPORTANT NOTICE</h2>
		<ul>
			<li>Please read carefully before filling this form.</li>
			<li>Fields marked with <span class="requiredField">*</span> are required.</li>
		</ul>
	</div> <!-- end sidebar -->

</div> <!-- end signUp -->

		</div><!-- end main-dashboard -->

	</div> <!-- end signIn -->

</div> <!-- end pageContainer -->

@endsection