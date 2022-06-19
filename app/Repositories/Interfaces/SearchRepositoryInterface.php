<?php
namespace App\Repositories\Interfaces;

use App\Models\User;

interface SearchRepositoryInterface
{
    public function search($search);
    public function orderBy($users, $atrribute, $type);
}