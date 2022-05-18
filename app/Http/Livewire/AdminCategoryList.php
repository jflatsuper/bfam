<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class AdminCategoryList extends Component
{
    protected $listeners = ['refreshCategoryList'  => '$refresh'];

    public function remove($category_id){
        Category::find($category_id)->delete();
        $this->emit('refreshCategoryList');
        return $this->emit('alert', ['type' => 'success', 'message' => 'Category deleted']);
    }

    public function render()
    {
        return view('livewire.admin.components.admin-category-list', [
            'categories'    => Category::all()
        ]);
    }
}
