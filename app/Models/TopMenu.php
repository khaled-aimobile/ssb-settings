<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TopMenu extends Model
{
   use SoftDeletes;
   protected $table = 'top_menus';
   protected $fillable = ['name','menu_id','order','is_deleted','is_visible','status'];
   public function sub_menus(){
        return $this->hasMany(TopMenu::class,'menu_id')->with('sub_menus');
    }
}
