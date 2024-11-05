
  <?php

use App\slidders;

$select_slide  = slidders::where('publish' , 'yes')->orderby('id'  , 'desc')->get()
?>

 <div class="flat-slider style1">
   <!-- SLIDER -->
   <div class="rev_slider_wrapper fullwidthbanner-container">
    <div id="rev-slider3" class="rev_slider fullwidthabanner">
     <ul>


     <?php   foreach($select_slide as $select_slide){   ?>
      <!-- Slide 1 -->
      <li data-transition="random">
       <!-- Main Image -->
        <img src="{{  $select_slide->image }}" alt="" data-bgposition="center center" data-no-retina>
       <div class="overlay"></div>
       <!-- Layers -->
       <div class="tp-caption tp-resizeme text-ffb922 font-rubik font-weight-500 wellcome make text-center" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-105','0','0','-20']" data-fontsize="['30','20','20','16']" data-lineheight="['90','48','28','22']" data-width="full" data-height="none" data-whitespace="normal" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;" data-start="700" data-splitin="none" data-splitout="none" data-responsive_offset="on">
      <p style="color: rgba(14,255,3,1.00);text-shadow: 2px 0 0 black, -2px 0 0 green, 0 2px 0 green, 0 -2px 0 green, 1px 1px green, -1px -1px 0 green, 1px -1px 0 green, -1px 1px 0 green;"> {{  $select_slide->text2 }} </p>
       </div>
       <div class="tp-caption tp-resizeme font-rubik font-weight-700 text-white style1 text-center" data-x="['center','center','center','center']" data-hoffset="['0','-2','-2','-2']" data-y="['middle','middle','middle','middle']" data-voffset="['12','50','50','30']" data-fontsize="['120','60','40','32']" data-lineheight="['150','80','45','43']" data-width="full" data-height="none" data-whitespace="normal" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;" data-start="1000" data-splitin="none" data-splitout="none" data-responsive_offset="on">
       <p  style="text-shadow: 2px 0 0 green, -2px 0 0 green, 0 2px 0 green, 0 -2px 0 green, 1px 1px green, -1px -1px 0 green, 1px -1px 0 green, -1px 1px 0 green; ">{{  $select_slide->text1}} </p>
       </div>
       <div class="tp-caption tp-resizeme text-white font-rubik font-weight-400 text-wizym text-center" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['29','180','180','120']" data-fontsize="['18','18','16','14']" data-lineheight="['30','30','26','22']" data-width="full" data-height="none" data-whitespace="normal" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;" data-start="1000" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-paddingleft="['280','180','180','10']" data-paddingright="['280','180','180','10']" data-margintop="['20','20','20','0']" data-marginbottom="['20','20','20','0']">
       </div>



          </li>
      <!-- /End Slide 1 -->


      <?php   }   ?>

     </ul>
    </div>
   </div>
  </div>
