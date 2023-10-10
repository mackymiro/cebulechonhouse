<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class AddCategories extends Component
{
    public $categories = [];
    public $categoryName = '';

    protected $rules = [
        'categoryName' => 'required|unique:categories,name|max:255'
    ];

   
    public function removeCategories($index){
        //delete the category
        $id = $index;
        $deleteCategories = Category::find($id);
        $deleteCategories->delete();

        unset($this->categories[$index]);
    }
  
    public function saveCategory(){
        $this->validate();
           
        Category::create([
            'name' => $this->categories[] = $this->categoryName
        ]);

        //reset the input field after submission
        $this->categoryName = '';

    }

    public function render(){
        $allCategories = Category::all(); //Get all categories
        
        return view('livewire.add-categories', ['allCategories' => $allCategories]);
    }
}
