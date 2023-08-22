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

<button  data-turbolinks="false" wire:click="add_tv_live()" class="btn btn-primary">Add TV Chennel</button>

</div>
<h4 class="page-title">Tv Show</h4>


<div class="row">
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
 
            <div class="tab-content">
                <div class="tab-pane show active" id="basic-example-preview">
                    <div class="table-responsive-sm">
                        <table class="table table-centered mb-0">
                            <thead>

                                <tr>

                                  <th>TV Name</th>
                                  <th>TV Logo</th>
                                  <th>Access</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                   

                                </tr>

                            </thead>
                            <tbody>
                                
                              

                                @foreach ($tv_live as $tv)
                                  
                                   
                                       
                                    <tr>
                                      <td class="table-user">
                                         
                                        {{ $tv->channel_name   }}
                                      </td>
                                     
                                      <td>  <img width="50" height="50" src="{{Storage::url($tv->channel_thumb)}}"   class="me-2 rounded-circle" /> </td>
                                       <td>{{ $tv->channel_access   }}</td>
                                      <td>@if($tv->status == '1') Active @else inactive @endif</td>
                                      
                                      
                                       <td class="table-action">
                                        <a  wire:click="updatetv_live({{ $tv->id  }})" class="action-icon">
                                          <i class="mdi mdi-pencil"></i>
                                        </a>
                                        <a   wire:click="deletetv_live({{ $tv->id  }})" class="action-icon"  onclick="return confirm('are you sure To Delete this Live TV!!')">
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
