<!DOCTYPE html>
<html lang="en">
<head>
@include('includes.head')
</head>
<body>
  
<div class="tm-container">
    <div class="tm-row">
      <!-- Site Header -->
      <div class="tm-left">
        <div class="tm-left-inner">
          <div class="tm-site-header">
            <i class="fas fa-coffee fa-3x tm-site-logo"></i>
            <h1 class="tm-site-name">Wave Cafe</h1>
          </div>
          <nav class="tm-site-nav">
            <ul class="tm-site-nav-ul">
              <li class="tm-page-nav-item">
                <a href="#drink" class="tm-page-link active">
                  <i class="fas fa-mug-hot tm-page-link-icon"></i>
                  <span>Drink Menu</span>
                </a>
              </li>
              <li class="tm-page-nav-item">
                <a href="#about" class="tm-page-link">
                  <i class="fas fa-users tm-page-link-icon"></i>
                  <span>About Us</span>
                </a>
              </li>
              <li class="tm-page-nav-item">
                <a href="#special" class="tm-page-link">
                  <i class="fas fa-glass-martini tm-page-link-icon"></i>
                  <span>Special Items</span>
                </a>
              </li>
              <li class="tm-page-nav-item">
                <a href="#contact" class="tm-page-link">
                  <i class="fas fa-comments tm-page-link-icon"></i>
                  <span>Contact</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>        
      </div>
      <div class="tm-right">
        <main class="tm-main">
           <!-- Drink Menu Page -->
  @include('includes.drinkmenu')


<!-- About Us Page -->
   @include('includes.about')

 >   <!-- Special Items Page -->
 @include('includes.special')

    <!-- Contact Page -->
@include('includes.contect') 

</main>
      </div>    
    </div>

  <!-- Background video -->
  @include('includes.video')


       
     
  </script>
</body>
</html>