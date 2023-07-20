<?php

namespace App\Http\Livewire\Layout\Superadmin;

use Livewire\Component;

class Navigation extends Component
{
    // public $active = 0;
    public $links = [
        [
            'label' => 'Domain',
            'icon' => 'fas fa-globe',
            // 'url' => 'superadmin.domain.create',
            'sub_links' => [
                [
                    'label' => 'Create',
                    // 'icon' => 'hi',
                    'url' => 'superadmin.domain.create',
                ],
                [
                    'label' => 'List',
                    // 'icon' => 'hi',
                    'url' => 'superadmin.domain.index',
                ]
            ],
        ],
        [
            'label' => 'Admin',
            'icon' => 'fas fa-users',
            // 'url' =>  'superadmin.admin.index',
            'sub_links' => [
                [
                    'label' => 'Create',
                    // 'icon' => 'hi',
                    'url' => 'superadmin.admin.create',
                ],
                [
                    'label' => 'List',
                    // 'icon' => 'hi',
                    'url' => 'superadmin.admin.index',
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
        return view('livewire.layout.superadmin.navigation');
    }
}
