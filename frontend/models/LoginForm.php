<?php
namespace frontend\models;

use Yii;
use yii\base\Model;

use common\models\User;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;
    public $rulesCheckbox = true;
    public $personalDataCheckbox = true;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // login and password are both required
            [['email', 'password', 'rulesCheckbox'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            ['rulesCheckbox', 'compare', 'compareValue' => 1, 'operator' => '==', 'message' => 'Необходимо согласиться с правилами для регистрации'],
            ['personalDataCheckbox', 'compare', 'compareValue' => 1, 'operator' => '==', 'message' => 'Необходимо согласиться на обработку персональных данных'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => 'E-mail',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить',
            'rulesCheckbox' => 'Регистрируясь, я соглашаюсь с Правилами проведения Конкурса и подтверждаю, что мне есть 18 лет.',
            'personalDataCheckbox' => 'Я согласен на обработку моих персональных данных.',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Неверный логин или пароль.');
            }
        }
    }

    /**
     * Logs in a user using the provided email and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[email]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByEmail($this->email);
        }

        return $this->_user;
    }
}
