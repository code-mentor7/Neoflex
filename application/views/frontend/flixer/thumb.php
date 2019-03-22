<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/hovercss/demo.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/hovercss/set1.css" />
<style>
	.movie_thumb{}
	.btn_opaque{font-size:20px; border: 1px solid #939393;text-decoration: none;margin: 10px;background-color: rgba(0, 0, 0, 0.74); color: #fff;}
	.btn_opaque:hover{border: 1px solid #939393;text-decoration: none;background-color: rgba(57, 57, 57, 0.74);color:#fff;}
</style>
<figure class="effect-sadie col-lg-2 col-md-4 col-sm-6">
	<img src="<?php echo $thumb;?>" alt="img02"/>
	<figcaption>
		<p>
			<img src="<?php echo base_url();?>/assets/frontend/<?php echo $selected_theme;?>/images/play.png" style="width:60px;"/>
			<br>
			<span style="font-size: 20px;">
			<?php echo $title;?>
			</span>
		</p>
		<a href="<?php echo $link;?>">View more</a>
	</figcaption>
</figure>