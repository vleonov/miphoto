<?php

$this->_routes = array(

    '/' => array(
        'Albums',
    ),
    '/photo/save/' => array(
        'Photo' => 'save'
    ),
    '/([^/]+)/([^/]+)/' => array(
        'Albums',
    ),
);