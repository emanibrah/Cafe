<!DOCTYPE html>
<html lang="en">
  <head>
  @include('dashincludes.head')

  </head>
  @include('dashincludes.menuprofile')

  
 
         <!-- sidebar menu -->
         @include('dashincludes.sidebar')


            <!-- /menu footer buttons -->
            @include('dashincludes.menufooter')

            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        @include('dashincludes.topnav')

        <!-- /top navigation -->
          @yield('pagecontent')
        <!-- page content -->
      
        <!-- footer content -->
        @include('dashincludes.footer')

    <!-- jQuery -->
    @include('dashincludes.js')
  </body>
</html>