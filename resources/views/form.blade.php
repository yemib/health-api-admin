
<?php 
use App \servicess ; 

$slidder  = servicess::where('publish' ,  'yes')->get();

?>
<form  action="/sendmail" enctype="multipart/form-data" method="post" class="" id="form_f5a7ds"    style="position: relative  ; z-index: 80"   onSubmit="quotemes(event,'/sendmail', 'form_f5a7ds','display_data')"  >



{{   csrf_field() }}

<div class="frm_form_fields ">
<fieldset>
<legend class="frm_hidden"><img   src="{{ asset('images/request-quote.png')}}"  /></legend>

<div class="frm_fields_container">
<div id="frm_field_83_container" class="frm_form_field form-field  frm_required_field frm_top_container">
   
   
    <label    for="field_q5cpll" class="frm_primary_label">Name </label>
    <input  placeholder="name"  required type="text" id="field_q5cpll" name="name" value="" >
    
    
</div>


<div id="frm_field_84_container" class="frm_form_field form-field  frm_top_container" style="">
    <label for="field_6wykby" class="frm_primary_label">Email Address
       
    </label>
    <input type="email"  name="email" value=""   required     placeholder="Email Address">
    
    
</div>

<div id="frm_field_85_container" class="frm_form_field form-field  frm_top_container" >
   
    <label for="field_rvqrdb" class="frm_primary_label">Phone Number
        <span class="frm_required"></span>
    </label>
    <input type="tel" id="field_rvqrdb" name="phone" value=""   class="auto_width" pattern="((\+\d{1,3}(-|.| )?\(?\d\)?(-| |.)?\d{1,5})|(\(?\d{2,6}\)?))(-|.| )?(\d{3,4})(-|.| )?(\d{4})(( x| ext)\d{1,5}){0,1}$"    required>
    
    
</div>
<div id="frm_field_87_container" class="frm_form_field form-field  frm_required_field frm_top_container">
    <label for="field_i9tb7o" class="frm_primary_label">Interested In:
       
    </label>
    		<select name="service" id="" required    >
    		
    		
				<option value="Select a Service" selected="selected" class="">
			Select a Service		</option>
			
			
			<?php   foreach($slidder  as $slidder  )   { ?>
			
			
			
			<option value="{{$slidder->title}}" class="">
			{{ $slidder->title }}	</option>
			
			
	<?php  }  ?>		
			
		
		</select>
	
    <div id="frm_desc_field_i9tb7o" class="frm_description"><strong>If you require multiple services, please call.</strong></div>
    
</div>

<div  class="frm_form_field form-field  frm_required_field frm_top_container">
   
    <label for="field_wtftb9" class="frm_primary_label">Move Date
       
    </label>
    <input type="date"  name="date" value=""   required>
    
    
</div>
<div  class="frm_form_field form-field  frm_required_field frm_top_container">
    <label for="field_tbh257" class="frm_primary_label">Current Address
       
    </label>
    <input type="text" name="current_address" value=""  placeholder="Current Address" >
    <div id="frm_desc_field_tbh257" class="frm_description">Street number, Street Name, City, Province and Postal Code</div>
    
</div>

<div id="frm_field_104_container" class="frm_form_field form-field  frm_required_field frm_top_container">
    <label for="field_behf11" class="frm_primary_label">Destination Address
        <span class="frm_required">*</span>
    </label>
    <textarea name="destination" id="field_behf11" rows="5" ></textarea>
    <div id="frm_desc_field_behf11" class="frm_description">Street number, Street Name, City, Province</div>
    
</div>

<input type="hidden" name="item_key" value="">
	<div class="frm_submit">

<input id="display_data"  type="submit" value="Submit" class="frm_final_submit" >



<img  style="display: none"    class="display_data" src="{{ asset('images/ajax_loader.gif') }}" alt="Sending">

<span  id="display_output">    </span>

</div></div>
</fieldset>
</div>
</form>


