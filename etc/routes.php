<?php

return array(

    '/' => array(
        'Albums',
    ),

    '/test/' => array(
        'Test',
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