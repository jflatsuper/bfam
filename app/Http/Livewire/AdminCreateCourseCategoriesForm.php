<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminCreateCourseCategoriesForm extends Component
{
    public $name;

    public function addCategory(){
        $this->validate([
            'name'   =>  'required|string|max:255'
        ]);

        // Check if category exist in company's record
        if (Category::where('name', $this->name)->first()){
            return $this->emit('alert', ['type' => 'error', 'message' => 'Category exist']);
        }

        Category::create([
            'name'          => $this->name
        ]);

        $this->reset();
        $this->emit('refreshCategoryList');
        return $this->emit('alert', ['type' => 'success', 'message' => 'Category created']);
    }

    public function render()
    {
        return view('livewire.admin.components.admin-create-course-categories-form');
    }
}
