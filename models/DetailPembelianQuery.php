<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DetailPembelian]].
 *
 * @see DetailPembelian
 */
class DetailPembelianQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DetailPembelian[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DetailPembelian|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
