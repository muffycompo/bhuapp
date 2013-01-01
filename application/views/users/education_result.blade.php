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
			<p>Examinations Passed</p>
		</div>
		@if(Session::has('message'))
			{{ Session::get('message') }}
		@endif
<!-- Sign Up Tab Content -->
<div id="signUp-dash" class="clearfix">

		{{ Form::open('users/add_result','POST',array('class'=>'cleanForm', 'id'=>'signUpForm')) }}
		{{ Form::token() }}
		<fieldset>
			@if(Bhu::check_examination())
			<table class="examinations_passed">
				<span class="emsg">{{ $errors->first('exam_number') }} ,&nbsp; {{ $errors->first('exam_date') }}</span>
				<thead>
					<tr>
						<th>Examination</th>
						<th>Date (Year)</th>
						<th>Examination No.</th>
						<th>Subject</th>
						<th>Grade</th>
						<th><!-- {{ HTML::link('#','Add',array('class'=>'addMore','id'=>'addLinkE','title'=>'Add Result')) }} &nbsp;&nbsp; {{ HTML::link('#','Delete',array('class'=>'deleteMore','id'=>'removeLinkE','title'=>'Delete Result')) }} --></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{ Bhu::exam_type_dropdown('exam_type',Input::old('exam_type'),array('class'=>'selectInputExam')) }}</td>
						<td>{{ Form::text('exam_date',Input::old('exam_date'),array('maxlength'=>'4','class'=>'smallInput')) }}</td>
						<td>{{ Form::text('exam_number',Input::old('exam_number'),array('class'=>'longInputExamNo', 'maxlength'=>'10')) }}</td>
						<td>{{ Bhu::exam_subject_dropdown('exam_subject',Input::old('exam_subject'),array('class'=>'selectInputSubject')) }}</td>
						<td colspan="2">{{ Bhu::exam_grade_dropdown('exam_grade',Input::old('exam_grade'),array('class'=>'selectInputGrade')) }}</td>
					</tr>
				</tbody>
			</table>
			@endif
			@if(!empty($examination_data))
			<table class="examinations_passed">
				<thead>
					<tr>
						<th>Examination</th>
						<th>Date (Year)</th>
						<th>Examination No.</th>
						<th>Subject</th>
						<th>Grade</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($examination_data as $examination)
					<tr>
						<td class="selectInputExam"><span>{{ Expand::exam_type($examination->exam_type_id) }}</span></td>
						<td class="smallInput"><span>{{ $examination->exam_date }}</span></td>
						<td class="longInputExamNo"><span>{{ $examination->exam_number }}</span></td>
						<td class="selectInputSubject"><span>{{ Expand::exam_subject($examination->exam_subject_id) }}</span></td>
						<td class="selectInputGrade"><span>{{ Expand::exam_grade($examination->exam_grade_id) }}</span></td>
						<td class="tb_action">{{ HTML::link('users/edit_result/' . $examination->id . '/2','',array('class'=>'editMoreIcon','title'=>'Edit','alt'=>'Edit')) }} {{ HTML::link('users/delete_result/' . $examination->id . '/2','',array('class'=>'deleteMoreIcon','title'=>'Delete','alt'=>'Delete')) }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@endif
			@if(Bhu::check_examination())
			<p><input type="submit" value="Add" class="inputStyleBtn" />&nbsp;&nbsp;&nbsp;&nbsp;{{ HTML::link('users/education','Finish',array('class'=>'inputStyleBtn')) }}</p>
			@else
			<p>{{ HTML::link('users/education','Finish',array('class'=>'inputStyleBtn')) }}</p>
			@endif
		</fieldset>
	
	{{ Form::close() }}
	
	<!-- Sidebar -->

</div> <!-- end signUp -->

		</div><!-- end main-dashboard -->

	</div> <!-- end signIn -->

</div> <!-- end pageContainer -->
@endsection