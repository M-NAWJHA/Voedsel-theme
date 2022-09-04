<?php

$blocks[] = array(
	'name' => 	__( 'general-setting', 'biz' ),
	'id' => 	  'home-block'
);
$sections[] =  array(
	'name' => 	  __( 'general-setting', 'biz' ),
	'id' => 		'general-setting',
	'block_id' =>  'home-block',
	'type' => 'normal'
);
	$sections[] =  array(
		'name' => 	  __( 'Logo-Haeder', 'biz' ),
		'id' => 		'logo-headline',
		'block_id' =>  'home-block',
		'type' => 'normal'
	);


		$fields[] =  array(
			'label' => 		 __( 'upload', 'biz' ),
			'section_id' => 	'logo-headline',
			'id' => 			'logo-upload',
			'type' => 		  	'upload',
		);
	
		$sections[] =  array(
			'name' => 	  __( 'Logo-footer', 'biz' ),
			'id' => 		'logo-footer',
			'block_id' =>  'home-block',
			'type' => 'normal'
		);
	
	
			$fields[] =  array(
				'label' => 		 __( 'upload', 'biz' ),
				'section_id' => 	'logo-footer',
				'id' => 			'logo-f-upload',
				'type' => 		  	'upload',
			);
$blocks[] = array(
	'name' => 	__( 'contact-info', 'biz' ),
	'id' => 	  'contact-block'
);

	$sections[] =  array(
		'name' => 	  __( 'contact-info', 'biz' ),
		'id' => 		'contact-headline',
		'block_id' =>  'contact-block',
		'type' => 'normal'
	);

		
		$fields[] =  array(
			'label' => 		 __( 'phone', 'biz' ),
			'section_id' => 	'contact-headline',
			'id' => 			'phonenum',
			'type' => 		  	'text'
		);
		
		$fields[] =  array(
			'label' => 		 __( 'email', 'biz' ),
			'section_id' => 	'contact-headline',
			'id' => 			'emailaddress',
			'type' => 		  	'text'
		);
		
		$fields[] =  array(
			'label' => 		 __( 'address', 'biz' ),
			'section_id' => 	'contact-headline',
			'id' => 			'localaddress',
			'type' => 		  	'text'
		);
		
		$fields[] =  array(
			'label' => 		 __( 'google map address', 'biz' ),
			'section_id' => 	'contact-headline',
			'id' => 			'googlemapaddress',
			'type' => 		  	'text'
		);
/**slider*/
$blocks[] = array(
	'name' => 	__( 'home-slider', 'biz' ),
	'id' => 	  'slider-block'
);

	$sections[] =  array(
		'name' => 	  __( 'home-slider', 'biz' ),
		'id' => 		'slider',
		'block_id' =>  'slider-block',
		'type' => 'normal'
	);
/**slider-1*/
	$sections[] =  array(
		'name' => 	  __( 'slider-1', 'biz' ),
		'id' => 		'slider-1',
		'block_id' =>  'slider-block',
		'type' => 'normal'
	);
		
		$fields[] =  array(
			'label' => 		 __( 'title', 'biz' ),
			'section_id' => 	'slider-1',
			'id' => 			'sl1-h4',
			'type' => 		  	'text'
		);
		$fields[] =  array(
			'label' => 		 __( 'image URL', 'biz' ),
			'section_id' => 	'slider-1',
			'id' => 			'sl1-img',
			'type' => 		  	'text',
		);
		$fields[] =  array(
			'label' => 		 __( 'description', 'biz' ),
			'section_id' => 	'slider-1',
			'id' => 			'sl1-p',
			'type' => 		  	'textarea'
		);
		$fields[] =  array(
			'label' => 		 __( 'link', 'biz' ),
			'section_id' => 	'slider-1',
			'id' => 			'sl1-link',
			'type' => 		  	'text'
		);
/**slider-2*/
$sections[] =  array(
	'name' => 	  __( 'slider-2', 'biz' ),
	'id' => 		'slider-2',
	'block_id' =>  'slider-block',
	'type' => 'normal'
);
	
	$fields[] =  array(
		'label' => 		 __( 'title', 'biz' ),
		'section_id' => 	'slider-2',
		'id' => 			'sl2-h4',
		'type' => 		  	'text'
	);
	$fields[] =  array(
		'label' => 		 __( 'image URL', 'biz' ),
		'section_id' => 	'slider-2',
		'id' => 			'sl2-img',
		'type' => 		  	'text',
	);
	$fields[] =  array(
		'label' => 		 __( 'description', 'biz' ),
		'section_id' => 	'slider-2',
		'id' => 			'sl2-p',
		'type' => 		  	'textarea'
	);
	$fields[] =  array(
		'label' => 		 __( 'link', 'biz' ),
		'section_id' => 	'slider-2',
		'id' => 			'sl2-link',
		'type' => 		  	'text'
	);
