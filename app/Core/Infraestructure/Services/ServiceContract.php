<?php


namespace App\Core\Infraestructure\Services;


use App\Core\Infraestructure\Repositories\RepositoryContract;

interface ServiceContract {

    public function getRepository(): RepositoryContract;
}
