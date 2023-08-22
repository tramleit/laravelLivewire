<!-- ========== Left Sidebar Start ========== -->
<style>
    .add{
        display:block;

    }
    .remove{
        display:none;
    }
</style>
<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="index.html" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{ url('assets/images/logo.png') }}" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="{{ url('assets/images/logo-sm.png') }}" alt="small logo">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="index.html" class="logo logo-dark">
        <span class="logo-lg">
            <img src="assets/images/logo-dark.png" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo-dark-sm.png" alt="small logo">
        </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>

    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!-- Leftbar User -->
        <div class="leftbar-user">
            <a href="pages-profile.html">
                <img src="assets/images/users/avatar-1.jpg" alt="user-image" height="42" class="rounded-circle shadow-sm">
                <span class="leftbar-user-name mt-2">Dominic Keller</span>
            </a>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Navigation</li>
            <li class="side-nav-item">
                <a href="{{ url('/admin/dashboard') }}" class="side-nav-link">
                    <i class="uil-layer-group"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ url('/admin/users') }}" class="side-nav-link">
                    <i class="uil-user"></i>
                    <span> User </span>
                </a>
            </li>


           {{--   <li class="side-nav-item">
                <a href="{{ url('/admin/live_tv') }}" class="side-nav-link">
                    <i class="uil-layer-group"></i>
                    <span>  TV Channel </span>
                </a>
            </li> --}}

 

                 <li class="side-nav-item">

                    <div x-data="{ open: false }" class="side-nav-item">
                    <a @click="open = true"  class="side-nav-link">
                        <i class="uil-envelope"></i>
                                <span>  TV Channel </span>
                                <span class="menu-arrow"></span>
                    </a>

                    
                    <div class="collapses " id="sidebarEmail">
                        
                 <ul x-show="open" @click.outside="open = false" class="side-nav-second-level">
                    <li><a href="{{ url('/admin/live_tv') }}">TV Channel</a></li>
                    <li><a href="{{ url('/admin/tv_category') }}">TV Category</a></li>
                    </ul>
                    </div>

                    
                    </div>

                </li>


 

          {{--   <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link collapsed">
                    <i class="uil-store"></i>
                    <span> Live Tv </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce" style="">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="apps-ecommerce-products.html">TV Category</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-products-details.html">TV Channel</a>
                        </li>
                         
                    </ul>
                </div>
            </li> --}}


 

        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->
