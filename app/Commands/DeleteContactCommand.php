<?php

namespace App\Commands;

use App\Commands\Command;

class DeleteContactCommand extends Command
{
	public $id;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }
}
