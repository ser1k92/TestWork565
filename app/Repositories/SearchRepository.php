<?php
namespace App\Repositories;


use App\Models\User;
use App\Repositories\Interfaces\SearchRepositoryInterface;

class SearchRepository implements SearchRepositoryInterface
{

    public function search($search)
    {
        $builder = User::select('id','name','email', 'created_at');

        if ($search) {
            $builder->withWhereHas('projects', function ($query) use ($search)
            {
                $query->where('name','LIKE', '%'.$search.'%');
            })
            ->orWhere('name','LIKE', '%'.$search.'%')
            ->orWhere('email','LIKE', '%'.$search.'%');     
        }

        return $builder;
    }

    public function orderBy($users, $attribute, $type)
    {
        if ($attribute) {
            $users->orderBy($attribute, $type);
        }
        
        return $users->get();
    }
}