<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Tv_live;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Str; 
use Session;
use Livewire\WithFileUploads;
use App\Models\LiveTVCategoryModal; 
use Auth;


class TvLive extends Component
{   

    public $tv_live=[];
    public $all_category=[];
    public $alltv_live =false;
    public $addtv_live =false;
    public $update_tvLive =false;

    public $channel_access;
    public $tv_category;
    public $channel_name;
    public $description;
    public $channel_url_type;
    public $channel_url_1;
    public $channel_url_2;
    public $channel_url_3;
    public $channel_thumb;
    public $imageup;
    public $seo_title;
    public $seo_description;
    public $seo_keyword;
    public $status;
    public $u_id;
    public $message = '';
    use WithFileUploads;

    public function render()
    {   
        $this->tv_live = Tv_live::all(); 
        $this->alltv_live = true;
        $this->all_category =  LiveTVCategoryModal::all(); 
        return view('livewire.admin.live_tv.tv-live');
    }

    
    public function add_tv_live()
    {   
        $this->addtv_live = true;
         
    }

     public function back(){

        $this->tv_live = Tv_live::all();
        $this->alluser = true;
        return redirect()->to('/admin/live_tv');
    }

      
    public function resetFields(){

        $this->channel_access = '';
        $this->tv_category = '';
        $this->channel_name = '';
        $this->description = '';
        $this->channel_url_type = '';
        $this->channel_url_1 = '';
        $this->channel_url_2 = '';
        $this->channel_url_3 = '';
        $this->seo_title = '';
        $this->seo_description = '';
        $this->seo_keyword = '';
        $this->status = '';
        $this->channel_slug  = '';
        $this->channel_thumb  = '';
         
    }


     protected $rules = [
        'channel_access' => 'required',
        'tv_category' => 'required',
        'channel_name' => 'required',
        'description' => 'required',
        'channel_url_type' => 'required',
        'channel_url_1' => 'required',
        'channel_url_2' => 'required',
        'channel_url_3' => 'required',
        //'channel_thumb' => 'required',
        'seo_title' => 'required',
        'seo_description' => 'required',
        'seo_keyword' => 'required',
        'status' => 'required',
         
    ];

    public function submit_tv_live(){
 
         $validatedData = $this->validate();

        $channel_thumb = $this->channel_thumb->store('liveTv','public');
             

            $this->channel_thumb =  $channel_thumb;

              $data = [

                'channel_access' => $this->channel_access,
                'channel_cat_id' =>$this->tv_category,
                'channel_name' =>$this->channel_name,
                'channel_slug' =>$this->channel_name,
                'channel_description' =>$this->description,
                'channel_thumb' =>$this->channel_thumb,
                'channel_url_type' =>$this->channel_url_type,
                'channel_url' =>$this->channel_url_1,
                'channel_url2' =>$this->channel_url_2,
                'channel_url3' =>$this->channel_url_3,
                'seo_title' =>$this->seo_title,
                'seo_description' =>$this->seo_description,
                'seo_keyword' =>$this->seo_keyword,
                'status' =>$this->status,

                    ];

                 
         $user = Tv_live::insert($data);
      
         $this->resetData();
        
         return redirect('admin/live_tv')->with('message', 'Live Tv Submit successfully');

       //  $this->dispatchBrowserEvent('alert', 
       // ['type' => 'success',  'message' => 'This is success notification!']);

            
        $this->resetFields();

        

 
    }


    public function resetData()
    {   
        $this->reset(['channel_access','tv_category','channel_name','description','channel_url_type','channel_url_1','channel_url_2','channel_url_3','channel_thumb','seo_title','seo_description','seo_keyword','status' ]);

        $this->message = 'User added successfully!!';
         
    }


    public function mount()
    {   
          $this->tv_live = Tv_live::all(); 
    }

    public function deletetv_live($id){

        $data = Tv_live::find($id);
        $data->delete();
        $this->mount();
        $this->dispatchBrowserEvent('alert', 
       ['type' => 'success',  'message' => 'Delete tv live successfully!']);
    }


    public function updatetv_live($id){

            
        $tv_live = tv_live::find($id);
        
        $this->u_id = $tv_live->id;
      
        $this->channel_access = $tv_live->channel_access;
        $this->tv_category = $tv_live->channel_cat_id;
        $this->channel_name = $tv_live->channel_name;
        $this->channel_slug = $tv_live->channel_slug;
        $this->description = $tv_live->channel_description;
        $this->channel_thumb = $tv_live->channel_thumb;
        $this->channel_url_type = $tv_live->channel_url_type;
        $this->channel_url_1 = $tv_live->channel_url;
        $this->channel_url_2 = $tv_live->channel_url2;
        $this->channel_url_3 = $tv_live->channel_url3;
        $this->seo_title = $tv_live->seo_title;
        $this->seo_description = $tv_live->seo_description;
        $this->seo_keyword = $tv_live->seo_keyword;
        $this->status = $tv_live->status;
 
        $this->update_tvLive = true;
         
    }



    public function update_tv_live(){

         $validatedData = $this->validate();

          
        $tv_live = tv_live::find($this->u_id);
   
     
        $tv_live->channel_access = $this->channel_access ;
        $tv_live->channel_cat_id = $this->tv_category;
        $tv_live->channel_name = $this->channel_name;
        $tv_live->channel_slug = $this->channel_slug;
        $tv_live->channel_description = $this->description;
         if ($this->imageup){
               
               $imageName = $this->imageup->store('liveTv','public');

               $tv_live->channel_thumb = $imageName;
              
          }

        
        $tv_live->channel_url_type = $this->channel_url_type;
        $tv_live->channel_url = $this->channel_url_1;
        $tv_live->channel_url2 = $this->channel_url_2;
        $tv_live->channel_url3 = $this->channel_url_3;
        $tv_live->seo_title = $this->seo_title;
        $tv_live->seo_description = $this->seo_description;
        $tv_live->seo_keyword = $this->seo_keyword;
        $tv_live->status = $this->status;
        
        $tv_live->save();
           
           
        $this->resetData();       
        $this->resetFields();
 
        
        return redirect('admin/live_tv')->with('message', 'Live Tv Update successfully');
  
    }

   
}
