@layout('layouts.default')

@section('content')

<div id="pageContainer">

    <!-- Tabs -->
    <ul id="tabs" class="clearfix">
        <li class="inactiveTab fl" id="signInTab">
            <a href="{{ URL::base() }}/users/dashboard">
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
            @if(Session::has('message'))
                {{ Session::get('message') }}
            @endif
            @if($errors->has())
                <div class="errorFeedback">
                    {{ $errors->first('upload_passport','<p>:message</p>') }} 
                    {{ $errors->first('upload_docs','<p>:message</p>') }}
                </div>
            @endif

            <div id="downloadable-forms" class="half_grid">
                <h2 class="upload">Upload Passport</h2>

                {{ Form::open_for_files('users/upload','POST', array('class'=>'cleanForm')) }}
                {{ Form::token() }}
                    <ul class="form-sections">
                        <li>{{ Form::file('upload_passport') }}</li>
                        <li>{{ Form::submit('Upload', array('name'=>'submit','class'=>'inputStyleBtnL')) }}</li>
                        {{ Form::hidden('upload_id',1) }}
                    </ul>
                {{ Form::close() }}

                <p><span style="font-style: italic;"><strong>Supported Formats:</strong> jpeg,jpg,png &amp; gif</span></p>
                <div class="passport_img">
                    @if(Bhu::passport() === false)
                        {{ HTML::image('/img/avatar_placeholder.png', 'Passport Photo') }}
                    @else
                        {{ HTML::image(Bhu::passport(), 'Passport Photo') }}
                    @endif
                </div>
                <br />
                <ul>
                    <li class="doc">{{ HTML::link_to_route('forms','Back to Forms') }}</li>
                </ul>
            </div><!-- end downloadable-forms -->

            <div id="settings" class="half_grid">
                <h2 class="upload">Upload Supporting Documents</h2>
                {{ Form::open_for_files('users/upload','POST', array('class'=>'cleanForm')) }}
                {{ Form::token() }}
                    <ul class="form-sections">
                        <li>{{ Form::file('upload_docs') }}</li>
                        <li>{{ Form::submit('Upload', array('name'=>'submit','class'=>'inputStyleBtnL')) }}</li>
                        {{ Form::hidden('upload_id',2) }}
                    </ul>
                {{ Form::close() }}

            </div><!-- end settings -->

        </div><!-- end main-dashboard -->

    </div> <!-- end signIn -->

</div> <!-- end pageContainer -->

@endsection