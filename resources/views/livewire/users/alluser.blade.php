 
<div class="row">

     @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

  <div class="col-12">
    <div class="page-title-box">
      <div class="page-title-right">
         
         <button wire:click="add_user()" class="btn btn-primary">Add User</button>

      </div>
      <h4 class="page-title">Users Management</h4>
      <table class="table table-striped table-centered mb-0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
             
            <th>Action</th>
          </tr>
        </thead>


        <tbody>

          @foreach ($users as $user)
                 
              <tr>
                <td class="table-user">
                 {{--  <img src="assets/images/users/avatar-2.jpg" alt="table-user" class="me-2 rounded-circle" />  --}}
                  {{ $user->name   }}
                </td>
                <td>{{ $user->email   }}</td>
                
                 <td class="table-action">
                  <a wire:click="updateUser({{ $user->id  }})" class="action-icon">
                    <i class="mdi mdi-pencil"></i>
                  </a>
                  <a  wire:click="deleteUser({{ $user->id  }})" class="action-icon">
                    <i class="mdi mdi-delete"></i>
                  </a>
                </td> 
              </tr>

          @endforeach
          
        </tbody>
      </table>
    </div>
  </div>
</div>
 