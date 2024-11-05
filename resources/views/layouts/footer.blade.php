<!---    this footer bar okay  --->
<?php
use App\add_category;
use App\cart_list;
use App\color;

use App\contact_detail;

  $contact_details = contact_detail::first();

$color  = color::first();
      ?>
<!---#b5b5b5    #0c0c0c--->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<div   data-aos="zoom-out-up"   style="background: {{  $color->textcolor1 }}  ; padding: 5px">


	<div   class="container"  style="width: 100%">

	 <div   class="row">

	 <div  style="padding: 19px "   class="col-sm-6 animated  rollIn">


	 	<div   class="col-sm-6">
	 	<p>


	<table>
  <tbody>
    <tr>
      <td   align="center" valign="middle">	<svg   style="" height="40px" version="1.1" viewBox="0 0 40 40" width="40px" class="float_left" name="email-support"><g fill="none" fill-rule="evenodd" id="Symbols" stroke="none" stroke-width="1"><g fill="#FFFFFF" id="Main-Footer" transform="translate(-592.000000, -519.000000)"><g id="Group-17"><g id="Group-7"><g id="Group-8" transform="translate(592.000000, 519.000000)"><path d="M20,40 C8.954305,40 0,31.045695 0,20 C0,8.954305 8.954305,0 20,0 C31.045695,0 40,8.954305 40,20 C40,31.045695 31.045695,40 20,40 Z M12.7263828,17.5581092 C12.9539141,17.7250061 13.6397773,18.2206903 14.7840078,19.0449059 C15.9282734,19.8691216 16.8048594,20.5037464 17.4138008,20.9488171 C17.4807031,20.9976034 17.6228398,21.1036544 17.8402813,21.2671162 C18.0577578,21.4306876 18.2384609,21.5628676 18.38225,21.6636928 C18.5261445,21.7644814 18.7000977,21.8775488 18.9042852,22.0027124 C19.1084023,22.1277663 19.3008125,22.2218308 19.4814805,22.284102 C19.6621836,22.3468847 19.829457,22.3779838 19.9833359,22.3779838 L19.9934258,22.3779838 L20.0035508,22.3779838 C20.1574297,22.3779838 20.3247734,22.3468482 20.5054766,22.284102 C20.6860742,22.2218308 20.8786602,22.1276567 21.0826016,22.0027124 C21.2866484,21.8774027 21.4606016,21.7644448 21.6044961,21.6636928 C21.7483906,21.5628676 21.9289531,21.4306876 22.1465,21.2671162 C22.3639063,21.1035082 22.5062188,20.9976034 22.5731211,20.9488171 C23.1886367,20.5037464 24.7546016,19.3734009 27.2705234,17.5578899 C27.7589844,17.2033025 28.1670781,16.7754442 28.4949102,16.2746073 C28.8229883,15.7739896 28.9868516,15.2488143 28.9868516,14.6993738 C28.9868516,14.2402337 28.8278398,13.8472019 28.509957,13.5203149 C28.1921094,13.1933548 27.8156563,13.0299662 27.3808438,13.0299662 L12.6059023,13.0299662 C12.0906875,13.0299662 11.6941953,13.2107864 11.4164961,13.5724268 C11.138832,13.9341403 11,14.3862639 11,14.9287611 C11,15.3669614 11.1840781,15.8418155 11.5520586,16.3530309 C11.9200039,16.8642829 12.3115742,17.2660122 12.7263828,17.5581092 Z M27.983,18.6743853 C25.7884063,20.2184101 24.122,21.4183722 22.9845898,22.2740158 C22.6031797,22.5660397 22.2937695,22.7940018 22.0561484,22.9573539 C21.8185273,23.1208157 21.5025078,23.2877492 21.1076328,23.4580812 C20.7128984,23.6286691 20.3450234,23.7137072 20.0036914,23.7137072 L19.9934609,23.7137072 L19.9833711,23.7137072 C19.6421094,23.7137072 19.2740234,23.6286691 18.8792891,23.4580812 C18.4845547,23.2877492 18.1683242,23.1208157 17.9307734,22.9573539 C17.693293,22.7940018 17.3837773,22.5660397 17.0024023,22.2740158 C16.0989922,21.5854518 14.4361719,20.3854166 12.0138711,18.6743853 C11.6323555,18.4102445 11.2944336,18.1074767 11,17.7667029 L11,26.0507025 C11,26.5100618 11.1571836,26.9028744 11.4717266,27.2297979 C11.7861992,27.556831 12.1643398,27.7202928 12.6060078,27.7202928 L27.3809844,27.7202928 C27.8225469,27.7202928 28.2006523,27.556831 28.5151602,27.2297979 C28.8297734,26.9027647 28.9868867,26.5100984 28.9868867,26.0507025 L28.9868867,17.7667029 C28.6990977,18.1004236 28.3646211,18.4031915 27.983,18.6743853 Z" id="Combined-Shape"></path></g></g></g></g></g></svg>	</td>
      <td align="center" valign="middle">
    <strong>EMAIL SUPPORT</strong>
			<p  align="center">
	 	{{  $contact_details->email  }}
	   </p>
	   </td>
    </tr>
  </tbody>
