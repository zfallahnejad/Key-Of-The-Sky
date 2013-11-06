    <?php
		$baseUrl = Yii::app()->request->baseUrl;
	?>
	<div class="slider-bootstrap"><!-- start slider -->
    	<div class="slider-wrapper theme-default">
            <div id="slider-nivo" class="nivoSlider">
                <img src="<?php echo $baseUrl;?>/img/slider/flickr/s10.jpg" data-thumb="<?php echo $baseUrl;?>/img/slider/flickr/s10.jpg" alt="" title="" data-transition="" />
                <img src="<?php echo $baseUrl;?>/img/slider/flickr/s11.jpg" data-thumb="<?php echo $baseUrl;?>/img/slider/flickr/s11.jpg" alt="" title="" data-transition="fade" />
                <img src="<?php echo $baseUrl;?>/img/slider/flickr/s12.jpg" data-thumb="<?php echo $baseUrl;?>/img/slider/flickr/s12.jpg" alt="" title="" data-transition="" />
                <img src="<?php echo $baseUrl;?>/img/slider/flickr/s13.jpg" data-thumb="<?php echo $baseUrl;?>/img/slider/flickr/s13.jpg" alt="" data-transition="fade"  />
            </div>
        </div>
    </div> <!-- /slider -->
    
    
    <div class="shout-box" >
        <div class="shout-text" >
          <h1>سامانه کلید آسمان</h1>
          <p>راهی نوین برای  گسترش مکتب اسلام</p>
        </div>
    </div>
    <div class="row-fluid">
            <ul class="thumbnails center">
              <li class="span3">
                <div class="thumbnail">
                <h3>پشتیبانی 24 ساعته</h3>
                  
                  	<div class="round_background r-grey-light">
                		<img src="<?php echo $baseUrl;?>/img/icons/smashing/01.jpg" alt="" class="">
                  </div>
                  
                  <p>.</p>
                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                	 <h3>طراحی زیبا</h3>
                
                     <div class="round_background r-yellow">
                		<img src="<?php echo $baseUrl;?>/img/icons/smashing/02.png" alt="" class="">
                     </div>
                 
                  <p>.</p>
                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                	<h3>امنیت اطلاعات</h3>
                  	<div class="round_background r-grey-light">
                		<img src="<?php echo $baseUrl;?>/img/icons/smashing/03.jpg" alt="" class="">
                  </div>
                  <p>.</p>
                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                  <h3>کارایی بالا</h3>
                  <div class="round_background r-yellow">
                		<img src="<?php echo $baseUrl;?>/img/icons/smashing/04.jpg" alt="" class="">
                  </div>
                  <p>.</p>
                </div>
              </li>

            </ul>
        </div>
        
        <hr>
		<h3 class="header">برندگان دوره قبل
        	<span class="header-line"></span> 
        </h3>       
     <div class="row-fluid">        
        <div class="span3">
              
            <div class="colored_banner thumb-content-dark">
            <img src="<?php echo $baseUrl;?>/img/1.jpg" width="260" height="180" alt="Me" />
            <h3>کلاه قرمزی</h3>
            <p>فوتبال دستی</p>
            
            </div>
           
        </div>
         
          <div class="span3">
           
            <div class="colored_banner thumb-content-dark">
            <img src="<?php echo $baseUrl;?>/img/2.jpg" width="260" height="180" />
            <h3>
            فامیل دور
            </h3>
            <p>توپ</p>

            </div>
          </div>
          
          <div class="span3">
              
            <div class="colored_banner thumb-content-dark">
            <img src="<?php echo $baseUrl;?>/img/3.jpg" width="260" height="180" />
            <h3>
            پسرعمه زا
            </h3>
            <p>پلاک طلا</p>
            
            </div>
           
          </div>
          
          <div class="span3">
           
            <div class="colored_banner thumb-content-dark">
            <img src="<?php echo $baseUrl;?>/img/4.jpg" width="260" height="180" />
            <h3>
            پسرخاله
            </h3>
            
			<p>مدادرنگی</p>
            
            </div>
          </div>
        
      </div>
   
 
        
    <script type="text/javascript" src="<?php echo $baseUrl;?>/js/nivo-slider/jquery.nivo.slider.pack.js"></script>
    
     <script type="text/javascript">
    $(function() {
        $('#slider-nivo').nivoSlider({
			effect: 'boxRandom',
			manualAdvance:false,
			controlNav: false
			});
    });
    </script> <!--<script type="text/javascript">
    $(document).ready(function() {
        $('#slider-nivo2').nivoSlider();
    });
    </script>-->