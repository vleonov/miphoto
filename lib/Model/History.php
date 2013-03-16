<?php

/**
 * @property string $id
 * @property int $model
 * @property array $ids
 * @property array $values
 * @property string $created_at
 */
class M_History extends Model {

    protected $_tblName = 'history';

    public function __set($property, $value)
    {
        if ($property == 'values') {
            $value = json_encode($value);
        }

        return parent::__set($property, $value);
    }

    public function __get($property)
    {
        $value = parent::__get($property);

        if ($property == 'values') {
            $value = json_decode($value, true);
        }

        return $value;
    }

    public function fromArray(array $data)
     {
         if (!empty($data['ids'])) {
             $data['ids'] = $this->_oDb->arrayDecode($data['ids']);
         }

         return parent::fromArray($data);
     }

    protected function _getById($id)
    {
        $sql = "SELECT * FROM %s WHERE id=%s";
        $sql = sprintf(
            $sql,
            $this->_tblName,
            $this->_oDb->escape($id)
        );

        $res = $this->_oDb->query($sql);
        if (!$res->rowCount()) {
            return false;
        }

        $this->fromArray($res->fetch());
        return true;
    }
}