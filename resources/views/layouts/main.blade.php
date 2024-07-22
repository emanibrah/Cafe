<!DOCTYPE html>
<html lang="en">
<head>
@include('includes.head')
</head>
<body>
  
        <!-- Site Header -->
        @include('includes.siteheader')
        <div class="tm-right">
        <main class="tm-main">
        <div id="drink" class="tm-page-content">

             @yield('content')
        </main>
      </div>    
    </div>
        <!-- Background video -->
        @include('includes.video')


  </script>
</body>
</html>