<?php 
global $content;
?>
<div class="tabs">
	<ul class="nav nav-tabs">
		<?php $count_h = 0;
		foreach($content['tabs'] as $tab_h){ ?>
			<li <?php if($count_h == 0){ echo 'class="active"'; }?>><a data-toggle="tab" href="#<?php echo $count_h; ?>"><?php echo $tab_h['title']; ?></a></li>
		<?php $count_h++; }
		?>
	</ul>

	<div class="tab-content">
		<?php $count_c = 0;
		foreach($content['tabs'] as $tab_c){ ?>
			<div id="<?php echo $count_c; ?>" class="tab-pane <?php if($count_c == 0){ echo 'active'; }else{echo 'fade in';} if($tab_c['class']){ echo ' '.$tab_c['class'];}?>">
				<h3><?php echo $tab_c['title']; ?></h3>
    			<?php echo $tab_c['content']; ?>
  			</div>
		<?php $count_c++; } ?>
	</div>

</div>

