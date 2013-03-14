<?php

class Controller
{
    protected $_uri;
    private $_oTemplate;
    private $_assignedData = array();

    public function __construct(array $uri)
    {
        $this->_uri = $uri;
        $this->_oTemplate = new Template;
    }

    final public function error404()
    {
        header("HTTP/1.0 404 Not Found");
        $this->_display('404.tpl');
    }

    final protected function _assign($r, $value = null)
    {
        if (is_array($r)) {
            $this->_assignedData = $r + $this->_assignedData;
        } else {
            $this->_assignedData[$r] = $value;
        }

        return $this;
    }

    final protected function _display($template)
    {
        $this->_oTemplate
            ->assign($this->_assignedData)
            ->display($template);
    }

    final protected function _ajaxResponse()
    {
        header('Content-type: application/json');
        echo json_encode($this->_assignedData);
    }
}