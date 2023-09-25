<?php
namespace App\Http\Helpers;
use App\Http\Resources\SettingsResource;
use App\Models\Setting;

class SettingsHelper{

	public static function getSettingsModules(){
		$setting = Setting::get();
		return new SettingsResource($setting);
	}
}