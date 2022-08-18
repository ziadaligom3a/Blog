<?php

namespace App\View\Components;

use Illuminate\View\Component;
use \App\Models\category;

class CategoryDropdown extends Component
{


    public function render()
    {

        if(last(request()->segments()) != false):
        $current = category::firstWhere('slug',last(request()->segments()));
        endif;
        return view('components.category-dropdown',[

            'categories' => category::all(),
            'currents' => @$current
        ]);

       
    }
}
