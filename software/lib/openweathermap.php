<?php

function owmTemperature() {
    $res = array('error' => false, 'debug' => array());

    $query = http_build_query(array(
        'units' => 'metric',
        'lat' => _LAT_,
        'lon' => _LON_,
        'appid' => _OPEN_WEATHER_MAP_KEY_));
    $opts = array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://api.openweathermap.org/data/2.5/weather?' . $query);
    $curl = curl_init();
    curl_setopt_array($curl, $opts);
    $body = curl_exec($curl);
    curl_close($curl);
    $json = json_decode($body, true);

    if (!$json) {
        $res['error'] = 'request';
        return $res;
    }
    $res['debug']['weather'] = $json;

    if (!$json['main']['temp']) {
        $res['error'] = 'response';
        return $res;
    }

    $res['temperature'] = round($json['main']['temp'], 1);

    return $res;
}

?>