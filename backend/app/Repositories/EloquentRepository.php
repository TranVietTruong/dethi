<?php

namespace App\Repositories;

abstract class EloquentRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        $result = $this->model->find($id);
        if ($result) {
            $this->model = $result;
        }
        return $result;
    }

    public function findOrFail($id)
    {
        $result = $this->model->findOrFail($id);
        if ($result) {
            $this->model = $result;
        }
        return $result;
    }

    public function save(array $attributes = [])
    {
        $this->model->fill($attributes);
        if ($this->model->save()) {
            return $this->model;
        }
        return false;
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function createMany(array $arrayAttributes)
    {
        return $this->model->insert($arrayAttributes);
    }

    public function update($model, array $attributes)
    {
        $result = $this->cast($model);
        if ($result) {
            $result->update($attributes);
            return $result;
        }
        return false;
    }

    public function delete($model)
    {
        $result = $this->cast($model);
        if ($result) {
            $result->delete();
            return true;
        }
        return false;
    }

    public function make(array $with = [])
    {
        return $this->model->with($with);
    }

    public function has($relation, array $with = [])
    {
        $entity = $this->make($with);
        return $entity->has($relation)->get();
    }

    public function getFirstBy($key, $value, array $with = [])
    {
        return $this->make($with)->where($key, '=', $value)->first();
    }

    public function getManyBy($key, $value, array $with = [])
    {
        return $this->make($with)->where($key, '=', $value)->get();
    }

    public function getManyInArray($key, $array, array $with = [])
    {
        return $this->make($with)->whereIn($key, $array)->get();
    }

    public function originalModel()
    {
        return new $this->model;
    }

    protected function cast($model)
    {
        if ($model instanceof Model) {
            return $model;
        } elseif ($this->model->id == $model) {
            return $this->model;
        } else {
            return $this->find($model);
        }
    }
}