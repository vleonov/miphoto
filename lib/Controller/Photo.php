<?php

class C_Photo extends Controller
{

    public function save()
    {
        if (empty($_POST['ids']) || empty($_POST['action'])) {
            return Response()->error404();
        }

        $ids = array_filter($_POST['ids']);
        if (empty($ids)) {
            return AjaxResponse();
        }

        switch ($_POST['action']) {
            case 'star':
                return $this->_doStar();
            case 'remove':
                return $this->_doRemove();
            default:
                return Response()->error404();
        }
    }

    protected function _doStar()
    {
        return AjaxResponse()->assign('message', 'Starred');
    }
}