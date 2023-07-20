<?php

namespace App\Http\Livewire\Layout\Admin;

use Livewire\Component;

class Navigation extends Component
{
    // public $active = 0;
    public $links = [

        [
            'label' => 'User',
            'icon' => 'fas fa-users',
            // 'url' =>  'superadmin.admin.index',
            'sub_links' => [
                [
                    'label' => 'Create',
                    // 'icon' => 'hi',
                    'url' => 'admin.user.create',
                ],
                [
                    'label' => 'List',
                    // 'icon' => 'hi',
                    'url' => 'admin.user.index',
                ]
            ],
        ],

    ];

    // public function toggleActive($link_id)
    // {
    //     $this->active = $link_id;
    // }

    public function render()
    {
        return view('livewire.layout.admin.navigation');
    }
}
