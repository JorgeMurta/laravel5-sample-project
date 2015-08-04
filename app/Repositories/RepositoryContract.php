<?php

namespace App\Repositories;

interface RepositoryContract
{
	public function getAll();
	public function get($id);
    public function remove($entity);
}