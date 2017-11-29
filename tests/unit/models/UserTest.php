<?php

namespace tests\models;

use app\models\LoginForm;
use app\models\User;
use Yii;

class UserTest extends \Codeception\Test\Unit
{
    public function testFindUserById()
    {
        expect_that($user = User::findIdentity(3));
   /*     expect($user->username)->equals('sadas');*/

        expect_not(User::findIdentity(999));
    }

    public function testFindUserByAccessToken()
    {
        expect_that($user = User::findIdentityByAccessToken('Mcc6DXoKcUPI8uDOB04h7hQ-9WMhqwy3'));
        expect($user->username)->equals('sadas');

        expect_not(User::findIdentityByAccessToken('non-existing'));
    }

    public function testFindUserByUsername()
    {
        expect_that($user = User::findByUsername('sadas'));
        expect_not(User::findByUsername('not-admin'));
    }

    /**
     * @depends testFindUserByUsername
     */
    public function testValidateUser($user)
    {
        $user = User::findByUsername('adas');
        expect_that($user->validateAuthKey('_AKrOEhNYVbpkwUxcX0mimwNMx7ffcXT'));
        expect_not($user->validateAuthKey('test102key'));

        /*expect_that($user->validatePassword('admin'));
        expect_not($user->validatePassword('123456'));        */
    }



    public function testIsUserAtSameOnline()
    {
        $user = User::findByUsername('username');
        $user = Yii::$app->getUser()->login($user);
        expect_that(User::isUserAtSameOnline(5));
        $this->assertFalse(Yii::$app->user->isGuest);
    }


}
