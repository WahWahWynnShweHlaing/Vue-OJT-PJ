<?php

namespace App\Imports;

use App\Post;
use Maatwebsite\Excel\Concerns\ToModel;

class PostsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Post([
            'title'  => $row['title'],
            'description' => $row['description'],
            'status' => $row['status'],
            'create_user_id'  => $row['create_user_id'],
            'updated_user_id' => $row['updated_user_id'],
            'created_at' => now(),
            'updated_at' => now()),
        ]);
    }
}
