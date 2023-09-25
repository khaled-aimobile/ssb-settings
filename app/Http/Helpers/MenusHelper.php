<?php
namespace App\Http\Helpers;
use App\Models\MainMenu;
use App\Models\UserMenu;
use App\Models\SearchableMenu;
use App\Models\TopMenu;
use App\Http\Helpers\FileUploadHelper;
use App\Http\Resources\MenusResource;
use App\Constants\StringConstants;
use App\Constants\ResponseMessages;

class MenusHelper{

	/*..................create main menus.......................*/
	public static function createMainMenu($request){
		try {
			$menus  = self::commenForUserMainMenu($request,'main');
			$datas  = MainMenu::create($menus);
			return ResponseMessages::SUCCESS_MGS(StringConstants::MAIN_MENU_CREATE,$datas);
		} catch (Exception $e) {
			
		}
	}
	/*..................create user menus.......................*/
	public static function createUserMenu($request){
		try {
			$menus   = self::commenForUserMainMenu($request,'user');
			$datas   = UserMenu::create($menus);
			return ResponseMessages::SUCCESS_MGS(StringConstants::USER_MENU_CREATE,$datas);
		} catch (Exception $e) {
			
		}
	}
	/*..................create searchable menus.......................*/
	public static function createSearchableMenu($request){
		try {
			$menus  = self::commenForOthersMenu($request);
			$datas  = SearchableMenu::create($menus);
			return ResponseMessages::SUCCESS_MGS(StringConstants::SEARCHABLE_MENU_CREATE,$datas);
		} catch (Exception $e) {
			
		}
	}
	/*..................create top menus.......................*/
	public static function createTopMenu($request){
		try {
			$menus  = self::commenForOthersMenu($request);
			$datas  = TopMenu::create($menus);
			return ResponseMessages::SUCCESS_MGS(StringConstants::TOP_MENU_CREATE,$datas);
		} catch (Exception $e) {
			
		}
	}
	
	/*..................commen For User and Main Menu menus.......................*/
	public function commenForUserMainMenu($request,$image_folder){
		if (isset($request->icon)) {
			$menuIcone 	= $request->icon;
		}else{
			$menuIcone 	= '';
		}
		if ($request->is_icon_image == 1) {
			 if ($request->has('icon_image')) {
			 	$image_name = $request->file('icon_image');
			 	$path 		= '/images/menus/'.$image_folder; 
	            $fullPath 	= FileUploadHelper::uploadSingleFile($request, $image_name,$path);
	        }
	        $isIconImage    = 1;
		}else{
			$isIconImage 	= 0;
		}
		$data = [
			'name' 			=> $request->name,
			'menu_id' 		=> $request->menu_id,
			'icon' 			=> $menuIcone,
			'order' 		=> $request->order,
			'is_icon_image' => $isIconImage,
			'icon_image' 	=> isset($fullPath) ? $fullPath : '',
		];
		return $data;
	}
	/*..................commen For othes Menu menus.......................*/
	public function commenForOthersMenu($request){
		$data = [
				'name' 			=> $request->name,
				'menu_id' 	    => $request->menu_id,
				'order' 		=> $request->order,
			];
		return $data;
	}

	/*..................get main menus.......................*/
	public static function getMainMenu($type=''){
		try {
			if ($type   === 'submenus') {
				$menus  = MainMenu::with('sub_menus')->whereNotNull('menu_id')->get();
			}else{
				$menus  = MainMenu::with('sub_menus')->whereNull('menu_id')->get();
			}
			$data  	    = new MenusResource($menus);
			return ResponseMessages::SUCCESS_MGS('Main menus',$data);
		} catch (Exception $e) {
			
		}
	}
	/*..................get user menus.......................*/
	public static function getUserMenu($type=''){
		try {
			if (trim($type)   === 'submenus') {
				$menus  = UserMenu::with('sub_menus')->whereNotNull('menu_id')->get();
			}else{
				$menus  = UserMenu::with('sub_menus')->whereNull('menu_id')->get();
			}
			$data  		= new MenusResource($menus);
			return ResponseMessages::SUCCESS_MGS('User menus',$data);
		} catch (Exception $e) {
			
		}
	}
	/*..................get searchable menus.......................*/
	public static function getSearchableMenu($type=''){
		try {
			if ($type  === 'submenus') {
				$menus = SearchableMenu::with('sub_menus')->whereNotNull('menu_id')->get();
			}else{
				$menus = SearchableMenu::with('sub_menus')->whereNull('menu_id')->get();
			}
			$data  = new MenusResource($menus);
			return ResponseMessages::SUCCESS_MGS('Searchable menus',$data);

		} catch (Exception $e) {
			
		}
	}
	/*..................get top menus.......................*/
	public static function getTopMenu($type=''){
		try {
			if ($type  === 'submenus') {
				$menus = TopMenu::with('sub_menus')->whereNotNull('menu_id')->get();
			}else{
				$menus = TopMenu::with('sub_menus')->whereNull('menu_id')->get();
			}
			$data  = new MenusResource($menus);
			return ResponseMessages::SUCCESS_MGS('Top menus',$data);
		} catch (Exception $e) {
			
		}
	}

