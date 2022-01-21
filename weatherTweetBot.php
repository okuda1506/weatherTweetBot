<?php
require __DIR__ . '/ca-bundle-main/src/CaBundle.php';
// TwitterOAuthを利用するためautoload.phpを読み込み
require __DIR__ . '/twitteroauth-main/autoload.php';
//東京の天気予報API読込
require_once 'weather_api.php';
// TwitterOAuthクラスをインポート
use Abraham\TwitterOAuth\TwitterOAuth;
// Twitter APIを利用するための認証情報
const TW_CK = 'ZgfxAdB1w1ton8BcmgpZTcEF3'; // Consumer Key
const TW_CS = 'XwSswOlSKjKn1oswB4CQuHkUilHqJxfacsomxl5SysT5KJBcyf'; // Consumer Secret
const TW_AT = '1484113791071637504-hjZt8pCkOrO9eOvTh9dWnH4vyrdbsF'; // Access Token
const TW_ATS = 'xQnAJNc3fZNylMqrCQl68meVYtOHU4sAdBS1nSLvICxKE'; // Access Token Secret
// TwitterOAuthクラスのインスタンスを作成
$connect = new TwitterOAuth( TW_CK, TW_CS, TW_AT, TW_ATS );
// ツイート文字列セット
$tweet; //初期化
$tweet = $text;
// ツイート
$result = $connect->post(
    'statuses/update',
    array(
        'status' => $tweet
    )
); 
