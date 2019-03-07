<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;

use frontend\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

use common\models\User;
use common\models\Stage;
use common\models\Location;
use common\models\Question;
use common\models\Answer;
use common\models\UserAnswer;

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
            'eauth' => [
                // required to disable csrf validation on OpenID requests
                'class' => \nodge\eauth\openid\ControllerBehavior::className(),
                'only' => ['login'],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
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
        $locations = Location::find()->all();

        return $this->render('index', [
            'locations' => $locations,
        ]);
    }

    public function actionTest($id, $answerId = null, $next = null)
    {
        $stage = Stage::getCurrent();
        $location = Location::findOne($id);
        if($location === null || $stage === null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $userAnswer = UserAnswer::find()->where(['stage_id' => $stage->id, 'user_id' => Yii::$app->user->id])->one();
        $qIds = [];
        if($userAnswer !== null && !empty($userAnswer->answersArray)) {
            foreach ($userAnswer->answersArray as $a) {
                $qIds[] = $a['q'];
            }
        }

        $question = Question::find()->where(['stage_id' => $stage->id, 'location_id' => $userAnswer !== null ? $userAnswer->location_id : $location->id])->andWhere(['not in', 'id', $qIds])->one();

        if(Yii::$app->request->isAjax && !Yii::$app->user->isGuest) {
            if($next) {
                if($question !== null) {
                    return $this->renderAjax('_question', ['question' => $question, 'userAnswer' => $userAnswer]);
                } else {
                    $userAnswer->is_finished = 1;
                    $userAnswer->save(false, ['is_finished']);

                    return false;
                }
            }

            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $answer = Answer::findOne($answerId);
            if($answer === null) {
                throw new NotFoundHttpException('The requested page does not exist.');
            }

            if($userAnswer === null) {
                $userAnswer = new UserAnswer;
                $userAnswer->user_id = Yii::$app->user->id;
                $userAnswer->stage_id = $stage->id;
                $userAnswer->location_id = $location->id;
            } elseif($userAnswer->location_id !== $location->id) {
                $userAnswer->answersArray = [];
                $userAnswer->score = 0;
            }

            $question = $answer->question;
            $rightAnswerId = Answer::find()->select('id')->where(['question_id' => $question->id, 'is_right' => 1])->column()[0];

            $userAnswer->answersArray[] = ['q' => $answer->question_id, 'a' => $answer->id];
            if($rightAnswerId == $id) {
                $userAnswer->score = $userAnswer->score + 1;
            }

            $userAnswer->save();

            return ['right' => $rightAnswerId, 'comment' => $answer->is_right ? $question->comment_right : $question->comment_wrong];
        }

        return $this->render('test', [
            'userAnswer' => $userAnswer,
            'question' => $question,
            'location' => $location,
            'loginForm' => new LoginForm,
        ]);
    }

    public function actionShareResult() 
    {        
        if(Yii::$app->request->isAjax && !Yii::$app->user->isGuest) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $stage = Stage::getCurrent();
            if($stage === null) {
                throw new NotFoundHttpException('The requested page does not exist.');
            }

            $userAnswer = UserAnswer::find()->where(['stage_id' => $stage->id, 'user_id' => Yii::$app->user->id])->one();
            if($userAnswer !== null && $userAnswer->is_finished) {
                $userAnswer->is_shared = 1;
                $userAnswer->save(false, ['is_shared']);
            
                return ['status' => 'success'];
            }

            return ['status' => 'error'];
        }
    }

    public function actionWinners()
    {

        return $this->render('winners', [
        ]);
    }

    public function actionNextQuestion()
    {
        if(Yii::$app->request->isAjax && !Yii::$app->user->isGuest) {        
            $stage = Stage::getCurrent();
            if($stage === null) {
                throw new NotFoundHttpException('The requested page does not exist.');
            }

            $userAnswer = UserAnswer::find()->where(['stage_id' => $stage->id, 'user_id' => Yii::$app->user->id])->one();
            $qIds = [];
            if($userAnswer !== null && !empty($userAnswer->answersArray)) {
                foreach ($userAnswer->answersArray as $a) {
                    $qIds[] = $a['q'];
                }
            }

            $question = Question::find()->where(['stage_id' => $stage->id, 'location_id' => $userAnswer->location_id])->andWhere(['not in', 'id', $qIds])->one();

            if($question !== null) {
                return $this->renderAjax('_question', ['question' => $question, 'userAnswer' => $userAnswer]);
            } else {
                $userAnswer->is_finished = 1;
                $$userAnswer->save(false, ['is_finished']);
            }
        }
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

        $loginForm = new LoginForm();
        if ($loginForm->load(Yii::$app->request->post())) {
            if(Yii::$app->request->isAjax) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($loginForm);
            }
            if($loginForm->getUser()->status !== User::STATUS_ACTIVE) {
                Yii::$app->getSession()->setFlash('error', 'Вы не можете войти. Ваш аккаунт заблокирован');
            
                return $this->redirect(['site/login']);
            }

            $loginForm->login();

            return $this->redirect(['site/index']);
        } else {
            $loginForm->password = '';

            return $this->render('login', [
                'loginForm' => $loginForm,
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

                Yii::$app->session->setFlash('success', 'Поздравляем! Вы успешно зарегистрированы!');

                Yii::$app->mailer->compose(
                        ['html' => 'registrationSuccess-html'],
                        ['user' => $user]
                    )
                    ->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->name])
                    ->setTo($user->email)
                    ->setSubject(Yii::$app->name.'. Регистрация')
                    ->send();

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
