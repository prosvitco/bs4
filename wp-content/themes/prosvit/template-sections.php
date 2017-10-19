<?php
/**
 * Template Name: Custom Sections
 */

// ACF Section
$sections = get_field('sections');
if(!empty($sections)){
	
	foreach($sections as $section){ ?>
		
		<section <?php 
		 echo ($section['id'] ? 'id="' .$section['id']. '"' : '');
		 echo ($section['class'] ? 'class="'.$section['class']. '"': '');
		if($section['background'] == 'color'){
			echo 'style="background-color:'. $section['background_color'] .';"';
		} elseif($section['background'] == 'image'){
			echo 'style="background-image:url('. $section['background_image']['url'] .');"';
		}
		?> >
		
		<?php echo($section['full_width'] == 'No' ? '<div class="container">' : '<div class="full-width">'); 
		
		 if($section['rows']){
		 	
		 	foreach($section['rows'] as $row) { ?>
				
				<div class="<?php if($section['full_width'] == 'No'){ echo 'row ';}  if($row['add_row_class']){ echo $row['add_row_class']; } ?>">
				<?php if($row['add_wrapper'] == "Yes"){echo '<div class="'.$row['add_wrapper_class'].'">';} ?>
					
					<?php if($row['content']){
						
					foreach($row['content'] as $content) { 
						switch($content['acf_fc_layout']){
							case 'title':
								get_template_part('templates/sections', 'title');
								break;
							case 'text':
								get_template_part('templates/sections', 'text');
								break;
							case 'image':
								get_template_part('templates/sections', 'image');
								break;
							case 'video':
								get_template_part('templates/sections', 'video');
								break;
							case 'blog':
								get_template_part('templates/sections', 'blog');
								break;
							case 'hero':
								get_template_part('templates/sections', 'hero');
								break;
							case 'slider':
								get_template_part('templates/sections', 'slider');
								break;
							case 'tabs':
								get_template_part('templates/sections', 'tabs');
								break;
							case 'reviews_by_post':
								get_template_part('templates/sections', 'reviews');
								break;
						}
					
					 }	
					 
					} ?>
					
				<?php echo($row['add_wrapper'] == "Yes" ? '</div>' : ''); ?>				
				</div>
				
		 <?php }
			
		} ?>
			
							
		</div>
		
		</section>
		
<?php }
	
}
