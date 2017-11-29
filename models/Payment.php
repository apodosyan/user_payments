<?php
namespace app\models;

use Yii;
use yii\base\Model;

class Payment extends Model
{
    public $sendMoney;
    public $receiverUser;

    public function rules()
    {
        return [
            [['sendMoney','receiverUser'], 'required'],
            [['sendMoney'], 'number','min' => 0.1,'tooSmall' => '{attribute} must be no less than 0.' ],
            [['receiverUser'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'sendMoney' => Yii::t('app', 'Send Money'),
            'receiverUser' => Yii::t('app', 'Receiver User'),
        ];
    }

    public static function changeLoggedInUserMoney($amount)
    {
        if(!yii::$app->user->isGuest) {
            $user = yii::$app->user->identity;
            $user->amount -= $amount;
            $user->save();
        }
        return false;
    }


    public function signup()
    {
        $user = new User();
        $user->username = $this->receiverUser;
        $user->generateAuthKey();
        $user->amount  =  $this->sendMoney;

        return $user->save() ? $user : null;
    }
}