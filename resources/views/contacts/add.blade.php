@extends('shared._layout')

@section('content')

@include('shared._validationerrors')

<div class="well">
	<div>
		{!! Form::open([ 'method' => 'POST' , 'class' => 'form-horizontal', 'action' => 'ContactsController@postCreate']) !!}
			<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			    	<h2>Add a new Contact</h2>
			    </div>
			</div>
			<div class="form-group">
				<div class="col-sm-2 control-label">
					{!! Form::label('firstname', 'First Name') !!}
					<span class="label-required">*</span>
				</div> 
			    <div class="col-sm-10">
			    	{!! Form::text('firstname', null, ['class' => 'form-control']) !!}
			    </div>
			</div>
			<div class="form-group">
				<div class="col-sm-2 control-label">
					{!! Form::label('lastname', 'Last Name') !!}
					<span class="label-required">*</span>
				</div>
			    <div class="col-sm-10">
			    	{!! Form::text('lastname', null, ['class' => 'form-control']) !!}
			    </div>
			</div>
			<div class="form-group">
				{!! Form::label('email', 'Email', ['class' => 'col-sm-2 control-label']) !!}
			    <div class="col-sm-10">
			    	{!! Form::email('email', null, ['class' => 'form-control']) !!}
			    </div>
			</div>
			<div class="form-group">
				{!! Form::label('phone', 'Phone', ['class' => 'col-sm-2 control-label']) !!}
			    <div class="col-sm-10">
			    	{!! Form::text('phone', null, ['class' => 'form-control']) !!}
			    </div>
			</div>
			<div class="form-group">
				{!! Form::label('website', 'Website', ['class' => 'col-sm-2 control-label']) !!}
			    <div class="col-sm-10">
			    	{!! Form::text('website', null, ['class' => 'form-control']) !!}
			    </div>
			</div>
			<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      	<button type="submit" class="btn btn-primary">Add Contact</button>
			      	<a href="{{ action('ContactsController@getIndex') }}" class="btn btn-link">Cancel</a>
			    </div>
			</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection