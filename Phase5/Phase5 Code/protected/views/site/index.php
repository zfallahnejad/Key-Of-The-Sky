    <?php
		$baseUrl = Yii::app()->request->baseUrl;
	?>

<!-- start slider -->
    	<!-- /slider -->
    
    
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
                		<img src="<?php echo $baseUrl;?>/img/icons/smashing/02.jpg" alt="" class="">
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
		<script type='text/javascript'>
		$().ready(function(){$('#i').focus()});// focus search area
		</script>
		
		<h1 class="header">
                     
                </h1>
				
		<div class="row-fluid" style="direction:rtl" align="right">
           		
           		<ul class="nav nav-tabs pull-right" >
				  <li><a href="#school" data-toggle="tab">لیست مدارس شرکت کننده</a></li>
				  <li class="active" ><a href="#mosque" data-toggle="tab">لیست مساجد شرکت کننده</a></li>
                  
                </ul>
				
				<div class="tab-content">
					<div class="tab-pane active" id="mosque">
						<div id='container' style="direction:rtl" align="right">


							<form action='javascript:void(0);'>
      				<h3>
        				<input id='i' name='i' type='text' autocomplete="off" style="font-family:'B Nazanin'"/>
       	  جستجو بر اساس:
          			همه موارد<input id='s4' name='select' type="radio" value="همه موارد" checked="checked"/>
            نام مسجد
           			 <input id='s1' name='select' type="radio" value="نام مسجد"  />
            نام خانوادگی مسئول مسجد<input id='s2' name='select' type="radio" value="نام خانوادگی مسئول مسجد" />
			آدرس<input id='s3' name='select' type="radio" value="آدرس" />
			
					
     			   </h3>
   			   </form>
	  
	  <?php
		$mosques = Yii::app()->db->createCommand()
				->select('Id,mosqueName,family,mosqueAddress')
				->from('mosqueculturalliablee')
				->where('status = 1')
				->query();
		?>
	  
	  
	  
	  
      <div id="object-browser">
		<div id="items" >
			<table class="table table-striped">
				<thead>
            		<tr>
                		<th><div align="right">نام مسجد</div></th>
                    	<th><div align="right">نام خانوداگي مسئول مسجد</div></th>
                    	<th><div align="right">آدرس</div></th>
						<th><div align="right"></div></th>
						<th><div align="right"></div></th>
                	</tr>
            	</thead>
				<tbody>
					<div id='wrapper'>
        				<div id='content'>
							<form  method="POST" action="point.php">
							<?php
								foreach($mosques as $row)
								{
									?>
									<tr id='io'>
										<td>
											<div class='search_item1'>
            									<h4 align="right" class='search_text'>
													<?php echo $row['mosqueName'];?>
												</h4>
											</div>	
										</td>
										<td>
											<div class='search_item2'>
            									<h4 align="right" class='search_text'>
													<?php echo $row['family'];?>
												</h4>
											</div>
										</td>
                    					<td>
											<div class='search_item3'>
            									<h4 align="right" class='search_text'>
													<?php echo $row['mosqueAddress'];?>
												</h4>
											</div>
										</td>
										<td>
											<div >
            									<h4 >
													<a <?php echo CHtml::link('نقشه',array('site/mosquemap','Id'=>$row['Id']));?></a>
												</h4>
											</div>
										</td>
										<td>
											<div class='search_child3'>
            									<h4 class='Child3'>
													<a <?php echo CHtml::link('صفحه مسجد',array('site/mosqueReward','Id'=>$row['Id']));?></a>
												</h4>
											</div>
										</td>
									</tr>
									<?php
								}
							?>
							</form>
						</div>
					</div>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>




					<div class="tab-pane" id="school">
	<div id='container' style="direction:rtl" align="right">
						
						<form action='javascript:void(0);'>
      				<h3>
        				<input id='i' name='i' type='text' autocomplete="off" style="font-family:'B Nazanin'"/>
       	  جستجو بر اساس:
          			همه موارد<input id='s4' name='select' type="radio" value="همه موارد" checked="checked"/>
            نام مدرسه
           			 <input id='s1' name='select' type="radio" value="نام مدرسه"  />
            نام خانوادگی مسئول مدرسه<input id='s2' name='select' type="radio" value="نام خانوادگی مسئول مدرسه" />
			آدرس<input id='s3' name='select' type="radio" value="آدرس" />
			
					
     			   </h3>
   			   </form>


							
	  
	  <?php
		$schools = Yii::app()->db->createCommand()
				->select('schoolId,schoolName,teacherFamily,schoolAddress')
				->from('school')
				->query();
		?>
	  
	  
	  
	  
      <div id="object-browser">
		<div id="items" >
			<table class="table table-striped">
				<thead>
            		<tr>
                		<th><div align="right">نام مدرسه</div></th>
                    	<th><div align="right">نام خانوداگي مسئول مدرسه</div></th>
                    	<th><div align="right">آدرس</div></th>
						<th><div align="right"></div></th>
						
                	</tr>
            	</thead>
				<tbody>
					<div id='wrapper'>
        				<div id='content'>
							<form  method="POST" action="point.php">
							<?php
								foreach($schools as $row)
								{
									?>
									<tr id='io'>
										<td>
											<div class='search_item1'>
            									<h4 align="right" class='search_text'>
													<?php echo $row['schoolName'];?>
												</h4>
											</div>	
										</td>
										<td>
											<div class='search_item2'>
            									<h4 align="right" class='search_text'>
													<?php echo $row['teacherFamily'];?>
												</h4>
											</div>
										</td>
                    					<td>
											<div class='search_item3'>
            									<h4 align="right" class='search_text'>
													<?php echo $row['schoolAddress'];?>
												</h4>
											</div>
										</td>
										<td>
											<div class='search_child3'>
            									<h4 class='Child3'>
													<a <?php echo CHtml::link('صفحه مدرسه',array('site/schoolPage','schoolId'=>$row['schoolId']));?></a>
												</h4>
											</div>
										</td>
									</tr>
									<?php
								}
							?>
							</form>
						</div>
					</div>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
