<?php

namespace App\Repositories;

class Repository implements RepositoryContract
{
    /**
     * @var
     */
    protected $model;

    /**
     * Get All Entities
     * @return array array of entities
     */
    public function getAll()
    {
    	return $this->model->all();
    }

    /**
     * Create or Update a Entity
     * @param  array $modelParams Model Properties
     * @param  int $id Entity Id
     * @return Model
     */
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

    /**
     * Get a single entity
     * @param  int $id Unique Identifier of the Entity
     * @return Model
     */
    public function get($id)
    {
    	return $this->model->findOrFail($id);
    }

    /**
     * Remove a single entity
     * @param  int $entity Entity Id
     */
    public function remove($entity)
    {
    	$entity->delete();
    }


}