<?php

namespace App\Repositories;

class Repository implements RepositoryContract
{
    /**
     * @var
     */
    protected $model;


    public function getAll()
    {
    	return $this->model->all();
    }

    public function createOrUpdate($entity, $id = null)
    {
    	$entity->save();
    }

    public function get($id)
    {
    	return $this->model->findOrFail($id);
    }

    public function remove($entity)
    {
    	$entity->delete();
    }


}