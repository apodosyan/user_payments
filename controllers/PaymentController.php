<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\User;
use Yii;
use app\models\Payment;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class PaymentController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['update-receiver-many', 'update-logged-in-receiver-many'], // add all actions to take guest to login page
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function checkUserExists($username)
    {
        if ($user = User::find()->where(['username' => $username])->andWhere(['!=', 'id', yii::$app->user->identity->id])->one()) {
            return $user;
        }
        return false;
    }


    public function actionUpdateReceiverMany()
    {
        $model = new Payment();

        if ($model->load(Yii::$app->request->post())) {
            $userExists = $this->checkUserExists($model->receiverUser);
            if ($userExists) {
                $model::changeLoggedInUserMoney($model->sendMoney);
                $userExists->amount += $model->sendMoney;
                $userExists->save();
            } else {
                if ($user = $model->signup()) {
                    $model::changeLoggedInUserMoney($model->sendMoney);
                }
            }
            return $this->redirect(['user/index']);
        } else {
            if (yii::$app->request->isAjax) {
                return $this->renderAjax('create', [
                    'model' => $model,
                ]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
    }

    public function actionUpdateLoggedInReceiverMany($id)
    {
        $user = $this->findModel($id);

        $model = new Payment();
        $model->receiverUser = $user->username;

        if ($model->load(Yii::$app->request->post())) {
            $userExists = $this->checkUserExists($model->receiverUser);
            if ($userExists) {
                $model::changeLoggedInUserMoney($model->sendMoney);
                $userExists->amount += $model->sendMoney;
                $userExists->save();
            }
            return $this->redirect(['user/index']);
        } else {
            if (yii::$app->request->isAjax) {
                return $this->renderAjax('update', [
                    'model' => $model,
                ]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
