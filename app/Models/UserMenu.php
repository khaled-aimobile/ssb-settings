<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class UserMenu extends Model
{
    use SoftDeletes;
    protected $table = 'user_menus';
    protected $fillable = ['name','menu_id','icon','order','is_icon_image','icon_image','is_deleted','is_visible','status'];
    public function sub_menus(){
        return $this->hasMany(UserMenu::class,'menu_id')->with('sub_menus');
    }
}
