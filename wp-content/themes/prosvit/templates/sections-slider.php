<?php 
global $content;

$module = $content['ID'];
?>
<div id="slideshow<?php echo $module; ?>" class="owl-carousel" style="opacity: 1;">
  <?php foreach ($content['slides'] as $banner) {
	if($banner['class']){
 		$class = $banner['class'];
	}else{
 		$class = FALSE;
 	} ?>
  <div class="item banner-holder <?php echo $class; ?>">
    <img src="<?php echo $banner['image']['url']; ?>" alt="<?php echo $banner['image']['title']; ?>" class="img-responsive" />
	<?php if($banner['content']){
		echo $banner['content'];
	} ?>
  </div>
  <?php } ?>
</div>
<script type="text/javascript"><!--
$('#slideshow<?php echo $module; ?>').owlCarousel({
	items: 1,
    autoplay: true,
    dots: true,
	nav: false,
    loop:true,
    margin:10
});
--></script>