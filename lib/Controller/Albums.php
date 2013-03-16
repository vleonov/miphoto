<?php

class C_Albums extends Controller
{

    public function main()
    {
        if (Request()->args(2)) {
            $mAlbum = new M_Album(Request()->args(2));
            if (!$mAlbum->id) {
                return Response()->error404();
            }

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

        $lAlbums = new L_Albums(
            array('parent_id' => Request()->args(2)),
            array('name ASC')
        );
        $lPhotos = new L_Photos(
            array(
                 'album_id' => Request()->args(2),
                 'is_active' => true,
            ),
            array('rate DESC', 'created_at ASC')
        );

        return Response()
            ->assign(
                array(
                     'albums' => $lAlbums,
                     'photos' => $lPhotos,
                     'prefix' => implode('/', $names),
                     'breadcrumbs' => $breadcrumbs,
                )
            )->fetch('index.tpl');

    }
}