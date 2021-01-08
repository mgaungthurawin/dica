<?php

return [
	"STATUS_ACTIVE" => 1,
	"STATUS_INACTIVE" => 0,
	"PRODUCT_UPLOAD" => 16,
	"CATEGORY_UPLOAD" => 17,
<<<<<<< HEAD
	"NEW_UPLOAD" => 18,
	"MEDIA_PATH" => [
		16 => 'upload/product',
		17 => 'upload/category',
		18 => 'upload/news'
=======
	"COMPANY_UPLOAD" => 18,
	"MEDIA_PATH" => [
		16 => 'upload/product',
		17 => 'upload/category',
		18 => 'upload/company',
>>>>>>> 4497d1d1d9ba0a1b029f68ea72818b86e22ef65f
	],
	"MEDIA_TYPE" => [
		'image' => array('field_name' => 'image_media', 'extension' => array("jpg", "png", "jpeg"), 'max_size' => 50000000000)
	]
];