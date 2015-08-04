@extends('shared._layout')

@section('content')
<div class="well">
	<div>
		<form method="POST" action="{{ action('ContactsController@postCreate') }}" class="form-horizontal">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			    	<h2>Add a new Contact</h2>
			    </div>
			</div>
			<div class="form-group">
			    <label for="firstname" class="col-sm-2 control-label">First Name</label>
			    <div class="col-sm-10">
			      	<input type="text" class="form-control" name="firstname" id="firstname">
			    </div>
			</div>
			<div class="form-group">
			    <label for="lastname" class="col-sm-2 control-label">Last Name</label>
			    <div class="col-sm-10">
			      	<input type="emtextail" class="form-control" name="lastname" id="lastname">
			    </div>
			</div>
			<div class="form-group">
			    <label for="email" class="col-sm-2 control-label">Email</label>
			    <div class="col-sm-10">
			      	<input type="email" class="form-control" name="email" id="email">
			    </div>
			</div>
			<div class="form-group">
			    <label for="phone" class="col-sm-2 control-label">Phone</label>
			    <div class="col-sm-10">
			      	<input type="text" class="form-control" name="phone" id="phone">
			    </div>
			</div>
			<div class="form-group">
			    <label for="website" class="col-sm-2 control-label">Website</label>
			    <div class="col-sm-10">
			      	<input type="text" class="form-control" name="website" id="website">
			    </div>
			</div>
			<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      	<button type="submit" class="btn btn-primary">Add Contact</button>
			      	<a href="{{ action('ContactsController@getIndex') }}" class="btn btn-link">Cancel</a>
			    </div>
			</div>
		</form>
	</div>
</div>
@endsection