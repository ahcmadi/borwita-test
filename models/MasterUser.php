<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_user".
 *
 * @property string $username
 * @property string $password
 * @property string $jabatan
 *
 * @property Pembelian[] $pembelians
 * @property Penjualan[] $penjualans
 */
class MasterUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'jabatan'], 'required'],
            [['username'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 100],
            [['jabatan'], 'string', 'max' => 30],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'password' => 'Password',
            'jabatan' => 'Jabatan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembelians()
    {
        return $this->hasMany(Pembelian::className(), ['dibuat_oleh' => 'username']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenjualans()
    {
        return $this->hasMany(Penjualan::className(), ['dibuat_oleh' => 'username']);
    }

    /**
     * {@inheritdoc}
     * @return MasterUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MasterUserQuery(get_called_class());
    }
}
