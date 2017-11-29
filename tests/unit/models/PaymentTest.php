<?php

namespace tests\models;

use app\models\Payment;
use app\models\User;
use Yii;

class PaymentTest extends \Codeception\Test\Unit
{
    public function testChangeLoggedInUserMoney()
    {
        $user = User::findByUsername('asdasd');
        Yii::$app->getUser()->login($user);
        expect(Payment::changeLoggedInUserMoney(0.22));
    }

    public function testChangeNoLoginUserAmount()
    {
        expect_not(Payment::changeLoggedInUserMoney(12));
    }

}