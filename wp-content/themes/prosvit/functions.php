<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php', // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


require 'vendor/autoload.php';


use StoutLogic\AcfBuilder\FieldsBuilder;

// Background Settings
$backgroundSettings = new FieldsBuilder('background');
$backgroundSettings
    ->addRadio('background', ['type' => 'select', 'label' => 'Background', 'wrapper' => ['width' => 20, 'class' => 'column-xs-12' ]])
        ->addChoice('none')
        ->addChoice('color')
        ->addChoice('image')
        ->setDefaultValue('none')
    ->addImage('background_image', ['preview_size' => 'small', 'wrapper' => ['width' => 15, 'class' => 'column-xs-12' ]])
        ->conditional('background', '==', 'image')
    ->addColorPicker('background_color', ['default_value' => '#ffffff', 'wrapper' => ['width' => 20, 'class' => 'column-xs-12' ]])
        ->conditional('background', '==', 'color');



// Sections Settings
$sectionsSettings = new FieldsBuilder('sections');
$sectionsSettings
    ->addText('id', ['label' => 'ID', 'wrapper' => ['width' => 20, 'class' => 'column-xs-12' ] ])
    ->addText('class', ['label' => 'Class', 'wrapper' => ['width' => 20, 'class' => 'column-xs-12' ]])
    ->addRadio('full_width', ['label' => 'Full Width?', 'wrapper' => ['width' => 20, 'class' => 'column-xs-12' ]])
    	->addChoices('No', 'Yes')
    	->setDefaultValue('No')
    ->addFields($backgroundSettings);


// Column Section
$columns = new FieldsBuilder('section', ['label' => 'Column Section']);
$columns
    ->addFields($sectionsSettings)
    ->addRepeater('rows', ['layout' => 'block', 'jpn-tabs' => 'vertical'])
    ->addText('add_row_class', ['label' => 'Aditional Row Class', 'wrapper' => ['width' => 25, 'class' => 'column-xs-12' ] ])
    ->addRadio('add_wrapper', ['label' => 'Add Wrapper?', 'wrapper' => ['width' => 25, 'class' => 'column-xs-12' ]])
    ->addChoices('No', 'Yes')
    ->setDefaultValue('No')
    ->addText('add_wrapper_class', ['label' => 'Add Wrapper Class', 'wrapper' => ['width' => 25, 'class' => 'column-xs-12' ] ])
    ->conditional('add_wrapper', '==', 'Yes')
        ->addFlexibleContent('content')
            ->addLayout('title')
            	->addRadio('title_tag', ['type' => 'select', 'label' => 'Title Tag', 'wrapper' => ['width' => 50, 'class' => 'column-xs-6' ]])
            	->addChoices('h1', 'h2', 'h3', 'h4', 'h5', 'h6')
            	->addText('title_class', ['label' => 'Title Class', 'wrapper' => ['width' => 50, 'class' => 'column-xs-6' ]])
                ->addText('title', ['label' => 'Title text', 'wrapper' => ['width' => 100, 'class' => 'column-xs-12' ]])
            ->addLayout('text')
                ->addWysiwyg('content')
            ->addLayout('image')
