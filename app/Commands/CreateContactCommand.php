<?php

namespace App\Commands;

use App\Commands\Command;

class CreateContactCommand extends Command
{
	public $fistname;
	public $lastname;
	public $email;
	public $website;
	public $phone;
    
    /**
     * Create a new command instance.
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
}
