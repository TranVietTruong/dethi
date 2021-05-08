<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function getAll();

    public function find($id);

    public function findOrFail($id);

    public function save(array $attributes = []);

    public function create(array $attributes);

    public function createMany(array $arrayAttributes);

    public function update($id, array $attributes);

    public function delete($id);

    public function getModel();

    public function originalModel();

    public function getFirstBy($key, $value, array $with = []);

    public function getManyBy($key, $value, array $with = []);

    public function getManyInArray($key, $array, array $with = []);

    public function make(array $with = []);
}