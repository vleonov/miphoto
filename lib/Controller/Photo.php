<?php

class C_Photo extends Controller
{

    public function save()
    {
        $ids = Request()->ids;
        $action = Request()->action;

        if (!$ids || !$action) {
            return Response()->error404();
        }

        $ids = array_filter($ids);
        if (empty($ids)) {
            return AjaxResponse();
        }

        switch ($action) {
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