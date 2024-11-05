   @extends('admin_folder/index')

@section('content')


@include('layouts.error_code')
<?php

use App\add_category;
	$parent = add_category::Where('parent' ,'none')->get();
		$subparent = add_category::Where('sub_parent' ,'none')->Where('parent' ,  '!=' ,'none')->get();


		$all = array('parent'=>$parent,   'subparent'=> $subparent);


?>

	@if(isset($edit_list))

	<?php

$direction = '/menu/'.$edit_list->id;

     ?>

	@else

    <?php  $direction = '/menu'  ?>
	@endif

         <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Add Pages</h3>
              </div>
              <div class="panel-body">




	<a class="btn btn-primary"  href="/list_category"> List Category  </a>

<h2 > Add Menu </h2>




	<form   id="category_form"  method="post"   action="{{$direction}}"   enctype="multipart/form-data"  >

		 {{ csrf_field() }}


		 <label>  <strong>Main Menu</strong>  </label>

		<input   value="@if(isset($edit_list))  {{ $edit_list->name }}  @endif"   name="name"   class="form-control"  />
		<br/>

		<label>  <strong>Sub Menu</strong>  </label>
		<select     id="parent_value"  onChange=" hide_show_image();change_value_sub(event,'/submenu', 'category_form','sub_parent_value')"   name="parent"   class="form-control"  >

		@if(isset($edit_list)) <option   class="{{ $edit_list->parent }}"    id="" value="{{ $edit_list->parent }}">      {{ $edit_list->parent }}   </option> @endif
			<option  value="none">  root  </option>


				@foreach ($parent as $parent)

		<option   id=""  value="{{  $parent->name }} ">  	{{  $parent->name }}  </option>


		@endforeach


		</select>

		<br/>


		<?php  if(isset($edit_list)){   ?>

	  <?php if($edit_list->parent=='none')  $display = 'inline';  else $display='none'; ?>

		<p  style="display: {{$display}}"   id="picture_label">





		 <div  @if(isset($edit_list)) data-src="  {{ asset('category/'.$edit_list->picture  )}}" @endif class="  lazy img_container"   id="preview">   </div>

		<br/>

		<label    class="btn btn-primary" for="file-input">   Change   Image   </label>
		</p>






		<?php  }else{   ?>

			<br/>
			<div   id="picture_label">



		 <div  style="  @if(isset($edit_list)) background-image:url('  {{ asset('category/'.$edit_list->picture  )}}') @endif" class="img_container"   id="preview">   </div>




</div>
<?php
} ?>




		<input     style="display: none"   id="file-input" type="file"   value=""   name="picture"  />





		<div  id="submenu">   </div>

		<br/>

		@if(isset($edit_list))

		<input  class="btn btn-primary"  type="Submit"  value="Update"  />
		@else
		<input  class="btn btn-primary"  type="Submit"  value="Save"  />
		@endif



	</form>
		@if(isset($edit_list))
<a  href="/add_category"> <button   style="display: inline-block"   class="btn btn-danger">  Cancel</button></a>
@endif



	</div>



</div>
</div>



@endsection


<script>



	function  hide_show_image()  {



var	 determinant  =	$('#parent_value').val();


		if(determinant   == 'none'){

			$('#picture_label').show();

		}else{

			$('#picture_label').hide();
		}


	}


</script>
