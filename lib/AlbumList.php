<?php

class AlbumList extends ModelList
{
    protected $_tblName = 'album';
    protected $_modelClass = 'Album';

    public function __construct(array $criterias = array(), array $orders = array('id ASC'))
    {
        if (!empty($criterias['parent_id']) && is_string($criterias['parent_id'])) {
            $criterias['parent_id'] = hexdec($criterias['parent_id']);
        }

        parent::__construct($criterias, $orders);
    }
}