<?php 
global $content;
 ?>
<div class="<?php echo($content['class'] ? $content['class'] : ''); ?>"
	<?php	if($content['background'] == 'color'){
			echo 'style="background-color:'. $content['background_color'] .';"';
		} elseif($content['background'] == 'image'){
			echo 'style="background-image:url('. $content['background_image']['url'] .');"';
		} ?>
>
	<?php 
	if($content['title']){
		echo '<h3 class="title">'. $content['title'] .'</h3>';
	}
	if($content['subtitle']){
		echo '<p class="sub_title">'. $content['subtitle'] .'</p>';
	}
	?>	
</div>

