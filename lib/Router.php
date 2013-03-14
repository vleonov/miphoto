<?php

class Router {

    protected $_uri;
    protected $_routes;
    protected $_matches = array();

    public function __construct($uri = null)
    {
        if (is_null($uri)) {
            $uri = $_SERVER['REQUEST_URI'];
        }

        $uri = trim(trim($uri), '/');
        $this->_uri = $uri ? '/' . $uri . '/' : '/';

        require_once(ROOT_DIR . '/etc/routes.php');
    }

    public function proceed()
    {
        $result = null;
        foreach ($this->_routes as $reg=>$data) {
            if (!preg_match('~^' . $reg . '$~', $this->_uri, $matches)) {
                continue;
            }

            $item = each($data);

            if (is_int($item['key'])) {
                $method = 'main';
                $controller = $item['value'];
            } else {
                $method = $item['value'];
                $controller = $item['key'];
            }
            $controller = 'Controller' . $controller;
            $oController = new $controller($matches);
            $result = array($oController, $method);

            break;
        }

        return $result;
    }
}