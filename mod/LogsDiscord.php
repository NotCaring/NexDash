<?php 

function DiscordLogs($USUARIO,$IP,$VERSAO){

$url = "https://discord.com/api/webhooks/1086072056841523200/PnMgWY-zQAEmjG3OHyqsbcFIduNhGFoQ8f7TI9H4LaQRZ7cRN6h6BBMtJShXqE2j5EH7";
$hookObject = json_encode([
    "username" => "Logs Painel",
    "avatar_url" => "https://infinityofc.com/Downloads/assets/img/iconi_menu.png",
    "tts" => false,
    "embeds" => [
        [
            "title" => "INFINITY TEAM LOGS",
            "type" => "rich",
            "description" => "",
            "color" => hexdec( "00ffff" ),
            "thumbnail"=> [
             "url"=>  "https://infinityofc.com/Downloads/assets/img/iconi_menu.png"
         ],
            "footer" => [
                "text" => "INFINITY TEAM",
            ],
			"fields" => [
				[
					"name" => "Usuário",
					"value" => "$USUARIO",
					"inline" => true
				],
				[
                    "name" => "IP",
                    "value" => "$IP",
                    "inline" => true
                ],
				[

                   "name" => "VERSÂO",
                   "value" => "$VERSAO",
                   "inline" => false
                ]
			]
		]
	]
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

$ch = curl_init($url);
curl_setopt_array( $ch, [
    CURLOPT_HTTPHEADER => ["Content-Type: application/json"],
	CURLOPT_HEADER => true,
	CURLOPT_POST => true,
	CURLOPT_POSTFIELDS => $hookObject,
	CURLOPT_RETURNTRANSFER => true
]);
$response = curl_exec($ch);


}

?>