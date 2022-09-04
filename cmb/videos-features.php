<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_videos' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_videos( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'cmb_videos_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['videos_metabox'] = array(
		'id'         => 'videos_metabox',
		'title'      => __( 'رابط الفيديو', 'cmb' ),
		'pages'      => array( 'videos', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
			array(
				'name'    => __( 'أدخل رابط اليوتيوب على ان يبدأ من HTTP', 'cmb' ),
				'id'      => $prefix . 'youtube',
				'type'    => 'text',
			),
		),
	);
	
	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_videos', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_videos() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}
