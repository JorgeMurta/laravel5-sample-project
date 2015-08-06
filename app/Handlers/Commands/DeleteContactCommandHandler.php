<?php

namespace App\Handlers\Commands;

use App\Commands\DeleteContactCommand;
use Illuminate\Queue\InteractsWithQueue;
use App\Repositories\Contact\ContactRepositoryContract as ContactRepository;

class DeleteContactCommandHandler
{
    public $repository;

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
     * @param  DeleteContactCommand  $command
     * @return void
     */
    public function handle(DeleteContactCommand $command)
    {
        $contact = $this->repository->get($command->id);
        $this->repository->remove($contact);

        // Trigger Event to Update All the Clients
        pusher()->trigger('contacts', 'remove', json_encode($contact));
    }
}
