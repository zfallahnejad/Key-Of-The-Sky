    <?php
		$baseUrl = Yii::app()->request->baseUrl;
	?>
	<div class="slider-bootstrap"><!-- start slider -->
    	<div class="slider-wrapper theme-default">
            <div id="slider-nivo" class="nivoSlider">
                <img src="<?php echo $baseUrl;?>/img/slider/flickr/s10.jpg" data-thumb="<?php echo $baseUrl;?>/img/slider/flickr/s10.jpg" alt="" title="text" />
                <img src="<?php echo $baseUrl;?>/img/slider/flickr/s11.jpg" data-thumb="<?php echo $baseUrl;?>/img/slider/flickr/s11.jpg" alt="" title="" />
                <img src="<?php echo $baseUrl;?>/img/slider/flickr/s12.jpg" data-thumb="<?php echo $baseUrl;?>/img/slider/flickr/s12.jpg" alt="" title="" />
                <img src="<?php echo $baseUrl;?>/img/slider/flickr/s13.jpg" data-thumb="<?php echo $baseUrl;?>/img/slider/flickr/s13.jpg" alt="" data-transition="slideInLeft"  />
            </div>
        </div>
    </div> <!-- /slider -->
    
    
    <div class="shout-box" >
        <div class="shout-text" >
          <h1>Greatest website ever</h1>
          <p>We work very hard to bring you the best website</p>
        </div>
    </div>
    <div class="row-fluid">
            <ul class="thumbnails center">
              <li class="span3">
                <div class="thumbnail">
                <h3>Text</h3>
                  
                  	<div class="round_background r-grey-light">
                		<img src="<?php echo $baseUrl;?>/img/icons/smashing/30px-01.png" alt="" class="">
                     </div>
                  
                  <p>Text.</p>
                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                	 <h3>Text</h3>
                
                     <div class="round_background r-yellow">
                		<img src="<?php echo $baseUrl;?>/img/icons/smashing/30px-41.png" alt="" class="">
                     </div>
                 
                  <p>Text.</p>
                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                	<h3>Text</h3>
                  	<div class="round_background r-grey-light">
                		<img src="<?php echo $baseUrl;?>/img/icons/smashing/30px-37.png" alt="" class="">
                     </div>
                  <p>Text.</p>
                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                  <h3>Text</h3>
                  <div class="round_background r-yellow">
                		<img src="<?php echo $baseUrl;?>/img/icons/smashing/30px-17.png" alt="" class="">
                     </div>
                  <p>Text.</p>
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
            <img src="<?php echo $baseUrl;?>/img/team-member.png" width="260" height="180" alt="Me" />
            <h3>
            Name1
            </h3>
            <p>description</p>
            
            </div>
           
        </div>
         
          <div class="span3">
           
            <div class="colored_banner thumb-content-dark">
            <img src="<?php echo $baseUrl;?>/img/team-member.png" width="260" height="180" />
            <h3>
            Name2
            </h3>
            <p>description</p>

            </div>
          </div>
          
          <div class="span3">
              
            <div class="colored_banner thumb-content-dark">
            <img src="<?php echo $baseUrl;?>/img/team-member.png" width="260" height="180" />
            <h3>
            Name3
            </h3>
            <p>description</p>
            
            </div>
           
          </div>
          
          <div class="span3">
           
            <div class="colored_banner thumb-content-dark">
            <img src="<?php echo $baseUrl;?>/img/team-member.png" width="260" height="180" />
            <h3>
            Name4
            </h3>
            
			<p>description</p>
            
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