<?php


$config = array(

	// Server name
	'server_name' => '4M XITERS',
	
	
	'price' => array(
	
		'x86' => array(
			'1UID' => 1,
			'2UID' => 2,
		),
		
		'regedit' => array(
			'1UID' => 1,
			'2UID' => 2,
		),
		
		'script' => array(
			'1UID' => 1,
			'2UID' => 2,
		),
		
		'injetor' => array(
			'1UID' => 1,
			'2UID' => 2,
		),
	),
	
	// MSSQL settings
	'db' => array(
		// DB Connections
		'game' => array(
			'host' => 'localhost',
			'user' => 'u999974013_4m',
			'pass' => 'Black@20345',
			'name' => 'u999974013_4m',
		),
	),

	// ReCaptcha v2
	// https://www.google.com/recaptcha/admin
	'recaptcha' => array(

		// Public key
		'public_key' => '6LfFEHgrAAAAAGkl6dPw_5rG9LtGdyO8U3J4z_iR',

		// Private key
		'private_key' => '6LfFEHgrAAAAAB5k6RvRgPhSk40yuxTDNpbyuxaW
',
	),
	
	// Configurações de contas
	'registration' => array(

		// Numero maximo de contas no mesmo email
		'max_email' => 1,

		// Se precisa ativar conta pelo link no email
		'activation' => false,

	),


	// SMTP settings (email) 
	'smtp' => array(
		
		// Login (e-mail)
		'login' => 'xxxxx',
		
		// Password
		'password' => 'xxxxx',
		
		// SMTP server host
		'host' => 'xxxxxx',
		
		// SMTP server port
		'port' => '465',

	),

	// Number of news per page
	'news_on_page' => 6,

	// Number of downloads per page
	'download_on_page' => 5,
	
	// PayPal settings
	'paypal' => array(
		
		// Sandbox mode
		'debug' => true,
			
		// API version
		// https://developer.paypal.com/docs/classic/release-notes/merchant/PayPal_Merchant_API_Release_Notes_204/
		'api_version' => '204.0',
			
		// Seller e-mail
		'seller_email' => 'sb-rp4bg6005928_api1.business.example.com',
			
		// Seller password
		'seller_password' => '55FY9YRU9QB39SB7',
			
		// Seller signature
		// // https://www.sandbox.paypal.com/businessprofile/mytools/apiaccess/firstparty/signature
		'seller_signature' => 'AUI2iofegp-wLjvJ-XGDRgTeICLaABjRVGgn7O7vBPxtDH-GuMy8FUtq',
			
		// Currency
		// https://ru.wikipedia.org/wiki/ISO_4217
		'currency' => 'USD',
	),
	
	// OAuth settings
	'oauth' => array(
		
		// Google
		// https://console.developers.google.com/apis/credentials/oauthclient/
		'google' => array(
			'app_name' => 'Cliente Web 1',
			'client_id' => '386107043130-8ccp28r0a092rb76fd9gd8pn6fksi8ot.apps.googleusercontent.com',
			'client_secret' => 'vo8tptY0NGWzDFZKW9B608Pi',
		),
		
		// Facebook
		// https://developers.facebook.com/apps/
		'facebook' => array(
			'app_name' => 'Dolly Mods',
			'client_id' => '341676344652234',
			'client_secret' => '5b07ff5c2cd5bf72fdb10e19e1184cec',
		),
	
	),
	

);

?>