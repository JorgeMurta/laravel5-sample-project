<?php

namespace App\Handlers\Commands;

use App\Commands\UpdateContactCommand;
use Illuminate\Queue\InteractsWithQueue;
use App\Repositories\Contact\ContactRepositoryContract as ContactRepository;


class UpdateContactCommandHandler
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
     * @param  UpdateContactCommand  $command
     * @return void
     */
    public function handle(UpdateContactCommand $command)
    {
        // Update Contact in the DataStore
        $contact = $this->repository->createOrUpdate([
            'firstname' => $command->firstname,
            'lastname'  => $command->lastname,
            'email'     => $command->email,
            'phone'     => $command->phone,
            'website'   => $command->website
        ], $command->id);
    }
}
