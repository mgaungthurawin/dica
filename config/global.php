<?php

return [
	"STATUS_ACTIVE" => 1,
	"STATUS_INACTIVE" => 0,
	"PRODUCT_UPLOAD" => 16,
	"CATEGORY_UPLOAD" => 17,
	"NEW_UPLOAD" => 18,
	"COMPANY_UPLOAD" => 19,
	"MEDIA_PATH" => [
		16 => 'upload/product',
		17 => 'upload/category',
		18 => 'upload/news',
		19 => 'upload/company'
	],
	"MEDIA_TYPE" => [
		'image' => array('field_name' => 'image_media', 'extension' => array("jpg", "png", "jpeg"), 'max_size' => 50000000000)
	]
];