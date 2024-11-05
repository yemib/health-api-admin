 <div class="col-lg-2 col-md-2 col-sm-2"   style="border: 2px solid rgba(18,255,0,1.00)">

      <?php
	 		use App\page ;

		$vision = page::find(2);
		$value = page::find(3);
		  ?>


       <div class="flat-features-5">
      <!---place the vision and  visual   ---->

       <h1  align="center"  style="text-shadow: 2px 0 0 green, -2px 0 0 green, 0 2px 0 green, 0 -2px 0 green, 1px 1px green, -1px -1px 0 green, 1px -1px 0 green, -1px 1px 0 green;color: rgba(255,255,255,1.00) ">  Our  Vision  </h1>

       <p>   {!!  $vision->body !!} </p>

       <br/>

         <h1  align="center"  style="text-shadow: 2px 0 0 green, -2px 0 0 green, 0 2px 0 green, 0 -2px 0 green, 1px 1px green, -1px -1px 0 green, 1px -1px 0 green, -1px 1px 0 green;color: rgba(255,255,255,1.00) ">  Our  Values  </h1>


       <p>  {!!   $value->body !!} </p>


       </div>
      </div>

