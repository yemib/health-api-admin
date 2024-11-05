
       <?php    foreach($service  as $service)   {  ?>
         
      <div class=" col-md-4 col-sm-6"  style="position: relative;  "> 
       <div class="wrap-services clearfix mobi-mt40"> 
        <div class="image-services"> 
        <?php  if($service->image   != '  ') {  ?>
        
         <img  height="100"  width="100" src="{{ $service->image }}" alt="image"> 
         
         <?php   }?>
         
        </div> 
        <div class="content-services"> 
         <h2><a href="/newsletter/{{ $service->id }}/{{ $service->title }}">{{ $service->title }}</a></h2> 
         
         <div  style="height: 200px ; overflow: hidden;">{!! $service->body !!} </div> 
          
          <div  style="position: absolute; bottom: -40px; ">
           <div class="wrap-btn"> 
          <a href="/newsletter/{{ $service->id }}/{{ $service->title }}" class="flat-button-arrow">Read</a> 
         </div> 
         </div>
        </div> 
       </div> 
      </div> 
      
      <?php   } ?>
      
