<div class="full_grid">
	<ul id="logout-nav" class="fr">
		<li>Username: <strong>{{ Session::get('credentials')['username'] }}</strong></li>
		<li>Form No: <strong>{{ Session::get('credentials')['formno'] }}</strong></li>
		<li class="print"><a href="#">Print Completed Forms</a></li>
		<li class="logout-exit">{{ HTML::link_to_route('logout','Logout') }}</li>
	</ul><!-- end Logout-Nav -->
</div>