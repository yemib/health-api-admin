<?php 
class  rough_function {
	
	function sesssion(){
		
if (!isset($_SESSION)) {
  session_start();
}
		
	}
	
	function form($name , $type , $required , $input_name ){
		   ?>
		   <label  id="<?php   echo($input_name) ?>">  <?php   echo($name) ?>  </label>
      	<input  oninput="this.className = 'form-control'"   name="<?php   echo($input_name) ?>"     id="<?php   echo($input_name) ?>"  type="<?php   echo($type) ?>"    placeholder="<?php   echo($name) ?>"  class="form-control"   <?php   echo($required) ?>    />
		   <?php
		  
	   }
	

	
	function progress_form($heading , $subheading  , $name , $type  , $placeholder  , $class   , $required)
	{
		?>
	   <p align="center">
		   <h1><?php   echo($heading) ?> </h1>
		   
    <p align="center"> <?php  echo($subheading)  ?> </p>
   </p>
    <p><input  type="<?php    echo($type)?>"   class="<?php  echo($class) ?>" placeholder="<?php  echo($placeholder) ?>" oninput="this.className = '<?php  echo($class) ?>'" name="<?php   echo($name) ?>"></p>
		<?php
		
	}
	
	
	function option_question($question  ,  $where){
		?>
		 <p>
	  	<?php     echo($question) ?>
	  </p>
	  <div   class="<?php  echo($where) ?>"  >      </div>
	  
	  
	  
	 <p> <span  class="glyphicon glyphicon-plus">  </span>  <label  role="button" class=".btn"   onClick="add_more('<?php  echo($where)  ?>', 'option' )"> Add an answer </label> </p>
	  
		<?php
		
	}
	
	
	
	
}




?>
