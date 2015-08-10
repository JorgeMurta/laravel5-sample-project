<?php

namespace App\Contact\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Repositories\Contact\ContactRepositoryContract as ContactRepository;

class DeleteContactJob extends Job implements SelfHandling
{
    public $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ContactRepository $repository)
    {
        $contact = $repository->get($this->id);
        $repository->remove($contact);

        // Trigger Event to Update All the Clients
        pusher()->trigger('contacts', 'remove', json_encode($contact));
    }
}
