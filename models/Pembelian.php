<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pembelian".
 *
 * @property string $kode_pembelian
 * @property string $tanggal_pembelian
 * @property string $kode_supplier
 * @property double $total_biaya
 * @property string $tanggal_dibuat
 * @property string $dibuat_oleh
 *
 * @property DetailPembelian[] $detailPembelians
 * @property MasterBarang[] $kodeBarangs
 * @property MasterUser $dibuatOleh
 * @property MasterSupplier $kodeSupplier
 */
class Pembelian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pembelian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_pembelian', 'tanggal_pembelian', 'kode_supplier', 'total_biaya'
            , 'tanggal_dibuat', 'dibuat_oleh'
            ], 'required'],
            [['tanggal_pembelian', 'tanggal_dibuat'], 'safe'],
            [['total_biaya'], 'number'],
            [['kode_pembelian', 'kode_supplier', 'dibuat_oleh'], 'string', 'max' => 50],
            [['kode_pembelian'], 'unique'],
            // [['dibuat_oleh'], 'exist', 'skipOnError' => true, 'targetClass' => MasterUser::className(), 'targetAttribute' => ['dibuat_oleh' => 'username']],
            // [['kode_supplier'], 'exist', 'skipOnError' => true, 'targetClass' => MasterSupplier::className(), 'targetAttribute' => ['kode_supplier' => 'kode_supplier']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode_pembelian' => 'Kode Pembelian',
            'tanggal_pembelian' => 'Tanggal Pembelian',
            'kode_supplier' => 'Kode Supplier',
            'total_biaya' => 'Total Biaya',
            'tanggal_dibuat' => 'Tanggal Dibuat',
            'dibuat_oleh' => 'Dibuat Oleh',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailPembelians()
    {
        return $this->hasMany(DetailPembelian::className(), ['kode_pembelian' => 'kode_pembelian']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeBarangs()
    {
        return $this->hasMany(MasterBarang::className(), ['kode_barang' => 'kode_barang'])->viaTable('detail_pembelian', ['kode_pembelian' => 'kode_pembelian']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDibuatOleh()
    {
        return $this->hasOne(MasterUser::className(), ['username' => 'dibuat_oleh']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeSupplier()
    {
        return $this->hasOne(MasterSupplier::className(), ['kode_supplier' => 'kode_supplier']);
    }

    /**
     * {@inheritdoc}
     * @return PembelianQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PembelianQuery(get_called_class());
    }
}
