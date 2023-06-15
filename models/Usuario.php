<?php

namespace app\models;

use Yii;

class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    // ... outros métodos e propriedades ...

    public static function tableName()
    {
        return 'usuario';
    }

    public function rules()
    {
        return [
            [['Login', 'Senha', 'Nome'], 'string', 'max' => 255],
            ['Senha', 'validateSenha'],
        ];
    }

    public function validateSenha($attribute, $params)
    {
        $senha = $this->$attribute;
        
        if (strlen($senha) < 5 || !preg_match('/[a-zA-Z0-9]/', $senha)) {
            $this->addError($attribute, 'A senha deve ter pelo menos 5 caracteres e conter pelo menos 1 caractere.');
        }
    }

    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Login' => 'Login',
            'Senha' => 'Senha',
            'Nome' => 'Nome',
        ];
    }

    public static function findIdentity($ID)
    {
        return static::findOne($ID);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new yii\base\NotSupportedException();
    }

    public function getId()
    {
        return $this->ID;
    }

    public function getAuthKey()
    {
        //throw new yii\base\NotSupportedException();
    }

    public function validateAuthKey($authKey)
    {
        //throw new yii\base\NotSupportedException();
    }

    public static function findByUsername($username)
    {
        return static::findOne(['Login' => $username]);
    }

    public function validatePassword($password)
    {
        var_dump(password_verify($password, $this->Senha));
        return password_verify($password, $this->Senha);
    }
    

}
