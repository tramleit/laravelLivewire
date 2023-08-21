

  

        @if($adduser)
            @include('livewire.admin.users.adduser')
        @elseif($update)
            @include('livewire.admin.users.edituser')
        @else
            @include('livewire.admin.users.alluser')
        @endif
 
 