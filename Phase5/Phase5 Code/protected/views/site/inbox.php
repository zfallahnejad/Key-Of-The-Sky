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
				->select('Subject,commentId,SenderName,Category,Status,SendDate,SendTime')
				->from('comment')
				->where('ReceiverMail=:mail', array(':mail'=>$mail))
				->order('SendDate desc,SendTime desc')
				->query();
	
	$messCat = Yii::app()->db->createCommand()
				->select('Subject,commentId,SenderName,Category,Status,SendDate,SendTime')
				->from('comment')
				//->where('ReceiverMail=:mail', array(':mail'=>$mail))
				->where(array('and', 'ReceiverMail=:mail', 'Category=:Category'), array(':mail'=>$mail,':Category'=>'پیام'))
				->order('SendDate desc,SendTime desc')
				->query();
				
	$adviceCat = Yii::app()->db->createCommand()
				->select('Subject,commentId,SenderName,Category,Status,SendDate,SendTime')
				->from('comment')
				->where(array('and', 'ReceiverMail=:mail', 'Category=:Category'), array(':mail'=>$mail,':Category'=>'پیشنهاد'))
				->order('SendDate desc,SendTime desc')
				->query();
	
	$censCat = Yii::app()->db->createCommand()
				->select('Subject,commentId,SenderName,Category,Status,SendDate,SendTime')
				->from('comment')
				->where(array('and', 'ReceiverMail=:mail', 'Category=:Category'), array(':mail'=>$mail,':Category'=>'انتقاد'))
				->order('SendDate desc,SendTime desc')
				->query();
				
?>
<script type='text/javascript'>
	$().ready(function(){$('#i').focus()});// focus search area
</script>

 

<div class="row-fluid" style="direction:rtl" align="right">
           		<h1 class="header">صندوق پیام های دریافتی
                    <span class="header-line"></span> 
                </h1>
			
				<!--search-->
				<form action='javascript:void(0);'>
      				<h3>
        				<input id='i' name='i' type='text' autocomplete="off" style="font-family:'B Nazanin'"/>
       	  جستجو بر اساس:
          			همه موارد<input id='s4' name='select' type="radio" value="همه موارد" checked="checked"/>
            موضوع
           			 <input id='s1' name='select' type="radio" value="موضوع"  />
            ارسال کننده<input id='s2' name='select' type="radio" value="ارسال کننده" />
				   </h3>
   			   </form>
			   <!--end of search-->
				
				<ul class="nav nav-tabs pull-right" >
				  <li><a href="#advice" data-toggle="tab">پیشنهادات</a></li>
				  <li><a href="#censure" data-toggle="tab">انتقادات</a></li>
                  <li><a href="#message" data-toggle="tab">پیام ها</a></li>
                  <li class="active" ><a href="#all" data-toggle="tab">همه</a></li>
                </ul>
				
				<div class="tab-content">
					<div class="tab-pane active" id="all">
						<div id='container' style="direction:rtl" align="right">
	  						<div id="object-browser">
								<div id="items" >
			<table class="table table-striped">
				<thead>
            		<tr>
                		<th><div align="right">موضوع</div></th>
                    	<th><div align="right">ارسال کننده</div></th>
                    	<th><div align="right">دسته بندی</div></th>
						<th><div align="right">زمان ارسال</div></th>
						<th><div align="right">تاریخ ارسال</div></th>
						<th><div align="right"></div></th>
                	</tr>
            	</thead>
				<tbody>
					<div id='wrapper'>
        				<div id='content'>
							<?php
									foreach($comments as $row)
									{
										if($row['Status']==0):
										?>
										<tr id='io'>
										
											
											<td>
											<?php $baseUrl = Yii::app()->request->baseUrl;	?>
											<div class='search_item1'>
													<h4 style="color:#1e8312;font-weight:bold" align="right" class='search_text'> 
													<img src="<?php echo $baseUrl;?>/img/plus-icon-md.png" height="12" width="12" >
														
														<?php echo $row['Subject'];?>
													</h4>
													
											</div>	
											</td>
											<td><div class='search_item2'>
            										<h4 style="color:#1e8312;font-weight:bold" align="right" class='search_text'>
														<?php echo $row['SenderName'];?>
													</h4>
													
										  </div></td>
                    						<td><div class='search_item3'>
            										<h4 style="color:#1e8312;font-weight:bold" align="right" class='search_text'>
														<?php echo $row['Category'];?>
													</h4>
													
										  </div></td>
										  <td><div class='search_item4'>
            										<h4 style="color:#1e8312;font-weight:bold" align="right" class='search_text'>
														<?php echo $row['SendTime'];?>
													</h4>
													
										  </div></td>
										  
										  <td><div class='search_item5'>
            										<h4 style="color:#1e8312;font-weight:bold" align="right" class='search_text'>
														<?php echo $row['SendDate'];?>
													</h4>
													
										  </div></td>
											<td><div class='search_child3'>
            										<h4 class='Child3'><a <?php echo CHtml::link('نمایش',array('site/showMessage','commentId'=>$row['commentId']));?></a></h4>
													
											</div></td>	
											
																						
											
										</tr>
										
										<?php
											else:
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
														<?php echo $row['SenderName'];?>
													</h4>
													
										  </div></td>
                    						<td><div class='search_item3'>
            										<h4  align="right" class='search_text'>
														<?php echo $row['Category'];?>
													</h4>
													
										  </div></td>
										  <td><div class='search_item4'>
            										<h4 align="right" class='search_text'>
														<?php echo $row['SendTime'];?>
													</h4>
													
										  </div></td>
										  
										  <td><div class='search_item5'>
            										<h4 align="right" class='search_text'>
														<?php echo $row['SendDate'];?>
													</h4>
													
										  </div></td>
											<td><div class='search_child3'>
            										<h4 class='Child3'><a <?php echo CHtml::link('نمایش',array('site/showMessage','commentId'=>$row['commentId']));?></a></h4>
													
											</div></td>
											
										</tr>
										
										
									<?php
									 endif; 
									}
									?>
						</div>
					</div>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>