	/*..................get single main menus and sub.......................*/
	public static function getSingleMainMenu($id,$type=''){
		try {
			if ($type   === 'submenus') {
				$menus  = MainMenu::with('sub_menus')->where('id',$id)->whereNotNull('menu_id')->first();
			}else{
				$menus  = MainMenu::with('sub_menus')->where('id',$id)->whereNull('menu_id')->first();
			}
			$data  	    = new MenusResource($menus);
			return ResponseMessages::SUCCESS_MGS('Main menus',$data);
		} catch (Exception $e) {
			
		}
	}
	/*..................get single user menus and sub.......................*/
	public static function getSingleUserMenu($id,$type=''){
		try {
			if (trim($type)   === 'submenus') {
				$menus  = UserMenu::with('sub_menus')->where('id',$id)->whereNotNull('menu_id')->first();
			}else{
				$menus  = UserMenu::with('sub_menus')->where('id',$id)->whereNull('menu_id')->first();
			}
			$data  		= new MenusResource($menus);
			return ResponseMessages::SUCCESS_MGS('User menus',$data);
		} catch (Exception $e) {
			
		}
	}
	/*..................get single searchable menus and sub.......................*/
	public static function getSingleSearchableMenu($id,$type=''){
		try {
			if ($type  === 'submenus') {
				$menus = SearchableMenu::with('sub_menus')->where('id',$id)->whereNotNull('menu_id')->first();
			}else{
				$menus = SearchableMenu::with('sub_menus')->where('id',$id)->whereNull('menu_id')->first();
			}
			$data  = new MenusResource($menus);
			return ResponseMessages::SUCCESS_MGS('Searchable menus',$data);

		} catch (Exception $e) {
			
		}
	}
	/*..................get Single single top menusand sub .......................*/
	public static function getSingleTopMenu($id,$type=''){
		try {
			if ($type  === 'submenus') {
				$menus = TopMenu::with('sub_menus')->where('id',$id)->whereNotNull('menu_id')->first();
			}else{
				$menus = TopMenu::with('sub_menus')->where('id',$id)->whereNull('menu_id')->first();
			}
			$data  = new MenusResource($menus);
			return ResponseMessages::SUCCESS_MGS('Top menus',$data);
		} catch (Exception $e) {
			
		}
	}


	/*..................update main menus.......................*/
	public static function updateMainMenu($request,$id){
		try {
			$menus  		 = self::commenForUpdateUserMainMenu($request,$id,'main');
			$datas  		 = MainMenu::where('id',$id)->update($menus);
			$getUpdatedData  = MainMenu::where('id',$id)->first();
			return ResponseMessages::SUCCESS_MGS(StringConstants::MAIN_MENU_UPDATE,$getUpdatedData);
		} catch (Exception $e) {
			
		}
	}
	/*..................update user menus.......................*/
	public static function updateUserMenu($request,$id){
		try {
			$update  = self::commenForUpdateUserMainMenu($request,$id,'user');
			$datas   = UserMenu::where('id',$id)->update($update);
			$getUpdatedData   = UserMenu::where('id',$id)->first();
			return ResponseMessages::SUCCESS_MGS(StringConstants::USER_MENU_UPDATE,$getUpdatedData);
		} catch (Exception $e) {
			
		}
	}
	/*..................update searchable menus.......................*/
	public static function updateSearchableMenu($request,$id){
		try {
			$menus  = self::commenForOthersMenu($request);
			$datas  = SearchableMenu::where('id',$id)->update($menus);
			$getUpdatedData  = SearchableMenu::where('id',$id)->first();
			return ResponseMessages::SUCCESS_MGS(StringConstants::SEARCHABLE_MENU_UPDATE,$getUpdatedData);
		} catch (Exception $e) {
			
		}
	}
	/*..................update top menus.......................*/
	public static function updateTopMenu($request,$id){
		try {
			$menus  = self::commenForOthersMenu($request);
			$datas  = TopMenu::where('id',$id)->update($menus);
			$getUpdatedData  = TopMenu::where('id',$id)->first();
			return ResponseMessages::SUCCESS_MGS(StringConstants::TOP_MENU_UPDATE,$getUpdatedData);
		} catch (Exception $e) {
			
		}
	}
	
