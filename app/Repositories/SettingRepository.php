<?php

namespace App\Repositories;

use App\Interfaces\SettingRepositoryInterface;
use App\Models\Setting;

class SettingRepository implements SettingRepositoryInterface 
{
    public function getAllSettings()
    {
        return Setting::all();
    }

    public function getSettingById($settingId)
    {
        return Setting::findOrFail($settingId);
    }

    public function deleteSetting($settingId)
    {
        return Setting::destroy($settingId);
    }

    public function createSetting(array $settingDetails)
    {
        return Setting::create($settingDetails);
    }

    public function updateSetting($settingId, array $newDetails) 
    {
        return Setting::whereId($settingId)->update($newDetails);
    }

    // public function getFulfilledCategories()
    // {
    //     return Order::where('is_fulfilled', true);
    // }

    public function updateSettingStatus($settingId, array $newDetails)
    {
        return Setting::whereId($settingId)->update($newDetails);
    }

}