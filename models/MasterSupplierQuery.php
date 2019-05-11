<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MasterSupplier]].
 *
 * @see MasterSupplier
 */
class MasterSupplierQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return MasterSupplier[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return MasterSupplier|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
