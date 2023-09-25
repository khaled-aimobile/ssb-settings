<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainMenu extends Model
{
    use SoftDeletes;
    protected $table = 'main_menus';
    protected $fillable = ['name','menu_id','icon','order','is_icon_image','icon_image','is_deleted','is_visible','status'];

    public function sub_menus(){
        return $this->hasMany(MainMenu::class,'menu_id')->with('sub_menus');
    }
}
