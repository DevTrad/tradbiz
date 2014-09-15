@extends('layouts.master')

@section('content')
	<header class="main">
		<h1>TradBiz</h1>
		<nav class="main">
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Etc.</a></li>
			</ul>
		</nav>
	</header>

	<header class="feature">
		<h1>Style Proof</h1>
	</header>

	<div id="content">
		<h1>This is a main header</h1>

		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a diam lectus. Sed sit amet ipsum mauris. Maecenas congue ligula ac quam viverra nec consectetur ante hendrerit. Donec et mollis dolor. Praesent et diam eget libero egestas mattis sit amet vitae augue. Nam tincidunt congue enim, ut porta lorem lacinia consectetur. Donec ut libero sed arcu vehicula ultricies a non tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut gravida lorem. Ut turpis felis, pulvinar a semper sed, adipiscing id dolor. Pellentesque auctor nisi id magna consequat sagittis. Curabitur dapibus enim sit amet elit pharetra tincidunt feugiat nisl imperdiet. Ut convallis libero in urna ultrices accumsan. Donec sed odio eros. Donec viverra mi quis quam pulvinar at malesuada arcu rhoncus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In rutrum accumsan ultricies. Mauris vitae nisi at sem facilisis semper ac in est.</p>

		<h2>This is a subheader</h2>

		<p>Vivamus fermentum semper porta. Nunc diam velit, adipiscing ut tristique vitae, sagittis vel odio. Maecenas convallis ullamcorper ultricies. Curabitur ornare, ligula semper consectetur sagittis, nisi diam iaculis velit, id fringilla sem nunc vel mi. Nam dictum, odio nec pretium volutpat, arcu ante placerat erat, non tristique elit urna et turpis. Quisque mi metus, ornare sit amet fermentum et, tincidunt et orci. Fusce eget orci a orci congue vestibulum. Ut dolor diam, elementum et vestibulum eu, porttitor vel elit. Curabitur venenatis pulvinar tellus gravida ornare. Sed et erat faucibus nunc euismod ultricies ut id justo. Nullam cursus suscipit nisi, et ultrices justo sodales nec. Fusce venenatis facilisis lectus ac semper. Aliquam at massa ipsum. Quisque bibendum purus convallis nulla ultrices ultricies. Nullam aliquam, mi eu aliquam tincidunt, purus velit laoreet tortor, viverra pretium nisi quam vitae mi. Fusce vel volutpat elit. Nam sagittis nisi dui.</p>

		<h3>This is a sub-subheader</h3>
		<h4>A submarine?</h4>
		<h5>Deep blue</h5>
		<h6>Last one.</h6>

		<h1>Some Form</h1>
		<form action="" method="get">
			<table>
				<tr>
					<td>{{ Form::label('username', 'Username') }}</td>
					<td>{{ Form::text('username') }}</td>
				</tr>

				<tr>
					<td>{{ Form::label('password', 'Password') }}</td>
					<td>{{ Form::password('password') }}</td>
				</tr>

				<tr>
					<td>{{ Form::label('checkbox', 'Check it!') }}</td>
					<td>{{ Form::checkbox('checkbox') }}</td>
				</tr>
				<tr>
					<td><label>Yes or no?</label></td>
					<td>
						{{ Form::radio('yesorno', 'yes', null, ['id' => 'yes']) }}
						{{ Form::label('yes', 'Yes') }}
						<br>
						{{ Form::radio('yesorno', 'no', null, ['id' => 'no']) }}
						{{ Form::label('no', 'No') }}
					</td>
				</tr>
				<tr>
					<td>{{ Form::label('file', 'Upload a file') }}</td>
					<td>{{ Form::file('file') }}</td>
				</tr>
				<tr>
					<td>{{ Form::label('select', 'Select one') }}</td>
					<td>{{ Form::select('select', ['lt' => 'Latin', 'es' => 'Espanol', 'fr' => 'French']) }}</td>
				</tr>
				<tr>
					<td>{{ Form::label('textarea', 'Write a story!') }}</td>
					<td>{{ Form::textarea('textarea') }}</td>
				</tr>
				<tr>
					<td>{{ Form::submit('Submit form') }}</td>
				</tr>
			</table>
		</form>
	</div>

	<nav class="footer">
		<h2>TradBiz</h2>
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Etc.</a></li>
		</ul>
	</nav>
	<footer class="main">
		Website created by Top Page Design | &copy; TradBiz &mdash; 2014 | Proudly hosted on Openshift
	</footer>
@stop