</table>

	 	</p>

	 	</div>


	 	<div   class="col-sm-6">



	<table>
  <tbody>
    <tr>
      <td   align="center" valign="middle"> <svg height="40px" version="1.1" viewBox="0 0 40 40" width="40px" class="float_left" name="phone-support"><defs><path d="M20,40 C8.954305,40 0,31.045695 0,20 C0,8.954305 8.954305,0 20,0 C31.045695,0 40,8.954305 40,20 C40,31.045695 31.045695,40 20,40 Z M27.5999083,24.6474943 L25.1354957,22.1757241 C24.6446304,21.6854253 23.8317479,21.7003218 23.3237822,22.209931 L22.0822006,23.4548046 C22.0037593,23.4114483 21.9225673,23.3661609 21.8372034,23.3181149 C21.0531576,22.8824368 19.9800573,22.2852874 18.8508424,21.152 C17.7182808,20.0163218 17.1222923,18.9384828 16.686533,18.1516782 C16.6405501,18.0683218 16.5964928,17.987954 16.5529857,17.9116322 L17.3862693,17.0771954 L17.7959427,16.6658391 C18.3046877,16.1554943 18.3187163,15.3405057 17.8289971,14.8487816 L15.3645845,12.3767356 C14.8748653,11.8857011 14.061616,11.9005977 13.5528711,12.4109425 L12.8583152,13.1114943 L12.8772951,13.1303908 C12.6444011,13.4284138 12.449788,13.7721379 12.3049628,14.1428046 C12.1714613,14.4956322 12.0883438,14.8323218 12.0503381,15.1697011 C11.7249284,17.8751724 12.9577077,20.3477701 16.3033123,23.7030345 C20.9279542,28.3406437 24.654808,27.9902989 24.8155874,27.9731954 C25.1657536,27.9312184 25.501341,27.8473103 25.842384,27.7144828 C26.2087794,27.5709425 26.5512894,27.376046 26.8482751,27.1429885 L26.8634499,27.1565057 L27.5670831,26.4655172 C28.0747736,25.9552644 28.0893983,25.14 27.5999083,24.6474943 Z" id="path-1"></path></defs><g fill="none" fill-rule="evenodd" id="Symbols" stroke="none" stroke-width="1"><g id="Main-Footer" transform="translate(-831.000000, -519.000000)"><g id="Group-17"><g id="Group-7"><g id="Group-10" transform="translate(831.000000, 519.000000)"><mask fill="white" id="mask-2"><use xlink:href="#path-1"></use></mask><use fill="#FFFFFF" id="Phone" xlink:href="#path-1"></use></g></g></g></g></g></svg>
		</td>
      <td align="center" valign="middle">
  <strong> PHONE SUPPORT </strong>

			<p  align="center">
	 	{{  $contact_details->support  }}
	   </p>
	   </td>
    </tr>
  </tbody>
</table>



	 	</div>



	 </div>





	 <div   style=""  class="col-sm-6">

	 	<div  class="col-sm-5">
		<h3>Get Latest Deals</h3>

 	    <p>Our best promotions sent to your inbox.</p>



	 	  </div>



	 	<div  class="col-sm-7   search_padding"  style=" ">

	 		  <form  id="email_subscribe_form"  onSubmit="email_subsribe(event,'/email_subscribe', 'email_subscribe_form','display_dataem'  )"  style="" class="email_subscribe" role="search">

          {{ csrf_field()  }}

          <input  required  style="display: inline-block; width: 65%  ; height: 39px" type="email" class="form-control" id="jsSearchInput" name="email" placeholder="Email Address" />



        <button   id="display_dataem" style="position: relative;  top: -2px"  class="btn btn-success" type="submit"> Subscribe </button>

      </form>

	 	</div>

	 </div>


	 </div>

	</div>

</div>

<!---- last footer   ---->


<div  class="fadeInDown"   style="background: {{  $color->textcolor2 }} ;color: white">


<div  class="container">

<div  class="row">



<div  align="left"   class="col-sm-6"  style=""  >


	<h3>

    AMAZ FOODS INTERNATIONAL

 </h3>
 <div  class="col-sm-4">

	<!--   color: #b5b5b5    color: #b5b5b5   color: #b5b5b5--->

	<a class="mylink"  style="color: rgba(255,255,255,1.00)" href="/posts"> Posts </a>

	<hr />



	<a class="mylink"  style="color: rgba(255,255,255,1.00)" href="/About   Us"> About Us  </a>

	<hr />




	<a    style="color: white"  href="/Terms  &  Condition"> Terms & Conditions </a>

	<hr  />

<a    style="color: white" href="/Return Policy">	Return Policy </a>

<hr/>

</div>
</div>



<div   class="col-sm-6  last_bottom"      style=" position: relative  ">



<div  style=""   class="connect_with" >


	<h3>  Connect With Us </h3>

<a href="{{  $contact_details->facebook  }}">
	<span   id="sc"     class="badge">
<i  style="color: rgba(255,255,255,1.00)" class="fa fa-facebook"></i>  </span>

</a>
&nbsp;
<a href="{{  $contact_details->twitter  }}">
	<span   id="sc"     class="badge">
		<i  style="color: rgba(255,255,255,1.00)" class="fa fa-twitter"></i>  </span>
	</a>
&nbsp;
<a href="{{  $contact_details->instagram  }}">
	<span   id="sc"     class="badge">
		<i  style="color: rgba(255,255,255,1.00)" class="fa fa-instagram"></i>  </span>

	</a>

	</div>

	</div>


</div>

	<p align="center">Copyright  © 2019 AMAZ FOODS INTERNATIONAL . All rights reserved</p>

</div>





</div>
