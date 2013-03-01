<?php

class Controller
{
    protected $_uri;
    private $_oTemplate;

    public function __construct(array $uri)
    {
        $this->_uri = $uri;
        $this->_oTemplate = new Template;
    }

    final protected function _assign(array $r)
    {
        $this->_oTemplate->assign($r);
        return $this;
    }

    final protected function _display($template)
    {
        $this->_oTemplate->display($template);
    }
}