<div class="tab-pane" id="message">

<div id='container' style="direction:rtl" align="right">	  
      <div id="object-browser">
		<div id="items" >
			<table class="table table-striped">
				<thead>
            		<tr>
                		<th><div align="right">موضوع</div></th>
                    	<th><div align="right">ارسال کننده</div></th>
                    	<th><div align="right">دسته بندی</div></th>
						<th><div align="right">زمان ارسال</div></th>
						<th><div align="right">تاریخ ارسال</div></th>
						<th><div align="right"></div></th>
                	</tr>
            	</thead>
				<tbody>
					<div id='wrapper'>
        				<div id='content'>
							<form  method="POST" action="point.php">
							
								<?php
									foreach($messCat as $row)
									{
										if($row['Status']==0):
										?>
										<tr id='io'>
										
											
											<td>
											<?php $baseUrl = Yii::app()->request->baseUrl;	?>
											<div class='search_item1'>
													<h4 style="color:#1e8312;font-weight:bold" align="right" class='search_text'> 
													<img src="<?php echo $baseUrl;?>/img/plus-icon-md.png" height="12" width="12" >
														
														<?php echo $row['Subject'];?>
													</h4>
													
											</div>	
											</td>
											<td><div class='search_item2'>
            										<h4 style="color:#1e8312;font-weight:bold" align="right" class='search_text'>
														<?php echo $row['SenderName'];?>
													</h4>
													
										  </div></td>
                    						<td><div class='search_item3'>
            										<h4 style="color:#1e8312;font-weight:bold" align="right" class='search_text'>
														<?php echo $row['Category'];?>
													</h4>
													
										  </div></td>
										  <td><div class='search_item4'>
            										<h4 style="color:#1e8312;font-weight:bold" align="right" class='search_text'>
														<?php echo $row['SendTime'];?>
													</h4>
													
										  </div></td>
										  
										  <td><div class='search_item5'>
            										<h4 style="color:#1e8312;font-weight:bold" align="right" class='search_text'>
														<?php echo $row['SendDate'];?>
													</h4>
													
										  </div></td>
											<td><div class='search_child3'>
            										<h4 class='Child3'><a <?php echo CHtml::link('نمایش',array('site/showMessage','commentId'=>$row['commentId']));?></a></h4>
													
											</div></td>	
											
																						
											
										</tr>
										
										<?php
											else:
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
														<?php echo $row['SenderName'];?>
													</h4>
													
										  </div></td>
                    						<td><div class='search_item3'>
            										<h4  align="right" class='search_text'>
														<?php echo $row['Category'];?>
													</h4>
													
										  </div></td>
										  <td><div class='search_item4'>
            										<h4 align="right" class='search_text'>
														<?php echo $row['SendTime'];?>
													</h4>
													
										  </div></td>
										  
										  <td><div class='search_item5'>
            										<h4 align="right" class='search_text'>
														<?php echo $row['SendDate'];?>
													</h4>
													
										  </div></td>
											<td><div class='search_child3'>
            										<h4 class='Child3'><a <?php echo CHtml::link('نمایش',array('site/showMessage','commentId'=>$row['commentId']));?></a></h4>
													
											</div></td>
											
										</tr>
										
										
									<?php
									 endif; 
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


<div class="tab-pane" id="censure">

<div id='container' style="direction:rtl" align="right">	  
      <div id="object-browser">
		<div id="items" >
			<table class="table table-striped">
				<thead>
            		<tr>
                		<th><div align="right">موضوع</div></th>
                    	<th><div align="right">ارسال کننده</div></th>
                    	<th><div align="right">دسته بندی</div></th>
						<th><div align="right">زمان ارسال</div></th>
						<th><div align="right">تاریخ ارسال</div></th>
						<th><div align="right"></div></th>
                	</tr>
            	</thead>
				<tbody>
					<div id='wrapper'>
        				<div id='content'>
							<form  method="POST" action="point.php">
							
								<?php
									foreach($censCat as $row)
									{
										if($row['Status']==0):
										?>
										<tr id='io'>
										
											
											<td>
											<?php $baseUrl = Yii::app()->request->baseUrl;	?>
											<div class='search_item1'>
													<h4 style="color:#1e8312;font-weight:bold" align="right" class='search_text'> 
													<img src="<?php echo $baseUrl;?>/img/plus-icon-md.png" height="12" width="12" >
														
														<?php echo $row['Subject'];?>
													</h4>
													
											</div>	
											</td>
											<td><div class='search_item2'>
            										<h4 style="color:#1e8312;font-weight:bold" align="right" class='search_text'>
														<?php echo $row['SenderName'];?>
													</h4>
													
										  </div></td>
                    						<td><div class='search_item3'>
            										<h4 style="color:#1e8312;font-weight:bold" align="right" class='search_text'>
														<?php echo $row['Category'];?>
													</h4>
													
										  </div></td>
										  <td><div class='search_item4'>
            										<h4 style="color:#1e8312;font-weight:bold" align="right" class='search_text'>
														<?php echo $row['SendTime'];?>
													</h4>
													
										  </div></td>
										  
										  <td><div class='search_item5'>
            										<h4 style="color:#1e8312;font-weight:bold" align="right" class='search_text'>
														<?php echo $row['SendDate'];?>
													</h4>
													
										  </div></td>
											<td><div class='search_child3'>
            										<h4 class='Child3'><a <?php echo CHtml::link('نمایش',array('site/showMessage','commentId'=>$row['commentId']));?></a></h4>
													
											</div></td>	
											
																						
											
										</tr>
										
										<?php
											else:
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
														<?php echo $row['SenderName'];?>
													</h4>
													
										  </div></td>
                    						<td><div class='search_item3'>
            										<h4  align="right" class='search_text'>
														<?php echo $row['Category'];?>
													</h4>
													
										  </div></td>
										  <td><div class='search_item4'>
            										<h4 align="right" class='search_text'>
														<?php echo $row['SendTime'];?>
													</h4>
													
										  </div></td>
										  
										  <td><div class='search_item5'>
            										<h4 align="right" class='search_text'>
														<?php echo $row['SendDate'];?>
													</h4>
													
										  </div></td>
											<td><div class='search_child3'>
            										<h4 class='Child3'><a <?php echo CHtml::link('نمایش',array('site/showMessage','commentId'=>$row['commentId']));?></a></h4>
													
											</div></td>
											
										</tr>
										
										
									<?php
									 endif; 
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


<div class="tab-pane" id="advice">

<div id='container' style="direction:rtl" align="right">
      <div id="object-browser">
		<div id="items" >
			<table class="table table-striped">
				<thead>
            		<tr>
                		<th><div align="right">موضوع</div></th>
                    	<th><div align="right">ارسال کننده</div></th>
                    	<th><div align="right">دسته بندی</div></th>
						<th><div align="right">زمان ارسال</div></th>
						<th><div align="right">تاریخ ارسال</div></th>
						<th><div align="right"></div></th>
                	</tr>
            	</thead>
				<tbody>
					<div id='wrapper'>
        				<div id='content'>
							<form  method="POST" action="point.php">
							
								<?php
									foreach($adviceCat as $row)
									{
										if($row['Status']==0):
										?>
										<tr id='io'>
										
											
											<td>
											<?php $baseUrl = Yii::app()->request->baseUrl;	?>
											<div class='search_item1'>
													<h4 style="color:#1e8312;font-weight:bold" align="right" class='search_text'> 
													<img src="<?php echo $baseUrl;?>/img/plus-icon-md.png" height="12" width="12" >
														
														<?php echo $row['Subject'];?>
													</h4>
													
											</div>	
											</td>
											<td><div class='search_item2'>
            										<h4 style="color:#1e8312;font-weight:bold" align="right" class='search_text'>
														<?php echo $row['SenderName'];?>
													</h4>
													
										  </div></td>
                    						<td><div class='search_item3'>
            										<h4 style="color:#1e8312;font-weight:bold" align="right" class='search_text'>
														<?php echo $row['Category'];?>
													</h4>
													
										  </div></td>
										  <td><div class='search_item4'>
            										<h4 style="color:#1e8312;font-weight:bold" align="right" class='search_text'>
														<?php echo $row['SendTime'];?>
													</h4>
													
										  </div></td>
										  
										  <td><div class='search_item5'>
            										<h4 style="color:#1e8312;font-weight:bold" align="right" class='search_text'>
														<?php echo $row['SendDate'];?>
													</h4>
													
										  </div></td>
											<td><div class='search_child3'>
            										<h4 class='Child3'><a <?php echo CHtml::link('نمایش',array('site/showMessage','commentId'=>$row['commentId']));?></a></h4>
													
											</div></td>	
											
																						
											
										</tr>
										
										<?php
											else:
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
														<?php echo $row['SenderName'];?>
													</h4>
													
										  </div></td>
                    						<td><div class='search_item3'>
            										<h4  align="right" class='search_text'>
														<?php echo $row['Category'];?>
													</h4>
													
										  </div></td>
										  <td><div class='search_item4'>
            										<h4 align="right" class='search_text'>
														<?php echo $row['SendTime'];?>
													</h4>
													
										  </div></td>
										  
										  <td><div class='search_item5'>
            										<h4 align="right" class='search_text'>
														<?php echo $row['SendDate'];?>
													</h4>
													
										  </div></td>
											<td><div class='search_child3'>
            										<h4 class='Child3'><a <?php echo CHtml::link('نمایش',array('site/showMessage','commentId'=>$row['commentId']));?></a></h4>
													
											</div></td>
											
										</tr>
										
										
									<?php
									 endif; 
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
</div>