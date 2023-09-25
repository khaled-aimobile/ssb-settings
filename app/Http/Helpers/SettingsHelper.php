<?php
namespace App\Http\Helpers;
use App\Http\Resources\SettingsResource;
use App\Models\Setting;

class SettingsHelper{

	public static function getSettingsModules(){
		try {
			$setting = Setting::get();
			return new SettingsResource($setting);
		} catch (Exception $e) {
        	Log::info($e);
		}
		
	}
}