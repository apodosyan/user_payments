<?php

use app\models\User;
use yii\helpers\Url;

class UserCest
{

    public function _before(\AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/user/index'));
    }

    public function userPageLoginAndChangeAmountWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/login'));
        $I->see('Login', 'h1');

        $I->amGoingTo('try to login with correct credentials');
        $I->fillField('input[name="LoginForm[username]"]', Yii::$app->security->generateRandomString());
        $I->click('login-button');
        $I->expectTo('see user info');
        $I->see('Logout');

        $I->seeLink('Users');
        $I->click('Users');
        $I->see('Users', 'h1');
        $I->click('.update-amount');
        $I->fillField('#user-changeamount',  -22);
        $I->click('.btn-primary');

    }


}
