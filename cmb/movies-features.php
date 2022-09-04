<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_movies' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_movies( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'cmb_movies_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['movies_metabox'] = array(
		'id'         => 'movies_metabox',
		'title'      => __( 'مواصفات وتفاصيل الفيلم', 'cmb' ),
		'pages'      => array( 'movies', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
			array(
				'name'    => __( 'وصف الفيلم', 'cmb' ),
				'desc'    => __( 'أدخل معلومات عن الفيلم او البرنامج', 'cmb' ),
				'id'      => $prefix . 'about',
				'type'    => 'wysiwyg',
				'options' => array( 'textarea_rows' => 5, ),
			),
			array(
				'name'         => __( 'صور الفيلم', 'cmb' ),
				'desc'         => __( 'قم برفع صور للعرض في صفحة الفيلم [ScreenShots].', 'cmb' ),
				'id'           => $prefix . 'gallery',
				'type'         => 'file_list',
				'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
			),
			array(
				'name' => __( 'تقييم الفيلم الرسمي', 'cmb' ),
				'desc' => __( 'استخدم تقييم IMDB أو TV.com', 'cmb' ),
				'id'   => $prefix . 'rate',
				'type' => 'text',
				// 'repeatable' => true,
			),
			array(
				'name' => __( 'إضافة في المكتبة المميزة', 'cmb' ),
				'desc' => __( 'إذا أحببت ظهور الفيلم في قائمة المكتبة المميزة [السلايدر]', 'cmb' ),
				'id'   => $prefix . 'featured',
				'type' => 'checkbox',
				// 'repeatable' => true,
			),
		),
	);
	
	$meta_boxes['movies_servers'] = array(
		'id'         => 'movies_servers',
		'title'      => __( 'سيرفرات الفيلم', 'cmb' ),
		'pages'      => array( 'movies', ),
		'fields'     => array(
			array(
				'id'          => $prefix . 'servers_group',
				'type'        => 'group',
				'options'     => array(
					'group_title'   => __( 'سيرفر {#}', 'cmb' ), // {#} gets replaced by row number
					'add_button'    => __( 'سيرفر جديد', 'cmb' ),
					'remove_button' => __( 'حذف سيرفر', 'cmb' ),
					'sortable'      => true, // beta
				),
				// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
				'fields'      => array(
					array(
						'name'    => __( 'كود الفيديو', 'cmb' ),
						'desc'    => __( 'اختر نوع الفيديو', 'cmb' ),
						'id'      => $prefix . 'vedioservers',
						'type'    => 'select',
						'options' => array(
							'player' 	 => __( 'المشغل الإفتراضي', 'cmb' ),
							'embed'     => __( 'embed', 'cmb' ),
							'okru'     => __( 'Ok.ru', 'cmb' ),
							'youtube'	 => __( 'YouTube', 'cmb' ),
							'vimeo' 	 => __( 'Vimeo', 'cmb' ),
						),
					),
					array(
						'name' => __( 'كود او رابط', 'cmb' ),
						'desc' => __( 'أدخل كود الفيديو إذا كان اختيارك Embed أو ادخل الرابط فقط إذا كان لأحد الخيارات الأخرى', 'cmb' ),
						'id'   => $prefix . 'embed',
						'type' => 'textarea_code',
					),
				),
			),
		),
	);
	
	$meta_boxes['movies_download'] = array(
		'id'         => 'movies_download',
		'title'      => __( 'روابط تحميل الفيلم', 'cmb' ),
		'pages'      => array( 'movies', ),
		'fields'     => array(
			array(
				'id'          => $prefix . 'download_group',
				'type'        => 'group',
				'options'     => array(
					'group_title'   => __( 'رابط {#}', 'cmb' ), // {#} gets replaced by row number
					'add_button'    => __( 'رابط جديد', 'cmb' ),
					'remove_button' => __( 'حذف رابط', 'cmb' ),
					'sortable'      => true, // beta
				),
				// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
				'fields'      => array(
					array(
						'name'    => __( 'اسم الرابط', 'cmb' ),
						'desc'    => __( 'المحتوى النصي الذي سيظهر في صفحة المشاهدة لسيرفر التحميل', 'cmb' ),
						'id'      => $prefix . 'downloadname',
						'type'    => 'text',
					),
					array(
						'name'    => __( 'رابط التحميل', 'cmb' ),
						'desc'    => __( 'اكتب رابط التحميل كاملا، بداية من http://', 'cmb' ),
						'id'      => $prefix . 'downloadlink',
						'type'    => 'text',
					),
				),
			),
		),
	);

	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_movies', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_movies() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}
