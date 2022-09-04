<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_gallery' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_gallery( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'cmb_gallery_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['gallery_metabox'] = array(
		'id'         => 'gallery_metabox',
		'title'      => __( 'صور الألبوم', 'cmb' ),
		'pages'      => array( 'gallery', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
			array(
				'name'         => __( 'صور الألبوم', 'cmb' ),
				'id'           => $prefix . 'gallery',
				'type'         => 'file_list',
				'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
			),
		),
	);

	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_gallery', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_gallery() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}
