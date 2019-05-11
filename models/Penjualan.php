<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penjualan".
 *
 * @property string $kode_penjualan
 * @property string $tanggal_penjualan
 * @property string $kode_pelanggan
 * @property double $total_biaya
 * @property string $tanggal_dibuat
 * @property string $dibuat_oleh
 *
 * @property DetailPenjualan[] $detailPenjualans
 * @property MasterBarang[] $kodeBarangs
 * @property MasterPelanggan $kodePelanggan
 * @property MasterUser $dibuatOleh
 */
class Penjualan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penjualan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_penjualan', 'tanggal_penjualan', 'kode_pelanggan', 'total_biaya', 'tanggal_dibuat', 'dibuat_oleh'], 'required'],
            [['tanggal_penjualan', 'tanggal_dibuat'], 'safe'],
            [['total_biaya'], 'number'],
            [['kode_penjualan', 'kode_pelanggan', 'dibuat_oleh'], 'string', 'max' => 50],
            [['kode_penjualan'], 'unique'],
            [['kode_pelanggan'], 'exist', 'skipOnError' => true, 'targetClass' => MasterPelanggan::className(), 'targetAttribute' => ['kode_pelanggan' => 'kode_pelanggan']],
            [['dibuat_oleh'], 'exist', 'skipOnError' => true, 'targetClass' => MasterUser::className(), 'targetAttribute' => ['dibuat_oleh' => 'username']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode_penjualan' => 'Kode Penjualan',
            'tanggal_penjualan' => 'Tanggal Penjualan',
            'kode_pelanggan' => 'Kode Pelanggan',
            'total_biaya' => 'Total Biaya',
            'tanggal_dibuat' => 'Tanggal Dibuat',
            'dibuat_oleh' => 'Dibuat Oleh',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailPenjualans()
    {
        return $this->hasMany(DetailPenjualan::className(), ['kode_penjualan' => 'kode_penjualan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeBarangs()
    {
        return $this->hasMany(MasterBarang::className(), ['kode_barang' => 'kode_barang'])->viaTable('detail_penjualan', ['kode_penjualan' => 'kode_penjualan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodePelanggan()
    {
        return $this->hasOne(MasterPelanggan::className(), ['kode_pelanggan' => 'kode_pelanggan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDibuatOleh()
    {
        return $this->hasOne(MasterUser::className(), ['username' => 'dibuat_oleh']);
    }

    /**
     * {@inheritdoc}
     * @return PenjualanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PenjualanQuery(get_called_class());
    }
}
