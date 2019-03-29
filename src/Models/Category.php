<?php

namespace evidenceekanem\todolist\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function tasks()
    {
        return $this->hasMany('\evidenceekanem\todolist\Models\Task', 'category_id');
    }
}
