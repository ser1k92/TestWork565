<?php
namespace App\Repositories\Interfaces;


interface SearchRepositoryInterface
{
    public function search($search);
    public function orderBy($users, $atrribute, $type);
}