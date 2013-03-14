<?php

class ControllerPhoto extends Controller
{

    public function save()
    {
        if (empty($_POST['ids']) || empty($_POST['action'])) {
            return $this->error404();
        }

        $ids = array_filter($_POST['ids']);
        if (empty($ids)) {
            return $this->_ajaxResponse();
        }

        switch ($_POST['action']) {
            case 'star':
                return $this->_doStar();
            case 'remove':
                return $this->_doRemove();
            default:
                return $this->error404();
        }
    }

    protected function _doStar()
    {
        $this->_assign('message', 'Starred')
            ->_ajaxResponse();
    }
}