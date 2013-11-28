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
?>
<script type='text/javascript'>
	$().ready(function(){$('#i').focus()});// focus search area
</script>
<div id='container' style="direction:rtl" align="right">
      <h2 class="header">لیست دانش آموزان مدرسه<span class="header-line"></span></h2>
	  <h3 class="note">جستجوی دانش آموز بر اساس فیلد انتخاب شده <span class="header-line"></span></h3>
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
							<form  method="POST" action="point1.php">
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
											<td><div class='search_item2'>
            										<h4 align="right" class='search_text'>
														<?php echo $row['stFamily'];?>
													</h4>
													
										  </div></td>
                    						<td><div class='search_item3'>
            										<h4 align="right" class='search_text'>
														<?php echo $row['stCode'];?>
													</h4>
													
										  </div></td>
											<td><div class='search_child3'>
            										<h4 class='Child3'><a href="http://localhost/skykey/protected/views/site/point1.php?StCode=<?php echo $row['stCode'];?>" >امتيازدهي</a></h4>
													
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