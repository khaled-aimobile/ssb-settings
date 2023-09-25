<?php

namespace App\Http\Controllers\Menus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Helpers\MenusHelper;
use App\Http\Requests\MainMenuRequest;
use App\Http\Requests\SearchableAndTopRequest;

class MenusController extends Controller
{
    /*...................creat menus.......................*/
    
    public function createMainMenu(MainMenuRequest $request){
        return MenusHelper::createMainMenu($request);
    }
    public function createUserMenu(MainMenuRequest $request){
        return MenusHelper::createUserMenu($request);
    }
    public function createSearchableMenu(SearchableAndTopRequest $request){
        return MenusHelper::createSearchableMenu($request);
    }
    public function createTopMenu(SearchableAndTopRequest $request){
        return MenusHelper::createTopMenu($request);
    }
  
    /*...................get menus.......................*/
    public function getMainMenu($type=''){
        return MenusHelper::getMainMenu($type);
    }
    public function getUserMenu($type=''){
        return MenusHelper::getUserMenu($type);
    }
    public function getSearchableMenu($type=''){
        return MenusHelper::getSearchableMenu($type);
    }
    public function getTopMenu($type=''){
        return MenusHelper::getTopMenu($type);
    }

    /*...................get single menus and submenus.......................*/
    public function getSingleMainMenu($id,$type=''){
        return MenusHelper::getSingleMainMenu($id,$type);
    }
    public function getSingleUserMenu($id,$type=''){
        return MenusHelper::getSingleUserMenu($id,$type);
    }
    public function getSingleSearchableMenu($id,$type=''){
        return MenusHelper::getSingleSearchableMenu($id,$type);
    }
    public function getSingleTopMenu($id,$type=''){
        return MenusHelper::getSingleTopMenu($id,$type);
    }

    /*...................update menus and submenus.......................*/
    public function updateMainMenu(MainMenuRequest $request,$id){
        return MenusHelper::updateMainMenu($request,$id);
    }
    public function updateUserMenu(MainMenuRequest $request,$id){
        return MenusHelper::updateUserMenu($request,$id);
    }
    public function updateSearchableMenu(SearchableAndTopRequest $request,$id){
        return MenusHelper::updateSearchableMenu($request,$id);
    }
    public function updateTopMenu(SearchableAndTopRequest $request,$id){
        return MenusHelper::updateTopMenu($request,$id);
    }

    /*...................get delete menus and submenus.......................*/
    public function deleteMainMenu($id,$type=''){
        return MenusHelper::deleteMainMenu($id,$type);
    }
    public function deleteUserMenu($id,$type=''){
        return MenusHelper::deleteUserMenu($id,$type);
    }
    public function deleteSearchableMenu($id,$type=''){
        return MenusHelper::deleteSearchableMenu($id,$type);
    }
    public function deleteTopMenu($id,$type=''){
        return MenusHelper::deleteTopMenu($id,$type);
    }
}
