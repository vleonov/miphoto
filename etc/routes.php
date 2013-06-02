<?php

return array(

    '/' => array(
        'Albums',
    ),

    '/test/' => array(
        'Test',
    ),
    '/info/' => array(
        'Info',
    ),

    '/login/' => array(
        'Auth' => 'login',
    ),
    '/logout/' => array(
        'Auth' => 'logout',
    ),
    '/login/gauth/' => array(
        'Auth' => 'gauthCallback',
    ),

    '/photo/save/' => array(
        'Photo' => 'save'
    ),
    '/history/cancel/([\d\w]+)/' => array(
        'History' => 'cancel'
    ),
    '/([^/]+)/([^/]+)/' => array(
        'Albums',
    ),
);