/**slider-3*/
$sections[] =  array(
	'name' => 	  __( 'slider-3', 'biz' ),
	'id' => 		'slider-3',
	'block_id' =>  'slider-block',
	'type' => 'normal'
);
	
	$fields[] =  array(
		'label' => 		 __( 'title', 'biz' ),
		'section_id' => 	'slider-3',
		'id' => 			'sl3-h4',
		'type' => 		  	'text'
	);
	$fields[] =  array(
		'label' => 		 __( 'image URL', 'biz' ),
		'section_id' => 	'slider-3',
		'id' => 			'sl3-img',
		'type' => 		  	'text',
	);
	$fields[] =  array(
		'label' => 		 __( 'description', 'biz' ),
		'section_id' => 	'slider-3',
		'id' => 			'sl3-p',
		'type' => 		  	'textarea'
	);
	$fields[] =  array(
		'label' => 		 __( 'link', 'biz' ),
		'section_id' => 	'slider-3',
		'id' => 			'sl3-link',
		'type' => 		  	'text'
	);
/**home-aboutus*/
$blocks[] = array(
	'name' => 	__( 'home-aboutus', 'biz' ),
	'id' => 	  'home-aboutus-block'
);

	$sections[] =  array(
		'name' => 	  __( 'home-aboutus', 'biz' ),
		'id' => 		'home-aboutus',
		'block_id' =>  'home-aboutus-block',
		'type' => 'normal'
	);
	$fields[] =  array(
		'label' => 		 __( 'image URL', 'biz' ),
		'section_id' => 	'home-aboutus',
		'id' => 			'home-aboutus-img',
		'type' => 		  	'text',
	);
	$fields[] =  array(
		'label' => 		 __( 'title', 'biz' ),
		'section_id' => 	'home-aboutus',
		'id' => 			'home-aboutus-h4',
		'type' => 		  	'text'
	);
	$fields[] =  array(
		'label' => 		 __( 'description', 'biz' ),
		'section_id' => 	'home-aboutus',
		'id' => 			'home-aboutus-p',
		'type' => 		  	'textarea'
	);
	$fields[] =  array(
		'label' => 		 __( 'link', 'biz' ),
		'section_id' => 	'home-aboutus',
		'id' => 			'home-aboutus-link',
		'type' => 		  	'text'
	);
/**home-Offer*/
$blocks[] = array(
	'name' => 	__( 'home-Offer', 'biz' ),
	'id' => 	  'home-Offer-block'
);

	$sections[] =  array(
		'name' => 	  __( 'home-Offer', 'biz' ),
		'id' => 		'home-Offer',
		'block_id' =>  'home-Offer-block',
		'type' => 'normal'
	);
	$fields[] =  array(
		'label' => 		 __( 'image URL', 'biz' ),
		'section_id' => 	'home-Offer',
		'id' => 			'home-Offer-img',
		'type' => 		  	'text',
	);
	$fields[] =  array(
		'label' => 		 __( 'title-Offer', 'biz' ),
		'section_id' => 	'home-Offer',
		'id' => 			'home-Offer-h2',
		'type' => 		  	'text'
	);
	$fields[] =  array(
		'label' => 		 __( 'title-1', 'biz' ),
		'section_id' => 	'home-Offer',
		'id' => 			'home-Offer1-h4',
		'type' => 		  	'text'
	);
	$fields[] =  array(
		'label' => 		 __( 'description-1', 'biz' ),
		'section_id' => 	'home-Offer',
		'id' => 			'home-Offer1-p',
		'type' => 		  	'textarea'
	);
	$fields[] =  array(
		'label' => 		 __( 'title-2', 'biz' ),
		'section_id' => 	'home-Offer',
		'id' => 			'home-Offer2-h4',
		'type' => 		  	'text'
	);
	$fields[] =  array(
		'label' => 		 __( 'description-2', 'biz' ),
		'section_id' => 	'home-Offer',
		'id' => 			'home-Offer2-p',
		'type' => 		  	'textarea'
	);
	$fields[] =  array(
		'label' => 		 __( 'More URL', 'biz' ),
		'section_id' => 	'home-Offer',
		'id' => 			'home-Offer-More',
		'type' => 		  	'text'
	);
