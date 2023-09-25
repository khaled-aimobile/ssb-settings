<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SearchableMenu extends Model
{
    use SoftDeletes;
    protected $table    = 'searchable_menus';
    protected $fillable = ['name','menu_id','order','is_deleted','is_visible','status'];
    public function sub_menus(){
        return $this->hasMany(SearchableMenu::class,'menu_id')->with('sub_menus');
    }
}
