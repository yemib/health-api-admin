<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>jjjf</title>

<!-- Bootstrap -->



<link href="{{  asset('css/bootstrap.min.css') }}" rel="stylesheet">

<script src="{{  asset('js/jquery-1.11.3.min.js')  }}"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
}
</style>
    
    
</head>
<body>


<nav class="navbar navbar-default">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <a class="navbar-brand" href="#">Brand</a></div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="defaultNavbar1">
      <ul class="nav navbar-nav">
        <li class=""><a href="#">Home<span class="sr-only">(current)</span></a></li>
        
        <li><a href="#">About</a></li>
        
        <li>
        	
        	<a  href="#">  Contact us</a>
        </li>
        
        
         
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Academy<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
           
            <li><a href="#">My courses</a></li>
            <li><a href="#">All courses</a></li>
            <li><a href="#">Free courses</a></li>
            
            
            <li class="divider"></li>
            
            
            <li><a href="create_school.php"></a></li>
            
                     
      <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">Create School <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a tabindex="-1" href="create_course.php">Create Course </a></li>
          
        
        </ul>
      </li>
          
           
          </ul>
        </li>
        
        
        
        
       <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Projects<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          <li>  <a  href="#">  Summer  </a></li>
          <li>   <a  href="#"> Spelling Bee  </a> </li>
          
          
        </ul>
         
           </li>
           
           
           
           
           
           
                   
       <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Service<span class="caret"></span></a>
         
          <ul class="dropdown-menu" role="menu">
         
      <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">Translation <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a tabindex="-1" href="#"> I need </a></li>
          <li><a tabindex="-1" href="#">I provide</a></li>
        
        </ul>
      </li>
          
		
       
          
          
           <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">Editing <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a tabindex="-1" href="#"> I need </a></li>
          <li><a tabindex="-1" href="#">I provide</a></li>
        
        </ul>
      </li>
          
          
        <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">Interpretation <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a tabindex="-1" href="#"> I need </a></li>
          <li><a tabindex="-1" href="#">I provide</a></li>
        
        </ul>
      </li>
          
          
          
          
          
        </ul>
         
           </li>
           
           
           
      
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Business<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Vacancies</a></li>
            
            <li><a href="#">Employer </a></li>
            
            
            
            
            <li><a href="#">I need a job</a></li>
            
           
            
            
          </ul>
        </li>
                     
           
        
      </ul>
      
      
      <ul class="nav navbar-nav navbar-right">
        
       

         <li>  <a  href="#">Login  </a>   </li>
         <li>  <a  href="register.php"> Register    </a>  </li>
            
                  
                              </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>

@include('functions.rough_function')
<?php     $rough_function  = new  rough_function(); ?>


    
    @yield('content')
    
      









<script src="{{asset('js/bootstrap.js')}}"></script>


<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
	
	  
    $(this).next('ul').toggle();
	   
    e.stopPropagation();
    e.preventDefault();
	  $(this).previous('ul').hide();
  });
});
</script>

</body>
</html>
