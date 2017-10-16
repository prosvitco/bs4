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
  'lib/prosvit/optimize.php' // WP optimization
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
    ->addRadio('background', ['type' => 'select', 'label' => 'Background', 'wrapper' => ['width' => 25, 'class' => 'column-xs-12' ]])
        ->addChoice('none')
        ->addChoice('color')
        ->addChoice('image')
        ->setDefaultValue('none')
    ->addImage('background_image', ['preview_size' => 'small', 'wrapper' => ['width' => 15, 'class' => 'column-xs-12' ]])
        ->conditional('background', '==', 'image')
    ->addColorPicker('background_color', ['default_value' => '#ffffff', 'wrapper' => ['width' => 25, 'class' => 'column-xs-12' ]])
        ->conditional('background', '==', 'color');



// Sections Settings
$sectionsSettings = new FieldsBuilder('sections');
$sectionsSettings
    ->addText('id', ['label' => 'ID', 'wrapper' => ['width' => 25, 'class' => 'column-xs-12' ] ])
    ->addText('class', ['label' => 'Class', 'wrapper' => ['width' => 25, 'class' => 'column-xs-12' ]])
    ->addFields($backgroundSettings);


// Column Section
$columns = new FieldsBuilder('columns', ['label' => 'Column Section']);
$columns
    ->addFields($sectionsSettings)
    ->addRepeater('columns', ['layout' => 'block', 'jpn-tabs' => 'vertical'])
        ->addFlexibleContent('content')
            ->addLayout('title')
                ->addText('title')
            ->addLayout('text')
                ->addWysiwyg('content')
            ->addLayout('image')
                ->addImage('image', ['preview_size' => 'medium']);


$content = new FieldsBuilder('page_content', ['style' => 'seamless']);
$content
    ->addFlexibleContent('sections')
        ->addLayout($columns)
    ->setLocation('post_type', '==', 'page');





add_action('acf/init', function() use ($content) {
   acf_add_local_field_group($content->build());
});