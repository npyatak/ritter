<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use frontend\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

use common\models\User;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(Url::toRoute(['site/index']));
    }

    public function actionLogin() 
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['site/index']);
        }

        $serviceName = Yii::$app->getRequest()->getQueryParam('service');
        $ref = Yii::$app->getRequest()->getQueryParam('ref');

        if (isset($serviceName)) {
            $eauth = Yii::$app->get('eauth')->getIdentity($serviceName);
            $eauth->setRedirectUrl(Url::toRoute('site/index'));
            if($ref && $ref !== '') {
                $eauth->setRedirectUrl(Url::to($ref));
            }
            $eauth->setCancelUrl(Url::toRoute('site/login'));

            try {
                if ($eauth->authenticate()) {
                    $user = User::findByService($serviceName, $eauth->id);

                    if($user === null) {
                        $user = new User;
                        $user->soc = $serviceName;
                        $user->sid = $eauth->id;
                        $user->name = $eauth->first_name.' '.$eauth->last_name;
                        if(isset($eauth->email)) {
                            $mailExists = User::find()->where(['email' => $eauth->email])->exists();
                            if(!$mailExists) {
                                $user->email = $eauth->email;
                            }
                        }
                    } elseif($user->status !== User::STATUS_ACTIVE) {
                        Yii::$app->getSession()->setFlash('error', 'Вы не можете войти. Ваш аккаунт заблокирован');
                        
                        $eauth->redirect($eauth->getCancelUrl());
                    }

                    if(isset($eauth->birthdate)) {
                        $user->birthdate = $eauth->birthdate;

                        $bd = new \DateTime();
                        $bd->setTimestamp($user->birthdate);
                        $now = new \DateTime();
                        if($now->diff($bd)->format('%y') < 18) {
                            Yii::$app->getSession()->setFlash('error', 'Ты не можешь быть участником, так как ты младше 18 лет');
                            
                            $eauth->redirect($eauth->getCancelUrl());
                        }
                    } 
                    
                    $user->image = isset($eauth->photo_url) ? $eauth->photo_url : null;
                    $user->ip = $_SERVER['REMOTE_ADDR'];
                    $user->browser = $_SERVER['HTTP_USER_AGENT'];
                    $user->save(false);

                    Yii::$app->user->login($user, 3600 * 24 * 365);

                    $eauth->redirect();
                } else {
                    $eauth->cancel();
                    $eauth->redirect($eauth->getCancelUrl());
                }
            } catch (\nodge\eauth\ErrorException $e) {
                Yii::$app->getSession()->setFlash('error', 'EAuthException: '.$e->getMessage());

                $eauth->cancel();
                $eauth->redirect($eauth->getCancelUrl());
            }
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            if(Yii::$app->request->isAjax) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
            }
            if($model->getUser()->status !== User::STATUS_ACTIVE) {
                Yii::$app->getSession()->setFlash('error', 'Вы не можете войти. Ваш аккаунт заблокирован');
            
                return $this->redirect(['site/login']);
            }

            $model->login();

            return $this->redirect(['site/index']);
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['site/index']);
        }

        $user = new User;
        $user->scenario = 'register';
                    
        if($user->load(Yii::$app->request->post())) {
            if(Yii::$app->request->isAjax) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($user);
            }

            $user->ip = $_SERVER['REMOTE_ADDR'];
            $user->browser = $_SERVER['HTTP_USER_AGENT'];
            $user->setPassword($user->password);
            
            if($user->save()) {
                Yii::$app->user->login($user, 3600 * 24 * 365);

                Yii::$app->session->setFlash('success', 'Поздравляем! Вы успешно зарегистрированы на проекте "Горячая битва"!');

                /*Yii::$app->mailer->compose(
                        ['html' => 'registrationSuccess-html'],
                        ['user' => $user]
                    )
                    ->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->name])
                    ->setTo($user->email)
                    ->setSubject(Yii::$app->name.'. Регистрация')
                    ->send();*/

                return $this->redirect(Yii::$app->request->referrer);
            }
        }

        return $this->render('register', [
            'user' => $user,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRestorePassword()
    {
        $model = new RestorePasswordForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Спасибо! Мы отправили ссылку по восстановлению пароля на вашу почту.');

                return $this->redirect(['site/index']);
            } else {
                Yii::$app->session->setFlash('error', 'Не удалось восстановить пароль.');
            }
        }

        return $this->render('restore-password', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        if (empty($token) || !is_string($token)) {
            throw new InvalidParamException('Токен для восстановления пароля не может быть пустым.');
        }
        $user = User::findByPasswordResetToken($token);
        if ($user === null) {
            throw new InvalidParamException('Неправильный токен для восстановления пароля.');
        }

        $user->scenario = 'reset-password';
        $user->password = '';

        if ($user->load(Yii::$app->request->post()) && $user->validate()) {
            $user->setPassword($user->password);
            $user->password_reset_token = null;
            $user->save(false);

            Yii::$app->session->setFlash('success', 'Новый пароль сохранен.');

            return $this->redirect(['site/login']);
        }

        return $this->render('reset-password', [
            'user' => $user,
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if(!Yii::$app->user->isGuest) {
            $model->email = Yii::$app->user->identity->email;
            $model->name = Yii::$app->user->identity->name;
            $model->phone = Yii::$app->user->identity->phone;
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $contact = new Contact;
            $contact->attributes = $model->attributes;

            $contact->save();
            
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Спасибо, ваша заявка отправлена!');
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка при отправлении сообщения.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionRules() 
    {
        $filename = 'rules_ritter.pdf';
        $completePath = __DIR__.'/../web/files/'.$filename;
        if(!is_file($completePath)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return Yii::$app->response->sendFile($completePath, $filename, ['inline'=>true, 'Content-type' => 'application/pdf', 'Content-Disposition' => 'attachment']);
    }


    public function actionLogin2($id = 1) {
        $user = User::findOne($id);

        Yii::$app->getUser()->login($user);

        return $this->redirect('/');
    }
}