	/*..................update menus for other function.......................*/
	public static function commenForUpdateUserMainMenu($request,$id,$image_folder){
			$userMenu   = UserMenu::where('id',$id)->first();
			if (isset($request->icon)) {
				$menuIcone 	= $request->icon;
			}else{
				$menuIcone 	= '';
			}
			if ($request->is_icon_image == 1) {
				 if ($request->has('icon_image')) {
				 	$image_name = $request->file('icon_image');
				 	$path 		= '/images/menus/'.$image_folder; 
		            $fullPath 	= FileUploadHelper::uploadSingleFile($request, $image_name,$path);
		        }else{
		        	$fullPath 	= $userMenu->icon_image;
		        }
		        $isIconImage    = 1;
			}else{
				$isIconImage 	= 0;
			}
			$data = [
				'name' 			=> $request->name,
				'menu_id' 		=> $request->menu_id,
				'icon' 			=> $menuIcone,
				'order' 		=> $request->order,
				'is_icon_image' => $isIconImage,
				'icon_image' 	=> isset($fullPath) ? $fullPath : '',
			];
			return $data;
	}
	

	/*..................delete single main menus and sub.......................*/
	public static function deleteMainMenu($id,$type=''){
		try {
			MainMenu::where('id',$id)->update(['is_deleted'=>1]);
			MainMenu::where('id',$id)->delete();
			MainMenu::where('menu_id',$id)->update(['is_deleted'=>1]);
			MainMenu::where('menu_id',$id)->delete();
			return ResponseMessages::SUCCESS_MGS('Main menus deleted successfully',$data=[]);
		} catch (Exception $e) {
			
		}
	}
	/*..................delete single user menus and sub.......................*/
	public static function deleteUserMenu($id,$type=''){
		try {
			UserMenu::where('id',$id)->update(['is_deleted'=>1]);
			UserMenu::where('id',$id)->delete();
			UserMenu::where('menu_id',$id)->update(['is_deleted'=>1]);
			UserMenu::where('menu_id',$id)->delete();
			return ResponseMessages::SUCCESS_MGS('User menus deleted successfully',$data=[]);
		} catch (Exception $e) {
			
		}
	}
	/*..................delete single searchable menus and sub.......................*/
	public static function deleteSearchableMenu($id,$type=''){
		try {
			SearchableMenu::where('id',$id)->update(['is_deleted'=>1]);
			SearchableMenu::where('id',$id)->delete();
			SearchableMenu::where('menu_id',$id)->update(['is_deleted'=>1]);
			SearchableMenu::where('menu_id',$id)->delete();
			return ResponseMessages::SUCCESS_MGS('Searchable menus deleted successfully',$data=[]);

		} catch (Exception $e) {
			
		}
	}
	/*..................delete single top menusand sub .......................*/
	public static function deleteTopMenu($id,$type=''){
		try {
			TopMenu::where('id',$id)->update(['is_deleted'=>1]);
			TopMenu::where('id',$id)->delete();
			TopMenu::where('menu_id',$id)->update(['is_deleted'=>1]);
			TopMenu::where('menu_id',$id)->delete();
			return ResponseMessages::SUCCESS_MGS('Top menus deleted successfully',$data=[]);
		} catch (Exception $e) {
			
		}
	}
}