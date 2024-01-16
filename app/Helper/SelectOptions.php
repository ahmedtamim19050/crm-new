<?php

namespace App\Helper;

use App\Models\Label;
use App\Models\User;
use Carbon\Carbon;
use Rinvex\Country\CountryLoader;
use Rinvex\Country\CurrencyLoader;
use VentureDrake\LaravelCrm\Models\Timezone;

class SelectOptions
{
    public static function currencies()
    {
        // Your logic to retrieve currencies goes here
        return  ['USD' => 'USD', 'EUR' => 'EUR', 'GBP' => 'GBP'];
    }
    public static function labels($null = true)
    {
        // Your logic to retrieve currencies goes here
        // return ['hot'=>'Hot', 'cold'=>'Cold', 'warm'=>'Warm'];
        $labels = Label::all();
        foreach ($labels as $item) {
            $array[$item->id] = $item->name;
        }

        return $array;
    }
    // public static function users($null = true)
    // {
    //     // Your logic to retrieve currencies goes here
    //     $array = [];

    //     if ($null) {
    //         $array[''] = '';
    //     }

    //     $users = [];

    //     if (config('laravel-crm.teams')) {
    //         if (auth()->user()->currentTeam) {
    //             $users = auth()->user()->currentTeam->allUsers();
    //         }
    //     } else {
    //         $users = User::all();
    //     }

    //     foreach ($users as $item) {
    //         $array[$item->id] = $item->name;
    //     }

    //     return $array;
    // }
    // public static function phoneTypes($null = true)
    // {
    //     $array = [];

    //     if ($null) {
    //         $array[''] = '';
    //     }

    //     $array = array_merge($array, [
    //         'work' => 'Work',
    //         'home' => 'Home',
    //         'mobile' => 'Mobile',
    //         'fax' => 'Fax',
    //         'other' => "Other",
    //     ]);

    //     return $array;
    // }
    // public static function emailTypes($null = true)
    // {
    //     $array = [];

    //     if ($null) {
    //         $array[''] = '';
    //     }

    //     $array = array_merge($array, [
    //         'work' => 'Work',
    //         'home' => 'Home',
    //         'other' => "Other",
    //     ]);

    //     return $array;
    // }
    // public static function countries($null = true)
    // {
    //     $array = [];

    //     // if ($null) {
    //     //     $array[''] = '';
    //     // }

    //     // API endpoint URL
    //     $apiUrl = 'https://countriesnow.space/api/v0.1/countries';
    //     $apiResponse = file_get_contents($apiUrl);
    //     if ($apiResponse !== false) {
    //         $data = json_decode($apiResponse, true);
    //         if ($data !== null && isset($data['data'])) {
    //             foreach ($data['data'] as $country) {
    //                 // $countryCode = $country['country_code'];
    //                 $countryName = $country['country'];

    //                 // Add country code and name to the array
    //                 $array[$countryName] = $countryName;
    //             }
    //         }
    //     }

    //     return $array;
    // }

}
