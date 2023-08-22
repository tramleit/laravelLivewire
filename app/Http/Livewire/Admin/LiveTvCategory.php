<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\LiveTVCategoryModal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Str; 
use Session;
use Livewire\WithFileUploads;
use Auth;


class LiveTvCategory extends Component
{
     use WithFileUploads;
     public $category=[];
    public $allcategory =false;
    public $addcategory =false;
    public $update_category =false;

    public $name;
    public $status;
    public $u_id;
    public $message = '';
   


    public function render()
    {   
        $this->category =  LiveTVCategoryModal::all(); 
        $this->allcategory = true;
        return view('livewire.admin.live_tv_category.tv-category');
    }

 
     public function add_category()
    {   
        
        $this->addcategory = true;
         
    }


      public function resetFields(){

        $this->name = '';
        $this->status = '';
      
    }


     protected $rules = [
        'name' => 'required',
        'status' => 'required|',
       
         
    ];

    public function submit_category(){
 
         $validatedData = $this->validate();
 

              $data = [

                'category_name' => $this->name,
                'category_slug' => $this->name,
                'status' =>$this->status,

                    ];

                 
         $category = LiveTVCategoryModal::insert($data);
          
         $this->resetData();
          
          return redirect('/admin/tv_category')->with('message', 'Category Update successfully');

       //  $this->dispatchBrowserEvent('alert', 
       // ['type' => 'success',  'message' => 'This is success notification!']);

            
        $this->resetFields();

         
    }


    public function resetData()
    {   
        $this->reset(['name','status']);

        $this->message = 'User added successfully!!';
         
    }


    public function mount()
    {   
          $this->users = \DB::table('users')->get();
    }

    public function deleteCategory($id){

        $data = LiveTVCategoryModal::find($id);
        $data->delete();
        $this->mount();
        $this->dispatchBrowserEvent('alert', 
       ['type' => 'success',  'message' => 'Delete Tv Category successfully!']);
    }


    public function updatecategory($id){

        $cate = LiveTVCategoryModal::find($id);
        
        $this->u_id = $cate->id;
     
        $this->name = $cate->category_name;
        $this->status = $cate->status;
          
        $this->update_category = true;
    }



    public function update_category(){

         $validatedData = $this->validate();

          
        $cat = LiveTVCategoryModal::find($this->u_id);
 

        $cat->category_name = $this->name;
        $cat->status = $this->status;
        $cat->save();
            
        $this->resetData();       
        $this->resetFields();

        return redirect('/admin/tv_category')->with('message', 'Category Update successfully');
 
    }

    public function back(){

        $this->users = \DB::table('users')->get(); 
        $this->alluser = true;
        return redirect()->to('admin/tv_category');
    }
}
