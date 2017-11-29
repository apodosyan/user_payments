<?php


use app\models\User;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="user-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <div class="send-many">
            <?= Html::submitButton('Send Money', ['class' => 'btn btn-primary payment-button']) ?>
        </div>


        <?php
        Modal::begin([
            'header' => '<h4>User</h4>',
            'id' => 'modal',
            'size' => 'modal-lg',
        ]);
        echo '<div id="updateAmount"></div>';
        Modal::end();
        ?>


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'username',
                'amount',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{updateAmount}',
                    'buttons' => [
                        'updateAmount' => function ($url, $model, $key) {
                            if (User::isUserAtSameOnline($model->id) === true) {
                                return Html::a('<i class="fa fa-sort-amount-asc" aria-hidden="true"></i>', ['/payment/update-logged-in-receiver-many', 'id' => $model->id], ['class' => 'update-amount']);
                            } else {
                                return false;
                            }
                        },
                    ]
                ],
            ],
        ]); ?>
    </div>

<?php
$this->registerJs("
        $('.update-amount').click(function(e){
        e.preventDefault();
        $('#modal').modal('show').find('#updateAmount').load( $(this).attr('href'));
        });

        $('.payment-button').click(function(e){
        e.preventDefault();
        $('#modal').modal('show').find('#updateAmount').load('/payment/update-receiver-many');
        });
");