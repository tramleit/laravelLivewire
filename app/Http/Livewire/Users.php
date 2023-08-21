<?php

namespace App\Http\Livewire;
use Auth;
use App\Models\User;
use App\Slider;
use App\Series;
use App\Movies;
use App\HomeSection;
use App\SubscriptionPlan;
use App\Transactions; 
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Str; 
use Session;
use Livewire\WithFileUploads;
use Livewire\Component;

class Users extends Component
{	
	public $users=[];
	public $alluser =false;
	public $adduser =false;
    public $update =false;

	public $name;
	public $email;
	public $password;
    public $phone;
    public $address;
    public $image;
    public $imageup;
    public $expiry_date;
    public $subscription_plan;
    public $status;
     


    public $u_id;

	public $message = '';
    use WithFileUploads;
    public function render()
    {	
    	$this->users = \DB::table('users')->get(); 
    	$this->alluser = true;
        return view('livewire.users.users');
    }

  
    

    public function add_user()
    {	
    	$this->adduser = true;
    	 
    }

      
     public function resetFields(){

        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->phone = '';
        $this->address = '';
        $this->image = '';
        $this->new_img = '';
        $this->expiry_date = '';
        $this->subscription_plan = '';
        $this->status = '';
    }


     protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|',
        'phone' => 'required',
        'address' => 'required',
        //'image' => 'required',
        'expiry_date' => 'required',
        'subscription_plan' => 'required',
        'status' => 'required',
         
    ];

    public function submit_user(){
 
         $validatedData = $this->validate();

        $imageName = $this->image->store('photo','public');
             

            $this->image =  $imageName;

              $data = [

                'name' => $this->name,
                'email' =>$this->email,
                'password' => \Hash::make($this->password),
                'phone' =>$this->phone,
                'address' =>$this->address,
                'image' =>$this->image,
                'expiry_date' =>$this->expiry_date,
                'subscription_plan' =>$this->subscription_plan,
                'status' =>$this->status,

                    ];

                 
         $user = User::insert($data);
         event(new Registered($user));
         $this->resetData();
          

        $this->dispatchBrowserEvent('alert', 
       ['type' => 'success',  'message' => 'This is success notification!']);

            
        $this->resetFields();

        

 
    }


    public function resetData()
    {	
    	$this->reset(['name','email']);

    	$this->message = 'User added successfully!!';
    	 
    }


    public function mount()
    {   
          $this->users = \DB::table('users')->get();
    }

    public function deleteUser($id){

        $data = User::find($id);
        $data->delete();
        $this->mount();
        $this->dispatchBrowserEvent('alert', 
       ['type' => 'success',  'message' => 'Delete user successfully!']);
    }


    public function updateUser($id){

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
          
        $this->update = true;
    }



    public function update_user(){

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

    public function back(){

        $this->users = \DB::table('users')->get(); 
        $this->alluser = true;
        return redirect()->to('admin/users');
    }

    
}
