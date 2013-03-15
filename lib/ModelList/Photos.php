<?php

class L_Photos extends ModelList
{
    protected $_tblName = 'photo';
    protected $_modelClass = 'Photo';

    public function __construct(array $criterias = array(), array $orders = array('id DESC'), $limit = null)
    {
        if (!empty($criterias['album_id']) && is_string($criterias['album_id'])) {
            $criterias['album_id'] = hexdec($criterias['album_id']);
        }

        parent::__construct($criterias, $orders, $limit);
    }
}