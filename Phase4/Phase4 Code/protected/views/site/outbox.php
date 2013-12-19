<?php
	$this->pageTitle=Yii::app()->name . ' - Inbox';
	$this->breadcrumbs=array(
		'Inbox', );
	$mail=Yii::app()->user->name;
	$Id =Yii::app()->db->createCommand()
		    ->select ('mosqueculturalliablee.Id,parent.parentCode,school.schoolId')
		    ->from('mosqueculturalliablee,parent,school')
		  	->where(array('or', 'mosqueculturalliablee.email=:mail', 'parent.email=:mail','school.email=:mail'), array(':mail'=>$mail))
			->queryScalar();
			
								
	$comments = Yii::app()->db->createCommand()
				->select('Subject,commentId,ReceiverMail,Category')
				->from('comment')
				->where('SenderMail=:mail', array(':mail'=>$mail))
				->query();
	
				
?>
<script type='text/javascript'>
	$().ready(function(){$('#i').focus()});// focus search area
</script>
<div id='container' style="direction:rtl" align="right">
      <h2 class="header">صندوق پیام های ارسالی<span class="header-line"></span></h2>
	  <!-- <h3 class="note">جستجوی دانش آموز بر اساس فیلد انتخاب شده <span class="header-line"></span></h3>
     <form action='javascript:void(0);'>
      	<h3>
        	<input id='i' name='i' type='text' autocomplete="off" style="font-family:'B Nazanin'"/>
       	  جستجو بر اساس:
          			همه موارد<input id='s4' name='select' type="radio" value="همه موارد" checked="checked"/>
            نام
            <input id='s1' name='select' type="radio" value="نام"  />
            نام خانوداگي<input id='s2' name='select' type="radio" value="نام خانوداگي" />
			کد ملي<input id='s3' name='select' type="radio" value="کد ملي" />
        </h3>
      </form> -->
	  
	  
      <div id="object-browser">
		<div id="items" >
			<table class="table table-striped">
				<thead>
            		<tr>
                		<th><div align="right">موضوع</div></th>
                    	<th><div align="right">مخاطب</div></th>
                    	<th><div align="right">دسته بندی</div></th>
						<th><div align="right"></div></th>
                	</tr>
            	</thead>
				<tbody>
					<div id='wrapper'>
        				<div id='content'>
							<form  method="POST" action="point.php">
							
								<?php
									foreach($comments as $row)
									{
										
										?>
										
											<tr id='io'>
										
											
											<td>
											<?php $baseUrl = Yii::app()->request->baseUrl;	?>
											<div class='search_item1'>
													<h4  align="right" class='search_text'> 
														<?php echo $row['Subject'];?>
													</h4>
													
											</div>	
											</td>
											<td><div class='search_item2'>
            										<h4  align="right" class='search_text'>
														<?php echo $row['ReceiverMail'];?>
													</h4>
													
										  </div></td>
                    						<td><div class='search_item3'>
            										<h4  align="right" class='search_text'>
														<?php echo $row['Category'];?>
													</h4>
													
										  </div></td>
											<td><div class='search_child3'>
            										<h4 class='Child3'><a <?php echo CHtml::link('نمایش',array('site/showMessage','commentId'=>$row['commentId']));?></a></h4>
													
											</div></td>
											
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