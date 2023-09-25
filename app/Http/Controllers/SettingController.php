<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helpers\SettingsHelper;

class SettingController extends Controller
{
    public function getSettings(){
        return SettingsHelper::getSettingsModules();
    }
}
