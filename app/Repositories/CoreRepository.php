<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;

/**
 * Class CoreRepository
 *
 * @package App\Repositories
 *
 */

abstract class CoreRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * CoreRepository constructor
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    abstract protected function getModelClass();

    protected function startConditions()
    {
        return clone $this->model;
    }
}
