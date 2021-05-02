<?php


namespace App\Core\Infraestructure\Services;


use App\Core\Infraestructure\Repositories\RepositoryContract;

abstract class BaseService implements ServiceContract {

    protected $repository;

    /**
     * BaseService constructor.
     * @param \App\Core\Infraestructure\Repositories\RepositoryContract $repository
     */
    public function __construct(RepositoryContract $repository) {
        $this->repository = $repository;
    }

    public function getRepository(): RepositoryContract {
        return $this->repository;
    }
}
