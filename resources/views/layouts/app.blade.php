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
     <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-right',
        showConfirmButton: false,
        showCloseButton: true,
        timer: 5000,
        timerProgressBar:true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    window.addEventListener('alert',({detail:{type,message}})=>{
        Toast.fire({
            icon:type,
            title:message
        })
    })

    
</script>
           
</body>
</html>