/*
	$sections[] =  array(
		'name' => 	  __( 'نموذج البحث', 'biz' ),
		'id' => 		'search-headline',
		'block_id' =>  'home-block',
		'type' => 'normal'
	);


		$fields[] =  array(
			'label' => 		 __( 'تفعيل', 'biz' ),
			'section_id' => 	'search-headline',
			'id' => 			'search-on-off',
			'type' => 		  	'on-off'
		);

		$fields[] =  array(
			'label' => 		 __( 'النص في مربع البحث', 'biz' ),
			'section_id' => 	'search-headline',
			'id' => 			'search-text',
			'type' => 		  	'text'
		);
		
	$sections[] =  array(
		'name' => 	  __( 'عن الموقع', 'biz' ),
		'id' => 		'about-headline',
		'block_id' =>  'home-block',
		'type' => 'normal'
	);

		
		$fields[] =  array(
			'label' => 		 __( 'أدخل معلومات عن الموقع لتظهر في الفوتر', 'biz' ),
			'section_id' => 	'about-headline',
			'id' => 			'aboutsitetext',
			'type' => 		  'textarea'
		);
		
		
$blocks[] = array(
	'name' => 	__( 'الشبكات الإجتماعية', 'biz' ),
	'id' => 	  'social-block'
);

	$sections[] =  array(
		'name' => 	  __( 'أدخل روابط الشبكات الإجتماعية', 'biz' ),
		'id' => 		'social-headline',
		'block_id' =>  'social-block',
		'type' => 'normal'
	);

		
		$fields[] =  array(
			'label' => 		 __( 'يرجى وضع رابط الحساب كاملا، بداية من http://', 'biz' ),
			'section_id' => 	'social-headline',
			'id' => 			'social-note',
			'type' => 		  'note'
		);

		$fields[] =  array(
			'label' => 		 __( 'فيسبوك', 'biz' ),
			'section_id' => 	'social-headline',
			'id' => 			'fb',
			'type' => 		  	'text'
		);

		$fields[] =  array(
			'label' => 		 __( 'تويتر', 'biz' ),
			'section_id' => 	'social-headline',
			'id' => 			'tw',
			'type' => 		  	'text'
		);

		$fields[] =  array(
			'label' => 		 __( 'جوجل بلص', 'biz' ),
			'section_id' => 	'social-headline',
			'id' => 			'gp',
			'type' => 		  	'text'
		);

		$fields[] =  array(
			'label' => 		 __( 'يوتيوب', 'biz' ),
			'section_id' => 	'social-headline',
			'id' => 			'yt',
			'type' => 		  	'text'
		);

		$fields[] =  array(
			'label' => 		 __( 'انستجرام', 'biz' ),
			'section_id' => 	'social-headline',
			'id' => 			'ins',
			'type' => 		  	'text'
		);


$blocks[] = array(
	'name' => 	__( 'الإحصائيات بالرئيسية', 'biz' ),
	'id' => 	  'stats-block'
);

	$sections[] =  array(
		'name' => 	  __( 'نصوص بلوك الإحصائيات', 'biz' ),
		'id' => 		'stats-maintitle',
		'block_id' =>  'stats-block',
		'type' => 'normal'
	);
		
		$fields[] =  array(
			'label' => 		 __( 'عنوان البلوك', 'biz' ),
			'section_id' => 	'stats-maintitle',
			'id' => 			'statsmaintitle',
			'type' => 		  	'text'
		);
		
		$fields[] =  array(
			'label' => 		 __( 'المحتوى الوصفي للبلوك', 'biz' ),
			'section_id' => 	'stats-maintitle',
			'id' => 			'statsmaintext',
			'type' => 		  	'textarea'
		);

	$sections[] =  array(
		'name' => 	  __( 'أدخل العنوان ثم الرقم', 'biz' ),
		'id' => 		'stats-headline',
		'block_id' =>  'stats-block',
		'type' => 'normal'
	);
		
		$fields[] =  array(
			'label' => 		 __( 'نص خيار 1', 'biz' ),
			'section_id' => 	'stats-headline',
			'id' => 			'optiononetext',
			'type' => 		  	'text'
		);
		$fields[] =  array(
			'label' => 		 __( 'رقم خيار 1', 'biz' ),
			'section_id' => 	'stats-headline',
			'id' => 			'optiononenum',
			'type' => 		  	'text'
		);
		
		$fields[] =  array(
			'label' => 		 __( 'نص خيار 2', 'biz' ),
			'section_id' => 	'stats-headline',
			'id' => 			'optiontwotext',
			'type' => 		  	'text'
		);
		$fields[] =  array(
			'label' => 		 __( 'رقم خيار 2', 'biz' ),
			'section_id' => 	'stats-headline',
			'id' => 			'optiontwonum',
			'type' => 		  	'text'
		);
		
		$fields[] =  array(
			'label' => 		 __( 'نص خيار 3', 'biz' ),
			'section_id' => 	'stats-headline',
			'id' => 			'optionthreetext',
			'type' => 		  	'text'
		);
		$fields[] =  array(
			'label' => 		 __( 'رقم خيار 3', 'biz' ),
			'section_id' => 	'stats-headline',
			'id' => 			'optionthreenum',
			'type' => 		  	'text'
		);
		
		$fields[] =  array(
			'label' => 		 __( 'نص خيار 4', 'biz' ),
			'section_id' => 	'stats-headline',
			'id' => 			'optionfourtext',
			'type' => 		  	'text'
		);
		$fields[] =  array(
			'label' => 		 __( 'رقم خيار 4', 'biz' ),
			'section_id' => 	'stats-headline',
			'id' => 			'optionfournum',
			'type' => 		  	'text'
		);
		 */
		
?>