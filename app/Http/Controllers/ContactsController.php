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
        $this->dispatchFrom(\App\Commands\CreateContactCommand::class, $request);
    	return redirect()->action('ContactsController@getIndex');
    }

    public function getEdit($id)
    {
    	$contact = $this->repository->get($id);
    	return view('contacts.edit', compact('contact'));
    }

    public function postUpdate($id, EditContactRequest $request)
    {
        $request["id"] = $id;
        $this->dispatchFrom(\App\Commands\UpdateContactCommand::class, $request);
    	return redirect()->action('ContactsController@getIndex');
    }

    public function getDelete($id)
    {
        $this->dispatch(new \App\Commands\DeleteContactCommand($id));
    	return redirect()->action('ContactsController@getIndex');
    }
}
