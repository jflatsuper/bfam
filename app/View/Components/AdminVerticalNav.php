<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class AdminVerticalNav extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $categories;
    public function __construct()
    {
        $this->categories = Category::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin-vertical-nav', ['categories' => $this->categories]);
    }
}
