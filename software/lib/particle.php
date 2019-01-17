<?php

function particleTemperature() {
    $res = array('error' => false, 'debug' => array());

    $var = particleVar('temperature');
    if (!$var) {
        $res['error'] = 'request';
        return $res;
    }
    $res['debug']['temperature'] = $var;

    if (!$var['coreInfo']['connected']) {
        $res['error'] = 'offline';
        return $res;
    }

    if ($var['result'] == -0xff) {
        $res['error'] = 'sensor';
        $res['debug']['error'] = particleVar('error');
        return $res;
    }

    $res['temperature'] = round($var['result'], 1);

    return $res;
}

function particleVar($var) {
    $opts = array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://api.particle.io/v1/devices/' . _PARTICLE_DEVICE_ . '/' . $var,
        CURLOPT_HTTPHEADER => array('Authorization: Bearer '. _PARTICLE_TOKEN_));
    $curl = curl_init();
    curl_setopt_array($curl, $opts);
    $res = curl_exec($curl);
    curl_close($curl);
    $json = json_decode($res, true);
    return $json;
}

?>