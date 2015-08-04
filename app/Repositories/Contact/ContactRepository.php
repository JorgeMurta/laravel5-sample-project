<?php

namespace App\Repositories\Contact;

use App\Repositories\Repository;
use App\Models\Contact;

class ContactRepository extends Repository implements ContactRepositoryContract
{
	public function __construct(Contact $model)
	{
		$this->model = $model;
    }
}