		
		
	
		  <p class="lead"> <span   onClick="$('.resetp').toggle(1000)"  style="cursor: pointer"> Forgot Password ? Reset  </span> </p>
   

 <div  class="resetp"  style="display: none">
           
            <!---    ---->
            
             
  <form   id="recover_passwordtt"  onSubmit="change_password_email(event,'/recover_password', 'recover_passwordtt','but_change')"   action="/recover_password"   method="POST">


{{  csrf_field() }}


<div class="form-group "  >
                <label class="sr-only" for="emailreset">E-mail Address: </label>
            
            
        
            <input   required id="emailreset"   type="email" name="email"   placeholder="Email Address"    class="form-control" />
            
           </div>
           





<input    id="but_change"   class="btn btn-success" type="submit" name="ForgotPassword" value="Request Reset" />


<span   onClick="$('.resetp').hide(300)"  class="btn btn-danger" id="cancel" style="cursor: pointer">CANCEL</span>

<p  > <strong   id="display_output"> </strong> </p>


</form>
      
   </div>   
		 
			  
			  	
	
	
