<?php
namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Category extends Model
{
    public $timestamps = false;

    /** @return Collection */
    public function children()
    {
        return $this->hasMany('App\Models\Category\Category', 'parent_category_id');
    }

    /** @return Category|null */
    public function parent()
    {
        return $this->belongsTo('App\Models\Category\Category', 'parent_category_id');
    }
}
