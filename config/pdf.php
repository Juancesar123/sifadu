<?php

return [
	'mode'                  => 'utf-8',
	'format'                => 'A4',
	'author'                => '',
	'subject'               => '',
	'keywords'              => '',
	'creator'               => '',
	'display_mode'          => 'fullpage',
	'font_path' 			=> base_path('resources/fonts/'),
	'font_data' 			=> [
		'Source Sans Pro' => [
			'R'  => 'SourceSansPro-Regular.ttf',    
			'B'  => 'SourceSansPro-Bold.ttf', 
			'I'  => 'SourceSansPro-Italic.ttf',      
			'BI' => 'SourceSansPro-BoldItalic.ttf',
		]
	],
	'default_font' 		    => 'Source Sans Pro',
	'tempDir'               => base_path('../temp/')
];
