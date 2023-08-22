
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

<button  data-turbolinks="false" wire:click="add_category()" class="btn btn-primary">Add Tv Category</button>

</div>
<h4 class="page-title">Tv Categories</h4>


<div class="row">
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">

            {{-- <h4 class="headings">All Users</h4> --}}
            
            <div class="tab-content">
                <div class="tab-pane show active" id="basic-example-preview">
                    <div class="table-responsive-sm">
                        <table class="table table-centered mb-0">
                            <thead>

                                <tr>

                                  <th>Category Name</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                   

                                </tr>

                            </thead>
                            <tbody>
                             
                                @foreach ($category as $cate)
                                       
                                     <tr>
                                      <td class="table-user">
                                       
                                        {{ $cate->category_name   }}
                                      </td>
                                        <td>@if($cate->status == '1') Active @else inactive @endif</td>
                                      
                                       <td class="table-action">
                                        <a  wire:click="updatecategory({{ $cate->id  }})" class="action-icon">
                                          <i class="mdi mdi-pencil"></i>
                                        </a>
                                        <a   wire:click="deleteCategory({{ $cate->id  }})" class="action-icon"  onclick="return confirm('are you sure To Delete this Tv Category!!')">
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
