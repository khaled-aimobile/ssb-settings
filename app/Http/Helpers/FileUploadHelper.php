<?php
namespace App\Http\Helpers;
use App\Models\Menu;
class FileUploadHelper{

	public static function uploadSingleFile($request, $img_name, $path){
          $name = time().'.'.$img_name->getClientOriginalExtension();
	      $destinationPath = storage_path( $path);
	      $img_name->move($destinationPath, $name);
	      return $path.'/'.$name;
	}
}