<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Item;

use Livewire\WithFileUploads;

class AdminMenuDessert extends Component
{
    use WithFileUploads;

    public $isOpen = 0;
    public $isOpenDelete = 0;
    public $updatePrice;
    public $updateName;
    public $uploadPhoto;
    public $updateImage;
    public $updateId;
    public $deleteId;

    public function confirmDeleteMeals(Item $item){
        $item->delete();
        session()->flash('message', 'Desserts deleted successfully!');
         
        return $this->redirect('/admin/menu/desserts', navigate: true);
    }

    public function deleteMeals($id){
        $deleteItem = Item::find($id);
        $this->deleteId = $deleteItem->id;

        $this->openModalDelete();
    }

    public function updateItem($id){
        $uploadedPhoto = $this->uploadPhoto;
        $updateImage = $this->updateImage;

        if($uploadedPhoto == null){  
            $update = Item::updateOrCreate(['id'=>$id],[
                'name' => $this->updateName,
                'price' => $this->updatePrice,
                'image' =>$updateImage
            ]);
        
        }else{
            $fileName = $uploadedPhoto->getClientOriginalName();
            $uploadedPhoto->storeAs('public/images', $fileName); 
    
            $update = Item::updateOrCreate(['id'=>$id],[
                'name' => $this->updateName,
                'price' => $this->updatePrice,
                'image' =>$fileName
            ]);
        
        }
       
        session()->flash('message', 'Desserts updated successfully!');
    
        return $this->redirect('/admin/menu/desserts', navigate: true);

    }

    public function closeModalDelete(){
        $this->isOpenDelete = false;
    }

    public function closeModal(){
        $this->isOpen = false;
    }  

    public function openModalDelete(){
        $this->isOpenDelete = true;
    }


    public function openModal(){
        $this->isOpen = true;
    }

    public function editMeals($id){
        $itemEdit = Item::find($id);
        $this->updateId = $id;
        $this->updateName = $itemEdit->name;
        $this->updatePrice = $itemEdit->price; 
        $this->updateImage = $itemEdit->image;
        $this->openModal();
    }



    public function render(){
        $items = Item::orderBy('id', 'desc')
                ->where('category_id', 4)
                ->get();
        return view('livewire.admin-menu-dessert', ['items'=>$items]);
    }
}
