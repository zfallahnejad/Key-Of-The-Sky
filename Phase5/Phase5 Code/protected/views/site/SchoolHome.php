<?php
	$this->pageTitle=Yii::app()->name . ' - Mosque Liable';
	$this->breadcrumbs=array(
		'Liable', );
	$mail=Yii::app()->user->name;
	$schoolId =Yii::app()->db->createCommand()
		    ->select ('schoolId')
		    ->from('school')
		    ->where('email=:mail', array(':mail'=>$mail))
            ->queryScalar();
	$students = Yii::app()->db->createCommand()
				->select('stName,stFamily,stCode')
				->from('student')
				->where('schoolId=:schoolId', array(':schoolId'=>$schoolId))
				->query();
	$userId = Yii::app()->user->getId();
	$act = Yii::app()->db->createCommand()
				->select('actId,actTopic,actPoint')
				->from('refrencepoint')
				->where('userId=:userId',array('userId'=>$userId))
				->order('actId')
				->query();
	$colact = Yii::app()->db->createCommand()
				->select('actId,actTopic,actPoint')
				->from('refrencepoint')
				->where('userId=:userId && collective !=0',array('userId'=>$userId))
				->order('actId')
				->query();
?>
<script type='text/javascript'>
	$().ready(function(){$('#i').focus()});// focus search area
</script>
<div class="row-fluid" style="direction:rtl" align="right">
	<h1 class="header">امتیازدهی
    	<span class="header-line"></span> 
    </h1>
	<ul class="nav nav-tabs pull-right" >
    	<li><a href="#popular" data-toggle="tab">امتیازدهی جمعی</a></li>
        <li class="active" ><a href="#individual" data-toggle="tab">امتیازدهی فردی</a></li>
    </ul>
	<div class="tab-content">
    	<div class="tab-pane active" id="individual">
			<div id='container' style="direction:rtl" align="right">
      			<h2 class="header">لیست دانش آموزان مدرسه<span class="header-line"></span></h2>
	  			<h3 class="note">جستجوی دانش آموز بر اساس فیلد انتخاب شده </h3>
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
      			</form>
      			<div id="object-browser">
					<div id="items" >
						<table class="table table-striped">
							<thead>
            					<tr>
                					<th><div align="right">نام</div></th>
                    				<th><div align="right">نام خانوادگی</div></th>
                    				<th><div align="right">کد ملی</div></th>
									<th><div align="right"></div></th>
                				</tr>
            					</thead>
								<tbody>
									<div id='wrapper'>
        								<div id='content'>
										<?php
											foreach($students as $row)
											{
											?>
												<tr id='io'>
													<td>
														<div class='search_item1'>
            												<h4 align="right" class='search_text'>
																<?php echo $row['stName'];?>
															</h4>
														</div>	
													</td>
													<td>
														<div class='search_item2'>
            												<h4 align="right" class='search_text'>
																<?php echo $row['stFamily'];?>
															</h4>
														</div>
													</td>
                    								<td>
														<div class='search_item3'>
            												<h4 align="right" class='search_text'>
																<?php echo $row['stCode'];?>
															</h4>
														</div>
													</td>
													<td>
														<div class='search_child3'>
            												<h4 class='Child3'>
																<a <?php echo CHtml::link('امتیازدهی',array('site/givePoint','stCode'=>$row['stCode']));?></a></h4>
														</div>
													</td>
												</tr>
												<?php
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
            <div class="tab-pane" id="popular">
				  	<div id='container' style="direction:rtl" align="right">
      					<h2 class="header">لیست فعالیت ها<span class="header-line"></span></h2>
	  					<div id="object-browser">
							<div id="items" >
								<table class="table table-striped">
									<thead>
            						<tr>
                						<th><div align="right">عنوان فعالیت</div></th>
                    					<th><div align="right">امتیاز</div></th>
                    					<th><div align="right"></div></th>
                					</tr>
            						</thead>
									<tbody>
										<div id='wrapper'>
        									<div id='content'>
												<?php
													foreach($act as $row1)
													{
													?>
													<tr>
														<td>
															<h4 align="right">
																<?php echo $row1['actTopic'];?>
															</h4>
														</td>
														<td>
															<h4 align="right">
																<?php echo $row1['actPoint'];?>
															</h4>
														</td>
														<td>
															<h4><a <?php echo CHtml::link('امتیازدهی',array('site/CollectiveScoring','actId'=>$row1['actId']));?></a></h4>
														</td>
													</tr>
													<?php
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
</div><!--/row-fluid-->
<hr>
<br>
<h2 class="header">ثبت فعالیت جمعی
   	<span class="header-line"></span> 
</h2>
<div class="row-fluid" style="direction:rtl" align="right">
	<h3 class="header">لیست فعالیت های جمعی</h3>
	<div id="object-browser">
		<div id="items">
			<table class="table table-striped">
				<thead>
            		<tr>
                		<th><div align="right">عنوان فعالیت</div></th>
                		<th><div align="right">امتیاز</div></th>
                		<th><div align="right"></div></th>
					</tr>
            	</thead>
				<tbody>
					<div id='wrapper'>
        				<div id='content'>
							<?php
								foreach($colact as $row1)
								{
								?>
									<tr>
										<td>
											<h4 align="right">
												<?php echo $row1['actTopic'];?>
											</h4>
										</td>
										<td>
											<h4 align="right">
												<?php echo $row1['actPoint'];?>
											</h4>
										</td>
										<td>
											<h4><a <?php echo CHtml::link('ثبت فعالیت',array('site/CollectiveAction','actId'=>$row1['actId']));?></a></h4>
										</td>
									</tr>
								<?php
								}
							?>
						</div>
					</div>
				</tbody>
			</table>	
		</div>
	</div>
</div><!--/row-fluid-->		