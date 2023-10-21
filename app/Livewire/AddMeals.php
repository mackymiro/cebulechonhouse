<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Item;

use Livewire\WithFileUploads;

class AddMeals extends Component
{
    use WithFileUploads;

    public $categories;
    public $nameOfFood;
    public $foodDescription;
    public $price;
  
    #[Rule('image|max:1024|jpg')] // 1MB Max
    public $uploadPhoto;

    protected $rules = [
        'nameOfFood'=>'required',
        'price'=>'required|numeric|min:0',
        'uploadPhoto'=>'required',
    ];

    public function addMeals(){
       $this->validate();
       $uploadedPhoto = $this->uploadPhoto;
       $fileName = $uploadedPhoto->getClientOriginalName();
       $uploadedPhoto->storeAs('public/images', $fileName); 


        Item::create([
            'category_id' => $this->categories,
            'name'=>$this->nameOfFood,
            'price'=>$this->price,
            'image'=>$fileName,
        ]);      

        $this->categories = '';
        $this->nameOfFood = '';
        $this->price = '';

        // Reset uploadPhoto property
        $this->uploadPhoto = null;

        // Optionally, you can set a success message
        session()->flash('message', 'Meals added successfully!');


    }

    public function mount(){
        $this->categories = 1;
    }

    public function render(){
        $allCategories = Category::all(); //Get all categories

        return view('livewire.add-meals', ['allCategories' => $allCategories]);
    }
}
