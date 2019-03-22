<style>
	.btn_blank{font-size: 25px;border: 1px solid #ccc;padding: 5px 30px;text-decoration: none;margin: 10px;}
	.btn_blank:hover{font-size: 25px;border: 1px solid #fff;padding: 5px 30px;text-decoration: none;color:#fff;}
	.btn_block{font-size: 25px;padding: 5px 30px;text-decoration: none;background-color: #fff; color: #000; margin: 10px;}
	.btn_block:hover{font-size: 25px;padding: 5px 30px;text-decoration: none;background-color: #c00; color:#fff;}
	.input_black{width: 18em;height: 2em;background: #666;border: 1px solid transparent;margin: 0 .8em 0 0;padding: .2em .6em;  color: #fff;font-size: 1.3vw;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;}
	.select_black{background-color: #000;height: 45px;padding: 12px;font-weight: bold;color: #fff;}
</style>

<!-- TOP LANDING SECTION -->
<div style="height:100vh;width:100%; background-color: #141414;">
	<?php
	if ($user == 'user1')
	{
		$username 	=	$this->crud_model->get_username_of_user('user1');
		$thumb	=	'thumb1.png';
	}
	else if ($user == 'user2')
	{
		$username 	=	$this->crud_model->get_username_of_user('user2');
		$thumb	=	'thumb2.png';
	}
	else if ($user == 'user3')
	{
		$username 	=	$this->crud_model->get_username_of_user('user3');
		$thumb	=	'thumb3.png';
	}
	else if ($user == 'user4')
	{
		$username 	=	$this->crud_model->get_username_of_user('user4');
		$thumb	=	'thumb4.png';
	}
	?>
	<!-- logo -->
	<div style="float: left;">
		<a href="<?php echo base_url();?>">
			<img src="<?php echo base_url();?>/assets/global/logo.png" style="margin: 18px 40px; height: 35px;" />
		</a>
	</div>
	<div class="container">
		<div class="row">
			<form method="post" id="form" 
				action="<?php echo base_url();?>index.php?browse/editprofile/<?php echo $user;?>">
				<div class="col-lg-8 col-lg-offset-2">
					<div style="clear: both; padding-top: 100px;">
						<h1><?php echo get_phrase('Edit_Profile');?></h1>
						<hr style="border-top:1px solid #333;">
					</div>
					<div class="row">
						<div class="col-lg-3">
							<img src="<?php echo base_url();?>/assets/global/<?php echo $thumb;?>" style="height: 160px;" />
						</div>
						<div class="col-lg-9">
							<input type="text" class="input_black" placeholder="Name" value="<?php echo $username;?>" name="username" />
							<br><br>
							<!--<select class="select_black">
								<option>icon </option>
							</select>-->
						</div>
					</div>
					<hr style="border-top:1px solid #333;">
					<br>
					<a href="#" class="btn_block" onClick="submit_form()"><?php echo get_phrase('SAVE');?></a>
					<a href="<?php echo base_url();?>index.php?browse/manageprofile" class="btn_blank"><?php echo get_phrase('CANCEL');?></a>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	function submit_form()
	{
		$( "#form" ).submit();
	}
</script>