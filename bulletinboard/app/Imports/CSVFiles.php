<?php

namespace App\Imports;

use Auth;
use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToModel;


class CSVFiles implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Post([
            'title' => @$row[0],
            'description' => @$row[1],
            'create_user_id' => Auth::user()->id,
            'updated_user_id' => Auth::user()->id
        ]);
    }
}
