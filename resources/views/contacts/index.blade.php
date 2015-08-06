@extends('shared._layout')

@section('content')
<div class="well">
	<table class="table table-striped">
	<thead>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Email</td>
		<td>Phone</td>
		<td>Website</td>
		<td width="250"></td>
	</thead>
	<tbody data-bind="foreach: items">
		<tr>
			<td data-bind="text: firstname"></td>
			<td data-bind="text: lastname"></td>
			<td data-bind="text: email"></td>
			<td data-bind="text: phone"></td>
			<td data-bind="text: website"></td>
			<td>
				<a class="btn btn-primary" data-bind="click: $parent.editContact" href="#">Edit</a>
				<a class="btn btn-link" data-bind="click: $parent.deleteContact" href="#">Delete</a>
			</td>
		</tr>
	</tbody>
	</table>
</div>
@endsection

@section('scripts')
<script>

	var contactsViewModel = function() {

		// Collection of items to bind.
	    this.items = ko.observableArray({!! $contactsJson !!});

	    // Add a new Item to the Collection
	    this.addItem = function(itemToAdd) {

	    	this.items.push(itemToAdd);

	    }.bind(this);

	    // Edit a current Contact
	    this.editContact = function(item)
	    {
	    	// Redirect User to Edit Contact Screen
	    	document.location.href = '/edit/' + item.id;

	    }.bind(this);

	    // Edit a current Contact
	    this.deleteContact = function(item)
	    {
	    	// Redirect User to Edit Contact Screen
	    	document.location.href = '/delete/' + item.id;

	    }.bind(this);

	    this.removeContact = function(itemToRemove)
	    {

	    	this.items.remove(function(item) { return item.id == itemToRemove.id });

	    }.bind(this);

	};

	// Create an instance of the ViewModel
	var vm = new contactsViewModel();

	// Bind ViewModel to the View
	ko.applyBindings(vm);

	var pusher = new Pusher('d788045a99242420fbee', {
    	encrypted: true
    });

    var channel = pusher.subscribe('contacts');

    channel.bind('create', function(data) {

    	var item = JSON.parse(data);
    	vm.addItem(item);

    });

    channel.bind('remove', function(data) {

    	var item = JSON.parse(data);
    	vm.removeContact(item);

    });
</script>
@endsection