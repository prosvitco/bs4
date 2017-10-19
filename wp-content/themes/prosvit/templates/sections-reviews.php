<?php 
global $content;

?>
<div class="<?php if($content['block_class']){ echo $content['block_class'];} ?>">

<?php 
 if($content['title_class']){
 	$class = 'class="'.$content['title_class'].'"';
 }else{
 	$class = FALSE;
 }
 	
echo '<'. $content['title_tag'] .' '. $class .'>'. $content['title'] .'</'. $content['title_tag'] .'>';
if($content['review_category'] && $content['review_count']){
		$args = array(
		'numberposts' => $content['review_count'],
		'category'    => $content['review_category'],
		'orderby'     => 'date',
		'order'       => 'ASC',
		'include'     => array(),
		'exclude'     => array(),
		'meta_key'    => '',
		'meta_value'  =>'',
		'post_type'   => 'post',
	);
	$posts = get_posts( $args );

	foreach($posts as $post){ setup_postdata($post); ?>
	<article>
	<?php 	get_template_part('templates/content', 'page'); ?>	
	</article>
    
<?php }

	wp_reset_postdata();
} ?>
	
</div>
