
<div class="row">

@if(session()->has('message'))
<div class="alert alert-success">
{{ session()->get('message') }}
</div>
@endif
<style>
.headings {
margin-bottom: 0.5rem;
/* text-transform: uppercase; */
letter-spacing: 0.02em;
font-size: 0.9rem;
margin-top: 0;
}
</style>

<div class="col-12">
<div class="page-title-box">
<div class="page-title-right">

<button wire:click="add_user()" class="btn btn-primary">Add User</button>

</div>
<h4 class="page-title">Users Management</h4>


<div class="row">
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">

            <h4 class="headings">All Users</h4>
            
            <div class="tab-content">
                <div class="tab-pane show active" id="basic-example-preview">
                    <div class="table-responsive-sm">
                        <table class="table table-centered mb-0">
                            <thead>

                                <tr>

                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Phone</th>
                                  <th>Address</th>
                                  <th>Expiry Date</th>
                                  <th>Subscription Plan</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                   

                                </tr>

                            </thead>
                            <tbody>
                             
                                @foreach ($users as $user)
                                       
                                    <tr>
                                      <td class="table-user">
                                         <img src="{{Storage::url($user->image)}}"   class="me-2 rounded-circle" /> 
                                        {{ $user->name   }}
                                      </td>
                                      <td>{{ $user->email   }}</td>
                                      <td>{{ $user->phone   }}</td>
                                      <td>{{ $user->address   }}</td>
                                      <td>{{ $user->expiry_date   }}</td>
                                      <td>{{ $user->subscription_plan   }}</td>
                                      <td>@if($user->status == '1') Active @else inactive @endif</td>
                                      
                                      
                                       <td class="table-action">
                                        <a wire:click="updateUser({{ $user->id  }})" class="action-icon">
                                          <i class="mdi mdi-pencil"></i>
                                        </a>
                                        <a   wire:click="deleteUser({{ $user->id  }})" class="action-icon"  onclick="return confirm('are you sure?')">
                                          <i class="mdi mdi-delete"></i>
                                        </a>
                                      </td> 
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->                     
                </div> <!-- end preview-->
            
               
            </div> <!-- end tab-content-->

        </div> <!-- end card body-->
    </div> <!-- end card -->
</div><!-- end col-->

</div>


</div>
</div>
</div>
