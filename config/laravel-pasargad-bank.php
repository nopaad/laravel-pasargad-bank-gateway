<?php
return [
	/*
	|--------------------------------------------------------------------------
	| MAGFA SMS Configuration
	|--------------------------------------------------------------------------
	|
	*/
	'merchant' => env('PASARGAD_MERCHANT_CODE'),
	'terminal' => env('PASARGAD_TERMINAL_ID'),
	'private_key' => env('PASARGAD_PRIVATE_KEY'),
	'url' => env('PASARGAD_URL', 'https://pep.shaparak.ir/gateway.aspx'),
];