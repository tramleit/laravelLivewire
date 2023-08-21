
<div class="row">
   <div class="col-12">
      <div class="page-title-box">
         <div class="page-title-right">
            <a  wire:click="back()" class="btn btn-primary" style="margin-right: 32px; "><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M17 11H9.41l3.3-3.29a1 1 0 1 0-1.42-1.42l-5 5a1 1 0 0 0-.21.33a1 1 0 0 0 0 .76a1 1 0 0 0 .21.33l5 5a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.42L9.41 13H17a1 1 0 0 0 0-2Z"/></svg> Back</a>

         </div>
         <h4 class="page-title">Edit Users</h4>
         <div class="container">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-header"></div>
                  <div class="card-body">
                     <form class="needs-validation" novalidate wire:submit.prevent="update_user">
                        <input type="hidden" name="user_id" value="{{ $u_id }}">
                        <div class="mb-3">
                           <label class="form-label" for="name">Name</label>
                           <input type="text" class="form-control" id="name" placeholder="Enter name"  required wire:model="name">
                           <div style="color: red;">@error('name') {{ $message }} @enderror</div>
                        </div>
                        <div class="mb-3">
                           <label class="form-label" for="email">Email</label>
                           <input type="email" class="form-control" id="email" placeholder="Enter email" required wire:model="email" autocomplete="off">
                           <div style="color: red;">@error('email') {{ $message }} @enderror</div>
                        </div>

                        <div class="mb-3">
                           <label class="form-label" for="password">Password</label>
                           <input type="password" class="form-control" id="password" placeholder="Enter password"  required wire:model="password">
                           <div style="color: red;">@error('password') {{ $message }} @enderror</div>
                        </div>




                         <div class="mb-3">
                           <label class="form-label" for="phone">Phone</label>
                           <input type="text" class="form-control" id="phone" placeholder="Enter Phone Number"  required wire:model="phone">
                           <div style="color: red;">@error('phone') {{ $message }} @enderror</div>
                        </div>


                         <div class="mb-3">
                           <label class="form-label" for="address">Address</label>
                           <textarea class="form-control" id="address" placeholder="Enter address"  required wire:model="address"></textarea>
                           <div style="color: red;">@error('address') {{ $message }} @enderror</div>
                        </div>

                         <div class="mb-3">
                           <label class="form-label" for="image">Image</label>
                           <input type="file" class="form-control" id="image"  name="image"  required wire:model="imageup">
                           <div style="color: red;">@error('image') {{ $message }} @enderror</div>
                        </div>

                         <div class="mb-3">
                           <label class="form-label" for="expiry_date">Expiry Date</label>
                           <input type="date" class="form-control" id="expiry_date" name="expiry_date" placeholder="Enter Expiry Date"  required wire:model="expiry_date">
                           <div style="color: red;">@error('expiry_date') {{ $message }} @enderror</div>
                        </div>


                         <div class="mb-3">
                           <label class="form-label" for="subscription_plan">Subscription Plan</label>

                              <select class="form-control" name="subscription_plan" required wire:model="subscription_plan">
                              <option value="">Select Plan</option>
                              <option value="1"  @if($subscription_plan == 1) selected="" @endif>Basic Plan</option>
                              <option value="2"  @if($subscription_plan == 2) selected="" @endif>Premium Plan</option>
                              <option value="3"  @if($subscription_plan == 3) selected="" @endif>Platinum Plan</option>
                              <option value="4"  @if($subscription_plan == 4) selected="" @endif>Free Plan</option>
                              </select>

                              <div style="color: red;">@error('subscription_plan') {{ $message }} @enderror</div>
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
 
                      
                        <button class="btn btn-primary d" type="submit">Update</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>