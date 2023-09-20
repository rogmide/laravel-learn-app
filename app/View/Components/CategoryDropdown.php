<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Category;

class CategoryDropdown extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    // we can use this to pass any data to the component
    public function render(): View|Closure|string
    {


        return view(
            'components.category-dropdown',
            [
                'categories' => Category::all()
            ]
        );
    }
}
