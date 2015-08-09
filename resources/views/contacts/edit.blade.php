@extends('shared._layout')

@section('content')

@include('shared._validationerrors')

<div class="well">
	<div>
		<form method="POST" action="{{ action('ContactsController@postUpdate', ['id' => $contact->id]) }}" class="form-horizontal">

			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			    	<h2>Edit a Contact</h2>
			    </div>
			</div>
			<div class="form-group">
			    <label for="firstname" class="col-sm-2 control-label">First Name</label>
			    <div class="col-sm-10">
			      	<input type="text" name="firstname" value="{{ $contact->firstname }}" class="form-control" id="firstname">
			    </div>
			</div>
			<div class="form-group">
			    <label for="lastname" class="col-sm-2 control-label">Last Name</label>
			    <div class="col-sm-10">
			      	<input type="emtextail" name="lastname" value="{{ $contact->lastname }}" class="form-control" id="lastname">
			    </div>
			</div>
			<div class="form-group">
			    <label for="email" class="col-sm-2 control-label">Email</label>
			    <div class="col-sm-10">
			      	<input type="email" name="email" value="{{ $contact->email }}" class="form-control" id="email">
			    </div>
			</div>
			<div class="form-group">
			    <label for="phone" class="col-sm-2 control-label">Phone</label>
			    <div class="col-sm-10">
			      	<input type="text" name="phone" value="{{ $contact->phone }}" class="form-control" id="phone">
			    </div>
			</div>
			<div class="form-group">
			    <label for="website" class="col-sm-2 control-label">Website</label>
			    <div class="col-sm-10">
			      	<input type="text" name="website" value="{{ $contact->website }}" class="form-control" id="website">
			    </div>
			</div>
			<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      	<button type="submit" class="btn btn-primary">Save Contact</button>
			      	<a href="{{ action('ContactsController@getIndex') }}" class="btn btn-link">Cancel</a>
			    </div>
			</div>
		</form>
	</div>
</div>
@endsection