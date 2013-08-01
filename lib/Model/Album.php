<?php

class M_Album extends Model {

    protected $_tblName = 'album';

    public function fromArray(array $data)
    {
        if (isset($data['id'])) {
            $data['url'] = $data['name'] . '/' . $data['id'];
//            $data['url'] = $data['name'] . '/' . dechex($data['id']);
        }

        if (!empty($data['path'])) {
            $data['path'] = $this->_oDb->listDecode($data['path']);
        }

        return parent::fromArray($data);
    }

    public function getParents()
    {
        $mAlbums = new L_Albums(
            array('id' => $this->_data['path']),
            array('id ASC')
        );

        return $mAlbums;
    }

    public function getChildren()
    {
        $mAlbums = new L_Albums(
            array("path LIKE '%," . $this->_id . ",%'"),
            array('id DESC')
        );

        return $mAlbums;
    }

    public function save()
    {
        $url = U_Misc::is($this->_data['url']);
        unset($this->_data['url']);

        $id = parent::save();

        if ($this->_data['parent_id']) {
            $mParent = new M_Album($this->_data['parent_id']);
            $path = $mParent->path;
            $path[] = $id;
        } else {
            $path = array($id);
        }

        if ($path != U_Misc::is($this->_data['path'])) {
            $this->_data['path'] = $path;
            parent::save();
        }

        $this->_data['url'] = $url;

        return $id;
    }

    protected function _getById($id)
    {
//        if (!is_int($id)) {
//            $id = hexdec($id);
//        }

        return parent::_getById($id);
    }

}