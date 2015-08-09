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
 * Contacts Controller
 * Controller that is responsible for listing, adding and editing Contacts.
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
     * Receives a new Contact, validates it and
     * Adds it to the Database
     * @return Redirect
     */
    public function postCreate(CreateContactRequest $request)
    {
        $this->dispatchFrom(\App\Jobs\CreateContactJob::class, $request);
    	return redirect()->action('ContactsController@getIndex');
    }

    /**
     * Renders the View to Edit a Contact
     * @param  int $id Contact ID
     * @return View
     */
    public function getEdit($id)
    {
    	$contact = $this->repository->get($id);
    	return view('contacts.edit', compact('contact'));
    }

    /**
     * Receives the Updated Contact, validates it and
     * Updates it in the Database
     * @param  int $id ContactID
     * @param  EditContactRequest $request Contact Update Request
     * @return View
     */
    public function postUpdate($id, EditContactRequest $request)
    {
        $request["id"] = $id;
        $this->dispatchFrom(\App\Jobs\UpdateContactJob::class, $request);
    	return redirect()->action('ContactsController@getIndex');
    }

    /**
     * Deletes a Contact
     * @param  int $id ContactId
     * @return View
     */
    public function getDelete($id)
    {
        $this->dispatch(new \App\Jobs\DeleteContactJob($id));
    	return redirect()->action('ContactsController@getIndex');
    }
}
