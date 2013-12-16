    <?php
		$baseUrl = Yii::app()->request->baseUrl;
	?>
	<script type='text/javascript'>
		$().ready(function(){$('#i')});// focus search area
	</script>
		<h2 class="header">لیست مساجد شرکت کننده<span class="header-line"></span></h2>
	  	<h3 class="note">جستجوی مسجد بر اساس فیلد انتخاب شده <span class="header-line"></span></h3>
		<div id='container' style="direction:rtl" align="right">
		<form action='javascript:void(0);'>
      	<h3>
        	<input id='i' name='i' type='text' autocomplete="off" style="font-family:'B Nazanin'"/>
       	  جستجو بر اساس:
          	همه موارد<input id='s4' name='select' type="radio" value="همه موارد" checked="checked"/>
            نام مسجد<input id='s1' name='select' type="radio" value="نام مسجد"  />
            نام خانوداگي مسئول مسجد<input id='s2' name='select' type="radio" value="نام خانوداگي مسئول مسجد" />
			آدرس<input id='s3' name='select' type="radio" value="آدرس" />
        </h3>
      	</form>
		<?php
		$mosques = Yii::app()->db->createCommand()
				->select('Id,mosqueName,family,mosqueAddress,status')
				->from('mosqueculturalliablee')
				->order('status')
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
						<th><div align="right"></div>وضعیت</th>
						<th><div align="right"></div></th>
                	</tr>
            	</thead>
				<tbody>
					<div id='wrapper'>
        				<div id='content'>
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
													<?php if($row['status'] == 1)
													{
														echo 'تاییدشده';
													}
															if($row['status'] == 0)
													{
														echo 'تاییدنشده';
													}
														
													;?>
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
						</div>
					</div>
				</tbody>
			</table>
		</div>
	</div>
	</div>