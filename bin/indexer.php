#!/usr/bin/env php
<?php

include dirname(__FILE__) . '/../lib/__init.php';
define('DIRECTORY', ROOT_DIR . '/www/photos');

recursiveReadDir('');

function recursiveReadDir($dir, $parent_id = null) {
    $dirname = DIRECTORY . $dir;
    $dd = opendir($dirname);
    while ($file = readdir($dd)) {
        if ($file == '.' || $file == '..') {
            continue;
        } elseif (is_file($dirname . '/' . $file)) {

            $hash = md5_file($dirname . '/' . $file);
            $mPhotos = new L_Photos(
                array(
                     'name' => $file,
                     'hash' => $hash,
                     'album_id' => $parent_id,
                )
            );

            if (!$mPhotos->length) {
                $mPhoto = new M_Photo();
            } else {
                foreach ($mPhotos as $mPhoto) {
                    break;
                }
                if ($mPhoto->hash == $hash) {
                    continue;
                }
            }

            $meta = getimagesize($dirname . '/' . $file);
            if (!$meta || strpos($meta['mime'], 'image/') !==0) {
                continue;
            }


            $mPhoto->created_at = date(DATE_W3C, filemtime($dirname . '/' . $file));
            $mPhoto->hash = $hash;
            $mPhoto->name = $file;
            $mPhoto->album_id = $parent_id;
            $mPhoto->size = filesize($dirname . '/' . $file);
            $mPhoto->width = $meta[0];
            $mPhoto->height = $meta[1];

            try {
                U_Image::makeThumbs($dirname . '/' . $file);
                $mPhoto->save();
            } catch (Exception $e) {
                echo 'ERROR: ' . $e->getMessage() ."\n";
            }

        } else {

            echo $dir . '/' . $file ."\n";

            $mAlbums = new L_Albums(
                array(
                     'name' => $file,
                     'parent_id' => $parent_id,
                )
            );

            if (!$mAlbums->length) {
                $mAlbum = new M_Album();
            } else {
                foreach ($mAlbums as $mAlbum) {
                    break;
                }
            }

            /** @var $mAlbum M_Album */

            $mAlbum->created_at = date(DATE_W3C, filemtime($dirname . '/' . $file));
            $mAlbum->name = $file;
            $mAlbum->parent_id = $parent_id;

            $album_id = $mAlbum->save();

            recursiveReadDir($dir . '/' . $file, $album_id);

            try {
                U_Image::makeBulks($album_id);
            } catch (Exception $e) {
                echo 'ERROR: ' . $e->getMessage() . "\n";
            }

        }
    }
}