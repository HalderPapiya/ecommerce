<?php

namespace App\Interfaces;

interface SettingRepositoryInterface 
{
    public function getAllSettings();
    public function getSettingById($settingId);
    public function deleteSetting($settingId);
    public function createSetting(array $settingIdDetails);
    public function updateSetting($settingId, array $newDetails);
    public function updateSettingStatus($settingId, array $newDetails);
    
    // public function getFulfilledCategories();
}