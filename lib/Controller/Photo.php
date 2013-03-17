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

        $ids = array_keys(array_filter($ids));
        if (empty($ids)) {
            return AjaxResponse();
        }

        switch ($action) {
            case 'star':
                return $this->_doStar($ids);
            case 'unstar':
                return $this->_doUnstar($ids);
            case 'remove':
                return $this->_doRemove($ids);
            default:
                return Response()->error404();
        }
    }

    protected function _doStar(array $ids)
    {
        $lPhotos = new L_Photos(array('id' => $ids));

        foreach ($lPhotos as $mPhoto) {
            /** @var $mPhoto M_Photo */

            $mPhoto->rate = 100;
            $mPhoto->save();
        }

        $historyId = History::add(
            History::MODEL_PHOTO,
            $ids,
            array('rate' => 0)
        );

        return AjaxResponse()->assign('historyId', $historyId);
    }

    protected function _doUnstar(array $ids)
    {
        $lPhotos = new L_Photos(array('id' => $ids));

        foreach ($lPhotos as $mPhoto) {
            /** @var $mPhoto M_Photo */

            $mPhoto->rate = 0;
            $mPhoto->save();
        }

        $historyId = History::add(
            History::MODEL_PHOTO,
            $ids,
            array('rate' => 100)
        );

        return AjaxResponse()->assign('historyId', $historyId);
    }

    protected function _doRemove(array $ids)
    {
        $lPhotos = new L_Photos(array('id' => $ids));

        foreach ($lPhotos as $mPhoto) {
            /** @var $mPhoto M_Photo */

            $mPhoto->is_active = false;
            $mPhoto->save();
        }

        $historyId = History::add(
            History::MODEL_PHOTO,
            $ids,
            array('is_active' => true)
        );

        return AjaxResponse()->assign('historyId', $historyId);
    }
}