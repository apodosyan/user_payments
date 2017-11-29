<?php

use yii\helpers\Url;

class LoginCest
{
   public function ensureThatLoginWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/login'));
        $I->see('Login', 'h1');

        $I->amGoingTo('try to login with correct credentials');
        $I->fillField('input[name="LoginForm[username]"]', Yii::$app->security->generateRandomString());
        $I->click('login-button');


        $I->expectTo('see user info');
        $I->see('Logout');
    }
}