<<<<<<< HEAD
            	->addText('image_class')
                ->addImage('image', ['preview_size' => 'medium'])
            ->addLayout('video')
            	->addOembed('video')
			->addLayout('blog')
				->addText('class', ['label' => 'Block Class', 'wrapper' => ['width' => 100, 'class' => 'column-xs-12' ]])
				->addRadio('title_tag', ['type' => 'select', 'label' => 'Title Tag', 'wrapper' => ['width' => 33.3, 'class' => 'column-xs-4' ]])
            	->addChoices('h1', 'h2', 'h3', 'h4', 'h5', 'h6')
            	->addText('title_class', ['label' => 'Title Class', 'wrapper' => ['width' => 33.3, 'class' => 'column-xs-4' ]])
                ->addText('title', ['label' => 'Title text', 'wrapper' => ['width' => 33.3, 'class' => 'column-xs-4' ]])
				->addRepeater('posts')
					->addPostObject('post')
			->addLayout('hero')
				->addText('title', ['wrapper' => ['width' => 50, 'class' => 'column-xs-6' ]])
				->addText('subtitle', ['wrapper' => ['width' => 50, 'class' => 'column-xs-6' ]])
				->addText('class', ['wrapper' => ['width' => 50, 'class' => 'column-xs-6' ]])
				->addFields($backgroundSettings, ['wrapper' => ['width' => 50, 'class' => 'column-xs-6' ]])
			->addLayout('slider')
			->addText('ID', ['required' => 1, 'label' => 'Slider Indificator', 'wrapper' => ['width' => 100, 'class' => 'column-xs-12' ]])
			->addRepeater('slides', ['layout' => 'block'])
        		->addText('class', ['label' => 'Slide Class', 'wrapper' => ['width' => 50, 'class' => 'column-xs-6' ]])
        		->addImage('image', ['preview_size' => 'medium', 'label' => 'Slide Image', 'wrapper' => ['width' => 50, 'class' => 'column-xs-6' ]])
            	->addWysiwyg('content', ['label' => 'Slide Content', 'wrapper' => ['width' => 100, 'class' => 'column-xs-12' ]])
        	->addLayout('tabs')
        	->addRepeater('tabs', ['layout' => 'block'])
        		->addText('title', ['label' => 'Title', 'wrapper' => ['width' => 50, 'class' => 'column-xs-6' ]])
        		->addText('class', ['label' => 'Tab Aditional Class', 'wrapper' => ['width' => 50, 'class' => 'column-xs-6' ]])
        		->addWysiwyg('content', ['label' => 'Content', 'wrapper' => ['width' => 100, 'class' => 'column-xs-12' ]])
        	->addLayout('reviews_by_post', ['layout' => 'block'])
				->addRadio('title_tag', ['type' => 'select', 'label' => 'Title Tag', 'wrapper' => ['width' => 33.3, 'class' => 'column-xs-4' ]])
            	->addChoices('h1', 'h2', 'h3', 'h4', 'h5', 'h6')
            	->addText('title_class', ['label' => 'Title Class', 'wrapper' => ['width' => 33.3, 'class' => 'column-xs-4' ]])
                ->addText('title', ['label' => 'Title text', 'wrapper' => ['width' => 33.3, 'class' => 'column-xs-4' ]])
        		->addText('block_class', ['wrapper' => ['width' => 100, 'class' => 'column-xs-12' ]])
        		->addText('review_count', ['label' => 'Number of post','wrapper' => ['width' => 50, 'class' => 'column-xs-6' ]])
				->addTaxonomy('review_category', ['wrapper' => ['width' => 50, 'class' => 'column-xs-6' ]]);
=======
                ->addImage('image', ['preview_size' => 'medium'])
            ->addLayout('Video')
            	->addOembed('video')
			->addLayout('blog')
				->addText('title')
				->addText('class')
				->addPostObject('post')
			->addLayout('hero')
				->addText('title')
				->addText('subtitle')
				->addText('class')
				->addFields($backgroundSettings)
			->addLayout('slider')
			->addRepeater('slides')
        		->addText('title')
        		->addText('class')
        		->addWysiwyg('content')
        		->addImage('image', ['preview_size' => 'medium'])
        	->addLayout('tabs')
        	->addRepeater('tab')
        		->addText('title')
        		->addText('subtitle')
        		->addText('class')
        		->addImage('image', ['preview_size' => 'medium'])
        		->addWysiwyg('content')
			->addLayout('reviews')
			->addRepeater('review')
        		->addText('title')
        		->addText('subtitle')
        		->addImage('image', ['preview_size' => 'medium'])
        		->addWysiwyg('content')
        	->addLayout('reviews_by_post')
			->addRepeater('review_by_post')
        		->addText('class')
				->addTaxonomy('review_cat');
>>>>>>> 22b1957afe7d8ad6715953deffe019e501a603ed


$content = new FieldsBuilder('page_content', ['style' => 'seamless']);
$content
    ->addFlexibleContent('sections')
        ->addLayout($columns)
    ->setLocation('post_type', '==', 'page');





add_action('acf/init', function() use ($content) {
   acf_add_local_field_group($content->build());
});
