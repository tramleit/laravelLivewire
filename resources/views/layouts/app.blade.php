{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    @include('layouts.partials.header')
    <body>
       
           
            <a href="{{ url('/admin/dashboard') }}">dashboard</a>
            <a href="{{ url('admin/users') }} ">User</a>
            <main>
                {{ $slot }}
            </main>
      

         
    
    @include('layouts.partials.footer')
    @livewireScripts
            
    </body>
</html> --}}


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    @include('layouts.partials.header')

    <body>
       
           
        @include('layouts.partials.topbar')
        @include('layouts.partials.sidebar')

        <div class="content-page">
            <div class="content">
         
                  <!-- Start Content-->
                  <div class="container-fluid">
         
                     <!-- start page title -->
                     <div class="row">
                        <div class="col-12">
                              <div class="page-title-box">
                                 <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                          <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                          <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                          <li class="breadcrumb-item active">Starter</li>
                                    </ol>
                                 </div>
                                 <h4 class="page-title">Starter</h4>
                                 <main>
                                    {{ $slot }}
                                </main>  
                              </div>
                        </div>
                     </div>
                     <!-- end page title -->
                     
                  </div> <!-- container -->
         
            </div> <!-- content -->
           
        </div>    
  
    @include('layouts.partials.footer')
       
    @livewireScripts
           
</body>
</html>

