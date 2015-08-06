<?php

namespace App\Commands;

use App\Commands\Command;

class UpdateContactCommand extends Command
{
	public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $website;
    public $phone;

    /**
     * Create a new command instance.
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
}
