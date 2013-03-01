<?php

require_once(ROOT_DIR . '/lib/Smarty/Smarty.class.php');

class Template extends Smarty
{

    public function __construct()
    {
        parent::__construct();

        $this->setTemplateDir(ROOT_DIR . '/view/')
            ->setCompileDir(ROOT_DIR . '/var/compiled/');
    }
}