</div>



				

		
		
		
		
		

		<h3 class="header">برندگان دوره قبل
        	<span class="header-line"></span> 
        </h3>       
     <div class="row-fluid">        
        <div class="span3">
              
            <div class="colored_banner thumb-content-dark">
            <a href="<?php echo $baseUrl;?>/img/1.jpg" data-lightbox="roadtrip"><img src="<?php echo $baseUrl;?>/img/1.jpg" width="260" height="180" alt="Me" class="nicepic" /></a>
            <h3>حسین</h3>
            <p>فوتبال دستی</p>
            
            </div>
           
        </div>
         
          <div class="span3">
           
            <div class="colored_banner thumb-content-dark">
            <a href="<?php echo $baseUrl;?>/img/2.jpg" data-lightbox="roadtrip"><img src="<?php echo $baseUrl;?>/img/2.jpg" width="260" height="180" alt="Me" class="nicepic" /></a>
            <h3>
            حسن
            </h3>
            <p>توپ</p>

            </div>
          </div>
          
          <div class="span3">
              
            <div class="colored_banner thumb-content-dark">
            <a href="<?php echo $baseUrl;?>/img/3.jpg" data-lightbox="roadtrip"><img src="<?php echo $baseUrl;?>/img/3.jpg" width="260" height="180" alt="Me" class="nicepic" /></a>
            <h3>
            علی
            </h3>
            <p>پلاک طلا</p>
            
            </div>
           
          </div>
          
          <div class="span3">
           
            <div class="colored_banner thumb-content-dark">
            <a href="<?php echo $baseUrl;?>/img/4.jpg" data-lightbox="roadtrip"><img src="<?php echo $baseUrl;?>/img/4.jpg" width="260" height="180" alt="Me" class="nicepic" /></a>
            <h3>
            محسن
            </h3>
            
			<p>مدادرنگی</p>
            
            </div>
          </div>
        
      </div>