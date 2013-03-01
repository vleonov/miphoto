<?php

class ControllerAlbums extends Controller
{

    public function main()
    {
        if (!empty($this->_uri[2])) {
            $mAlbum = new Album($this->_uri[2]);
            $parents = $mAlbum->getParents();
        } else {
            $parents = array();
        }

        $names = array();
        $breadcrumbs = array();
        foreach ($parents as $mParent) {
            $names[] = $mParent->name;
            $breadcrumbs[] = $mParent;
        }

        $lAlbums = new AlbumList(
            array('parent_id' => F::is($this->_uri[2])),
            array('name ASC')
        );
        $lPhotos = new PhotoList(
            array('album_id' => F::is($this->_uri[2])),
            array('rate DESC', 'created_at ASC')
        );

        $this->_assign(
            array(
                 'albums' => $lAlbums,
                 'photos' => $lPhotos,
                 'prefix' => implode('/', $names),
                 'breadcrumbs' => $breadcrumbs,
            )
        )->_display('index.tpl');

    }
}