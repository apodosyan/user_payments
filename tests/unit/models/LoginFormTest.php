<?php

namespace tests\models;

use app\models\LoginForm;
use app\models\User;
use Codeception\Specify;

class LoginFormTest extends \Codeception\Test\Unit
{
    private $model;

    protected function _after()
    {
        \Yii::$app->user->logout();
    }

    public function testLoginNoUser()
    {
        $this->model = new LoginForm([
            'username' => 'not_existing_username',
        ]);


        expect_not($this->model->login());
        expect_that(\Yii::$app->user->isGuest);
    }

    public function testLoginWrongPassword()
    {
        $this->model = new LoginForm([
            'username' => 'demo',
        ]);

        expect_not($this->model->login());
        expect_that(\Yii::$app->user->isGuest);
        /* expect($this->model->errors)->hasKey('password');*/
    }

    public function testLoginCorrect()
    {

        $this->model = new LoginForm([
            'username' => 'rememberMe',
        ]);

        $this->assertTrue(\Yii::$app->user->isGuest);
        $this->assertFalse($this->model->login());
        /*expect_not(\Yii::$app->user->isGuest);*/
        /*expect($this->model->errors)->hasntKey('password');*/
    }


    public function testSignup()
    {
        $this->model = new User([
            'username' => 'new_test222',
            'amount' => 122,
        ]);

        $this->assertTrue(\Yii::$app->user->isGuest);

       /*  expect($this->model->errors)->hasntKey('password');*/
    }


}
