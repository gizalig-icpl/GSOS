<?php

require 'vendor/autoload.php';

$provider = new Stevenmaguire\OAuth2\Client\Provider\Keycloak([
    'authServerUrl'         => 'http://localhost:8080',
    'realm'                 => 'gsos',
    'clientId'              => 'gsosclient',
    'clientSecret'          => 'ARRwIFvLSnix4GmmEpcYducTiXeqodzw',
    'redirectUri'           => 'http://localhost/gsos/',
    'version'               => '20.0.1',                            // optional
]);