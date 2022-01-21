<?php
require __DIR__ . '/ca-bundle-main/src/CaBundle.php';
// TwitterOAuthを利用するためautoload.phpを読み込み
require __DIR__ . '/twitteroauth-main/autoload.php';
//東京の天気予報API読込
require_once 'weather_api.php';
// TwitterOAuthクラスをインポート
use Abraham\TwitterOAuth\TwitterOAuth;
// Twitter APIを利用するための認証情報
const TW_CK = ''; // Consumer Key
const TW_CS = ''; // Consumer Secret
const TW_AT = ''; // Access Token
const TW_ATS = ''; // Access Token Secret
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
