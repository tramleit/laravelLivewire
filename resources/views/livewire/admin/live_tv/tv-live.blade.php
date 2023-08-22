  
        @if($addtv_live)
            @include('livewire.admin.live_tv.add_tv_live')
      @elseif($update_tvLive)
            @include('livewire.admin.live_tv.edit_tv_live') 
        @else
            @include('livewire.admin.live_tv.all_tv_live')
        @endif



