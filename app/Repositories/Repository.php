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

    public function createOrUpdate($modelParams, $id = null)
    {
        if(is_null($id))
        {
            $entity = $this->model->create($modelParams);
        }
        else
        {
            $entity = $this->get($id);
            $entity->fill($modelParams);
        }

        $entity->save();

        return $entity;
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