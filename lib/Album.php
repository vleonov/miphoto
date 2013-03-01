<?php

class Album extends Model {

    protected $_tblName = 'album';

    public function setFromArray(array $data)
    {
        if (isset($data['id'])) {
            $data['url'] = $data['name'] . '/' . dechex($data['id']);
        }

        if (!empty($data['path'])) {
            $data['path'] = $this->_oDb->fromArray($data['path']);
        }

        return parent::setFromArray($data);
    }

    public function getParents()
    {
        $mAlbums = new AlbumList(
            array('id' => $this->_data['path']),
            array('id ASC')
        );

        return $mAlbums;
    }

    public function getChildren()
    {
        $mAlbums = new AlbumList(
            array("path @> '{" . $this->_id . "}'::integer[]"),
            array('id DESC')
        );

        return $mAlbums;
    }

    public function save()
    {
        $url = F::is($this->_data['url']);
        unset($this->_data['url']);

        $id = parent::save();

        if ($this->_data['parent_id']) {
            $mParent = new Album($this->_data['parent_id']);
            $path = $mParent->path;
            $path[] = $id;
        } else {
            $path = array($id);
        }

        if ($path != F::is($this->_data['path'])) {
            $this->_data['path'] = $path;
            parent::save();
        }

        $this->_data['url'] = $url;

        return $id;
    }
}