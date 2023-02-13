<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;

class BlogCategoryRepository extends CoreRepository
{
    protected function getModelClass(): string
    {
        return Model::class;
    }
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getForComboBox(): Collection
    {
        return $this->startConditions()->all();
    }
}
