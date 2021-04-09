<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name','slug','parent_id','total','active'];
    public function categoryChild()
    {
        return $this->hasMany(Category::class,'parent_id');
    }
}
