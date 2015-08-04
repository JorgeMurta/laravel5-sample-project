<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Contact\ContactRepositoryContract as ContactRepository;
use App\Http\Requests\CreateContactRequest;
use App\Http\Requests\EditContactRequest;
use App\Models\Contact;

/**
 * CONTACTS CONTROLLER
 * Controller that is responsible for listing, adding and editing users.
 */
class ContactsController extends Controller
{
	protected $repository;

	public function __construct(ContactRepository $repository)
	{
		$this->repository = $repository;
	}
	/**
	 * Render the List of Contacts in the Database
	 * @return View
	 */
    public function getIndex()
    {
    	$contacts = $this->repository->getAll();
    	$contactsJson = json_encode($contacts);

    	return view('contacts.index', compact('contacts', 'contactsJson'));
    }

    /**
     * Render the Form to Submit a new Contact
     * @return View
     */
    public function getAdd()
    {
    	return view('contacts.add');
    }

    /**
     * Receives a new User, validates it and
     * Adds it to the Database
     * @return Redirect
     */
    public function postCreate(CreateContactRequest $request)
    {
    	// No need to validation (CreateContactRequest handles it before action be executed)

    	$contact = new Contact();

    	$contact->firstname = $request->get('firstname');
    	$contact->lastname = $request->get('lastname');
    	$contact->email = $request->get('email');
    	$contact->phone = $request->get('phone');
    	$contact->website = $request->get('website');

    	$this->repository->createOrUpdate($contact);

    	// Trigger Event to Update All the Clients
    	pusher()->trigger('contacts', 'create', json_encode($contact));

    	return redirect()->action('ContactsController@getIndex');
    }

    public function getEdit($id)
    {
    	$contact = $this->repository->get($id);
    	return view('contacts.edit', compact('contact'));
    }

    public function postUpdate($id, EditContactRequest $request)
    {
    	$contact = $this->repository->get($id);

    	$contact->firstname = $request->get('firstname');
    	$contact->lastname = $request->get('lastname');
    	$contact->email = $request->get('email');
    	$contact->phone = $request->get('phone');
    	$contact->website = $request->get('website');

    	$this->repository->createOrUpdate($contact);

    	return redirect()->action('ContactsController@getIndex');
    }

    public function getDelete($id)
    {
    	$contact = $this->repository->get($id);
    	$this->repository->remove($contact);

    	// Trigger Event to Update All the Clients
    	pusher()->trigger('contacts', 'remove', json_encode($contact));

    	return redirect()->action('ContactsController@getIndex');
    }
}
