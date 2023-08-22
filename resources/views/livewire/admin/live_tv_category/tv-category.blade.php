        
        @if($addcategory)
            @include('livewire.admin.live_tv_category.addcategory')
      @elseif($update_category)
            @include('livewire.admin.live_tv_category.editcategory') 
        @else
            @include('livewire.admin.live_tv_category.allcategory')
        @endif