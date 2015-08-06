<?php

namespace App\Handlers\Commands;

use App\Commands\CreateContactCommand;
use Illuminate\Queue\InteractsWithQueue;
use App\Repositories\Contact\ContactRepositoryContract as ContactRepository;

class CreateContactCommandHandler
{
    private $repository;

    /**
     * Create the command handler.
     *
     * @return void
     */
    public function __construct(ContactRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the command.
     *
     * @param  CreateContactCommand  $command
     * @return void
     */
    public function handle(CreateContactCommand $command)
    {
        // Create Contact in the Datastore
        $contact = $this->repository->createOrUpdate([
            'firstname' => $command->firstname,
            'lastname'  => $command->lastname,
            'email'     => $command->email,
            'website'   => $command->website,
            'phone'     => $command->phone
        ]);

        // Trigger Event to Update All the Clients
        pusher()->trigger('contacts', 'create', json_encode($contact));
    }
}
