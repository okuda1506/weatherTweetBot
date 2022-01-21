<?php
//気象庁APIで東京の気象情報取得
$url = "https://www.jma.go.jp/bosai/forecast/data/forecast/130000.json";

// JSONをデコード
$weather_json = file_get_contents($url);
$weather_array = json_decode($weather_json, true);

//情報取得
$date = $weather_array["0"]["timeSeries"]["0"]["timeDefines"]["0"];
$jma_weather = $weather_array["0"]["timeSeries"]["0"]["areas"]["0"]["weathers"]["0"];
$pops = $weather_array["0"]["timeSeries"]["1"]["areas"]["1"]["pops"]["0"];
$tempsMax = $weather_array["1"]["timeSeries"]["1"]["areas"]["0"]["tempsMax"]["1"];
$tempsMin = $weather_array["1"]["timeSeries"]["1"]["areas"]["0"]["tempsMin"]["1"];

//output
// $todayDate = "日時：" . date('Y年m月d日',  strtotime($date)) . "\n";
$todayDate = "今日の東京の天気" . PHP_EOL . PHP_EOL;
$todayWeather = "天気：" . $jma_weather . PHP_EOL;
$todayPops = "降水確率：" . $pops . "％"  . PHP_EOL;
$todayTempsMax = "最高気温：" . $tempsMax . "℃" . PHP_EOL;
$todayTempsMin = "最低気温：" . $tempsMin . "℃" . PHP_EOL ;

//傘いるorいらない
$integer = intval($pops);
$umbrella; 
switch($integer){
  case $integer <= 20:
    $umbrella = '傘ありなし：なしよりのなし'; 
    break;
  
  case $integer > 20 && $integer <= 40:
    $umbrella = '傘ありなし：なしよりのあり'; 
    break;
  
  case $integer > 40 && $integer <= 60:
    $umbrella = '傘ありなし：ありよりのなし'; 
    break;

  case $integer > 60:
    $umbrella = '傘ありなし：ありよりのあり'; 
    break;

    default:
    $umbrella = '傘ありなし：分かんね';
}

//投稿文作成
$array = array(
  $todayDate,
  $todayWeather,
  $todayPops,
  $todayTempsMax,
  $todayTempsMin,
  $umbrella
);
$text;
foreach($array as $str){
  $text = $text . $str;
}
?>
