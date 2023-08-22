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
        $this->channel_thumb = '';
        $this->seo_title = '';
        $this->seo_description = '';
        $this->seo_keyword = '';
        $this->status = '';
         
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
        'channel_thumb' => 'required',
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
          $this->users = \DB::table('users')->get();
    }

    public function deletetv_live($id){

        $data = User::find($id);
        $data->delete();
        $this->mount();
        $this->dispatchBrowserEvent('alert', 
       ['type' => 'success',  'message' => 'Delete user successfully!']);
    }


    public function updatetv_live($id){

        $user = User::find($id);
        
        $this->u_id = $user->id;
     
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->phone = $user->phone;
        $this->address = $user->address;
        $this->image = $user->image;
        $this->expiry_date = $user->expiry_date;
        $this->subscription_plan = $user->subscription_plan;
        $this->status = $user->status;
          
        $this->update_tvLive = true;
    }



    public function update_tv_live(){

         $validatedData = $this->validate();

          
        $user = User::find($this->u_id);
 

        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = \Hash::make($this->password);
        $user->phone = $this->phone;
        $user->address = $this->address;
         if ($this->imageup){
               
               $imageName = $this->imageup->store('photo','public');
                $user->image =$imageName;
          }
       
        $user->expiry_date = $this->expiry_date;
        $user->subscription_plan = $this->subscription_plan;
        $user->status = $this->status;
        $user->save();
           
           
        $this->resetData();       
        $this->resetFields();
 
        return redirect('/admin/users')->with('message', 'User Update successfully');
  
    }

   
}
