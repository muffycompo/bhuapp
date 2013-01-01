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
			<p>Edit Examinations Passed</p>
		</div>
	<!-- Sign Up Tab Content -->
	<div id="signUp-dash" class="clearfix">

		{{ Form::open('users/edit_result','POST',array('class'=>'cleanForm', 'id'=>'signUpForm')) }}
		{{ Form::token() }}
		<fieldset>

			<table class="examinations_passed">
				<span class="emsg">{{ $errors->first('exam_number') }} ,&nbsp; {{ $errors->first('exam_date') }}</span>
				<thead>
					<tr>
						<th>Examination</th>
						<th>Date (Year)</th>
						<th>Examination No.</th>
						<th>Subject</th>
						<th>Grade</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{ Bhu::exam_type_dropdown('exam_type',$edit_data->exam_type_id,array('class'=>'selectInputExam')) }}</td>
						<td>{{ Form::text('exam_date',$edit_data->exam_date,array('maxlength'=>'4','class'=>'smallInput')) }}</td>
						<td>{{ Form::text('exam_number',$edit_data->exam_number,array('class'=>'longInputExamNo')) }}</td>
						<td>{{ Bhu::exam_subject_dropdown('exam_subject',$edit_data->exam_subject_id,array('class'=>'selectInputSubject')) }}</td>
						<td colspan="2">{{ Bhu::exam_grade_dropdown('exam_grade',$edit_data->exam_grade_id,array('class'=>'selectInputGrade')) }}</td>
					</tr>
				</tbody>
				{{ Form::hidden('id',$edit_data->id) }}
				{{ Form::hidden('redirect_id',$redirect_id) }}
			</table>
			<p><input type="submit" value="Save" class="inputStyleBtn" />&nbsp;&nbsp;&nbsp;&nbsp;{{ HTML::link('users/education','CANCEL',array('class'=>'inputStyleBtn')) }}</p>

		</fieldset>
	
	{{ Form::close() }}
	
	<!-- Sidebar -->

</div> <!-- end signUp -->

		</div><!-- end main-dashboard -->

	</div> <!-- end signIn -->

</div> <!-- end pageContainer -->
@endsection