<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Setting;

class SettingsTableSeederCustom extends Seeder
{
    /* NU Sunt Sigur De asta daca apare un error poti sa incerci sa il       STERGI */
    /* Nu a dat error , deci e ok deocamdata */
    
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $setting = $this->findSetting('site.stock_threshold');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Stock Threshold',
                'value'        => 5,
                'details'      => '',
                'type'         => 'text',
                'order'        => 6,
                'group'        => 'Site',
            ])->save();
        }
    }

    /**
     * [setting description].
     *
     * @param [type] $key [description]
     *
     * @return [type] [description]
     */
    protected function findSetting($key)
    {
        return Setting::firstOrNew(['key' => $key]);
    }
}
