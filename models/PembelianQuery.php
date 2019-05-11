<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Pembelian]].
 *
 * @see Pembelian
 */
class PembelianQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Pembelian[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Pembelian|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
