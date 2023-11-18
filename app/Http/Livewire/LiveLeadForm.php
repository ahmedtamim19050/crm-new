<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LiveLeadForm extends Component
{
    public $lead;
    public $generateTitle;
    public $client;
    public $organisation;
    public $person;

    // You can initialize the variables in the mount method
    public function mount($lead = null, $generateTitle = true, $client = null, $organisation = null, $person = null)
    {
        $this->lead = $lead;
        $this->generateTitle = $generateTitle;
        $this->client = $client;
        $this->organisation = $organisation;
        $this->person = $person;
    }

    public function render()
    {
        // You can use the variables in your Blade view
        return view('livewire.live-lead-form', [
            'lead' => $this->lead,
            'generateTitle' => $this->generateTitle,
            'client' => $this->client,
            'organisation' => $this->organisation,
            'person' => $this->person,
        ]);
    }
    
    // public function render()
    // {
    //     return view('livewire.live-lead-form');
    // }
}
