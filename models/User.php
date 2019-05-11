<?php

namespace app\models;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $jabatan;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];

    public function __construct($config = [])
    {
        parent::__construct($config);
        // $all_user = MasterUser::find()->asArray()->all();
        $all_user = MasterUser::find()->all();
        self::$users = [];
        foreach ($all_user as $key => $value) {
         self::$users[$value['username']] = $value ;   
        }
        // echo "<pre>";
        // print_r(self::$users);
        // exit(__LINE__.'@@'.__FILE__);
    }


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $all_user = MasterUser::find()->asArray()->all();
        self::$users = [];
        foreach ($all_user as $key => $value) {
         self::$users[$value['username']] = $value ;   
        }
        
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        // $all_user = MasterUser::find()->asArray()->all();
        // self::$users = [];
        // foreach ($all_user as $key => $value) {
        //  self::$users[$value['username']] = $value ;   
        // }
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    public function getJabatan()
    {
        return $this->Jabatan;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
