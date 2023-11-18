<?php

namespace App\Helper;

use App\Models\Client;
use App\Models\Organisation;
use App\Models\Person;

class AutoComplete
{
    public static function clients()
    {
        $data = [];

        foreach (Client::all() as $client) {
            $data[$client->name] = $client->id;
        }
    
        return json_encode($data);
    }
    public static function people()
    {
        $data = [];

        foreach (Person::all() as $person) {
            $data[$person->name] = $person->id;
        }
    
        return json_encode($data);
    }

    public static function organisations()
    {
        $data = [];

    foreach (Organisation::all() as $organisation) {
        if ($organisation->xeroContact) {
            $data[$organisation->name . ' (xero contact)'] = $organisation->id;
        } else {
            $data[$organisation->name] = $organisation->id;
        }
    }

    return json_encode($data);
    }
   
}
