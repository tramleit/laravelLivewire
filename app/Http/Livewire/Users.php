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
    public $u_id;

	public $message = '';

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
    }


     protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function submit_user(){

         $validatedData = $this->validate();

            $data = [

                'name' => $this->name,
                'email' =>$this->email,
                'password' => \Hash::make($this->password)

                    ];

        if ($data['name'] ) {
                
         }
                 
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
        $this->update = true;
    }



    public function update_user(){

         $validatedData = $this->validate();

            $data = [

                'name' => $this->name,
                'email' =>$this->email,
                'password' => \Hash::make($this->password)

                    ];

        if ($data['name'] ) {
                
         }
                 
         $user = User::where('id',$this->u_id)->update($data);
        
         $this->resetData();       
        $this->resetFields();
 
        return redirect('/admin/users')->with('message', 'User Update successfully');
  
    }

    
}
