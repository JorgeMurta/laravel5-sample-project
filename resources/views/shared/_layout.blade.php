<!DOCTYPE html>
<html>
<head>
	<title>My Contacts</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('css/material.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/ripples.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/global.css') }}">

	<script src="https://js.pusher.com/2.2/pusher.min.js"></script>
</head>
<body>

<div class="navbar navbar-static-top navbar-default">
<div class="container">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="{{action('ContactsController@getIndex')}}">My Contacts</a>
  </div>
  <div class="navbar-collapse collapse navbar-responsive-collapse">
    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="{{action('ContactsController@getAdd')}}">Add Contact</a></li>
      <li><a href="{{action('StaticController@getAbout')}}">About the Project</a></li>
      <li><a href="https://github.com/JorgeMurta/laravel5-sample-project">Fork Me on GitHub</a></li>
    </ul>
  </div>
  </div>
</div>

<div class="container">
	@yield('content')
</div>

<!-- Scripts -->
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/knockout/3.3.0/knockout-min.js"></script>
@yield('scripts')

</body>
</html>