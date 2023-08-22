
<div class="row">
   <div class="col-12">
      <div class="page-title-box">

          <div class="row">
            <div class="col-6">
               <h4 class="page-title">Add Live Tv</h4>
            </div>
            <div class="col-6">
               <div class="page-title-right">
            <a wire:click="back()" style="margin-right: 34px;"  class="btn btn-primary">  Back</a>

         </div>
            </div>
          </div>
        
        
         <div class="container">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-6"><h3 style="font-size: 20px;font-weight: 500;">Live TV Info</h3></div>
                        <div class="col-6"><h3 style="font-size: 20px;font-weight: 500;">Thumb & URL</h3></div>
                     </div>
                     
                     
                  </div>
                  <div class="card-body">
                     
                     <form class="needs-validation" novalidate wire:submit.prevent="submit_tv_live">


                        <div class="row">

                           <div class="col-6">
                              <div class="mb-3">
                           <label class="form-label" for="channel_access">TV Access</label>
 
                            <select class="form-control" name="channel_access" required wire:model="channel_access">
                                 <option value="">Select Status</option>
                                 <option value="Paid">Paid</option>
                                 <option value="Free">Free</option>
                           </select>
                              
                           <div style="color: red;">@error('channel_access') {{ $message }} @enderror</div>
                        </div>  

                        <div class="mb-3">
                           <label class="form-label" for="tv_category">TV Category*</label>
 
                            <select class="form-control" name="tv_category" required wire:model="tv_category">
                              <option value="">Select Status</option>
                              @foreach($all_category as $cate)

                                 <option value="{{ $cate->id  }}">{{ $cate->category_name }}</option>

                              @endforeach
                                  
                           </select>
                              
                           <div style="color: red;">@error('category') {{ $message }} @enderror</div>
                        </div>

                        <div class="mb-3">
                           <label class="form-label" for="channel_name">TV Name*</label>
                           <input type="text" class="form-control" id="channel_name" placeholder="Enter Channel Name" required wire:model="channel_name" autocomplete="off">
                           <div style="color: red;">@error('channel_name') {{ $message }} @enderror</div>
                        </div>


                         <div class="mb-3">
                           <label class="form-label" for="address">Description</label>
                           <textarea rows="8" cols="80" class="form-control" id="description" placeholder="Enter Description"  required wire:model="description"></textarea>
                           <div style="color: red;">@error('description') {{ $message }} @enderror</div>
                        </div>


                         <div class="mb-3">
                           <label class="form-label" for="status">Status</label>
 
                            <select class="form-control" name="status" required wire:model="status">
                                 <option value="">Select Status</option>
                                 <option value="1">Active</option>
                                 <option value="0">Inactive</option>
                           </select>
                              
                           <div style="color: red;">@error('status') {{ $message }} @enderror</div>
                        </div> 


                         </div>

                           <div class="col-6">


                              <div class="mb-3">
                           <label class="form-label" for="channel_url_type">Stream Type</label>
  
                              <select class="form-control" name="channel_url_type" id="channel_url_type" wire:model="channel_url_type">
                                 <option value="">Stream Type</option>
                                 <option value="hls">HLS/M3U8/HTTP</option>
                                 <option value="dash">MPEG-DASH</option>
                                 <option value="embed">Embed Code</option>
                                 <option value="youtube">Youtube</option>
                              </select>

                              
                           <div style="color: red;">@error('channel_url_type') {{ $message }} @enderror</div>
                        </div>  
 

                        <div class="mb-3">
                           <label class="form-label" for="channel_url_1">Server 1 URL*</label>
                           <input type="text" class="form-control" id="channel_url_1" placeholder="Enter Channel Url" name="channel_url_1" required wire:model="channel_url_1" autocomplete="off">
                           <div style="color: red;">@error('channel_url_1') {{ $message }} @enderror</div>
                        </div>


                         <div class="mb-3">
                           <label class="form-label" for="channel_url_2">Server 2 URL*</label>
                           <input type="text" class="form-control" id="channel_url_2" placeholder="Enter Channel Url" name="channel_url_2" required wire:model="channel_url_2" autocomplete="off">
                           <div style="color: red;">@error('channel_url_2') {{ $message }} @enderror</div>
                        </div>


                         <div class="mb-3">
                           <label class="form-label" for="channel_url_3">Server 3 URL*</label>
                           <input type="text" class="form-control" id="channel_url_3" placeholder="Enter Channel Url" name="channel_url_3" required wire:model="channel_url_3" autocomplete="off">
                           <div style="color: red;">@error('channel_url_3') {{ $message }} @enderror</div>

                           <p class="mt-2">Supported M3U8 URL</p>
                        </div>



                         <div class="mb-3">
                            <label class="form-label" for="channel_thumb">TV Logo* <small>(Recommended resolution : 650x350)</small></label>
                           <input type="file" class="form-control" id="channel_thumb"   name="channel_thumb" required wire:model="channel_thumb" autocomplete="off" style="border: 1px solid #ccc;  display: inline-block; padding: 6px 12px; cursor: pointer;">
                           <div style="color: red;">@error('channel_thumb') {{ $message }} @enderror</div>
 
                        </div>


                        <div class="row mt-2 mb-2">

                        <div class="col-12 mt-2 mb-2" style="font-size: 20px;font-weight: 500;"><h3>SEO Settings</h3></div>
                      
                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="seo_title">SEO Title</label>
                           <input type="text" class="form-control" id="seo_title"   name="seo_title" required wire:model="seo_title" autocomplete="off">
                           <div style="color: red;">@error('seo_title') {{ $message }} @enderror</div>
 
                        </div>
 
                          <div class="mb-3">
                           <label class="form-label" for="seo_description">Meta Description</label>
                           <textarea rows="4" cols="40" class="form-control" id="seo_description"    required wire:model="seo_description"></textarea>
                           <div style="color: red;">@error('seo_description') {{ $message }} @enderror</div>
                        </div>


                          <div class="mb-3">
                           <label class="form-label" for="seo_keyword">Keyword</label>
                           <textarea rows="4" cols="40" class="form-control" id="seo_keyword"  required wire:model="seo_keyword"></textarea>
                           <small>use comma(,) to separate keyword.</small>
                           <div style="color: red;">@error('seo_keyword') {{ $message }} @enderror</div>
                        </div>

                     
                         






 
                           </div>

                        </div>

                        

                           
                        <button class="btn btn-primary d" type="submit">Submit</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>