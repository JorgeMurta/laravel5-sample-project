<?php

namespace App\Contact\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Repositories\Contact\ContactRepositoryContract as ContactRepository;

class CreateContactJob extends Job implements SelfHandling
{
    public $fistname;
    public $lastname;
    public $email;
    public $website;
    public $phone;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($firstname, $lastname, $email, $website, $phone)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->website = $website;
        $this->phone = $phone;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ContactRepository $repository)
    {
        // Create Contact in the Datastore
        $contact = $repository->createOrUpdate([
            'firstname' => $this->firstname,
            'lastname'  => $this->lastname,
            'email'     => $this->email,
            'website'   => $this->website,
            'phone'     => $this->phone
        ]);

        // Trigger Event to Update All the Clients
        pusher()->trigger('contacts', 'create', json_encode($contact));
    }
}
