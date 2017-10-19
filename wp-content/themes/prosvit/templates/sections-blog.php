<?php 
global $content;

?>
<div class="<?php echo $content['class']; ?>">
<?php
 if($content['title_class']){
 	$class = 'class="'.$content['title_class'].'"';
 }else{
 	$class = FALSE;
 }
 
echo '<'. $content['title_tag'] .' '. $class .'>'. $content['title'] .'</'. $content['title_tag'] .'>';

	 foreach($content['posts'] as $post){
	 		 $post = $post['post']; ?>

		<div class="<?php echo $post->post_type.' '.$post->ID; ?>">
			<h4>
				<?php echo $post->post_title; ?>
			</h4>
			<article>
				<?php echo $post->post_content; ?>
			</article>
		</div>
 
 	<?php	} ?>
	
</div>