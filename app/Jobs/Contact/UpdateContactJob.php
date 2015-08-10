<?php

namespace App\Contact\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Repositories\Contact\ContactRepositoryContract as ContactRepository;

class UpdateContactJob extends Job implements SelfHandling
{
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $website;
    public $phone;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id, $firstname, $lastname, $email, $website, $phone)
    {
        $this->id = $id;
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
        // Update Contact in the DataStore
        $contact = $repository->createOrUpdate([
            'firstname' => $this->firstname,
            'lastname'  => $this->lastname,
            'email'     => $this->email,
            'phone'     => $this->phone,
            'website'   => $this->website
        ], $this->id);
    }
}
