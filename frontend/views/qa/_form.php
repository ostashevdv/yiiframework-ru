<?php

use ijackua\lepture\Markdowneditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $questionForm \frontend\models\QuestionForm */
/* @var $form yii\widgets\ActiveForm */
?>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">

    <symbol id="ico_search_big" viewBox="0 0 50 50">
        <path d="M5.617,5.619 C9.240,1.996 14.056,-0.000 19.179,-0.000 C29.755,-0.000 38.358,8.607 38.358,19.186 C38.358,23.932 36.646,28.415 33.515,31.930 L36.730,35.146 L37.527,34.348 C37.739,34.136 38.026,34.017 38.325,34.017 C38.624,34.017 38.911,34.136 39.123,34.348 L49.653,44.881 C50.094,45.322 50.094,46.037 49.653,46.478 L46.462,49.669 C46.242,49.890 45.953,50.000 45.664,50.000 C45.376,50.000 45.087,49.890 44.867,49.669 L34.336,39.136 C33.896,38.695 33.896,37.981 34.336,37.539 L35.134,36.742 L31.919,33.526 C28.405,36.658 23.924,38.371 19.179,38.371 C8.604,38.371 0.000,29.764 -0.000,19.186 C0.000,14.061 1.995,9.243 5.617,5.619 ZM45.664,47.275 L47.260,45.679 L38.325,36.742 L37.528,37.539 C37.528,37.539 37.528,37.539 37.527,37.540 C37.527,37.540 37.527,37.540 37.526,37.541 L36.730,38.338 L45.664,47.275 ZM19.179,36.114 C23.699,36.114 27.949,34.353 31.145,31.155 C34.341,27.958 36.102,23.707 36.102,19.186 C36.102,9.851 28.510,2.258 19.179,2.258 C14.659,2.258 10.409,4.018 7.213,7.215 C4.017,10.413 2.256,14.664 2.256,19.186 C2.256,28.520 9.848,36.114 19.179,36.114 Z" />
    </symbol>

    <symbol id="ico_list" viewBox="0 0 50 50">
        <path d="M15.624,40.632 L46.888,40.632 L46.888,46.885 L15.624,46.885 L15.624,40.632 ZM15.624,21.874 L46.888,21.874 L46.888,28.126 L15.624,28.126 L15.624,21.874 ZM15.624,3.115 L46.888,3.115 L46.888,9.368 L15.624,9.368 L15.624,3.115 ZM6.245,-0.011 L6.245,12.494 L3.118,12.494 L3.118,3.115 L-0.008,3.115 L-0.008,-0.011 L6.245,-0.011 ZM3.118,25.684 L3.118,28.126 L9.371,28.126 L9.371,31.253 L-0.008,31.253 L-0.008,24.121 L6.245,21.190 L6.245,18.747 L-0.008,18.747 L-0.008,15.621 L9.371,15.621 L9.371,22.753 L3.118,25.684 ZM9.371,34.379 L9.371,50.011 L-0.008,50.011 L-0.008,46.885 L6.245,46.885 L6.245,43.758 L-0.008,43.758 L-0.008,40.632 L6.245,40.632 L6.245,37.506 L-0.008,37.506 L-0.008,34.379 L9.371,34.379 Z" />
    </symbol>

    <symbol id="ico_bubble" viewBox="0 0 50 50">
        <path d="M43.961,32.289 C40.373,35.552 35.487,37.804 30.129,38.678 C28.950,44.618 23.704,48.996 17.589,48.996 C17.131,48.996 16.719,48.720 16.544,48.296 C16.369,47.871 16.466,47.383 16.789,47.058 C18.989,44.850 20.096,41.765 19.832,38.672 C14.488,37.794 9.617,35.544 6.037,32.287 C2.152,28.753 0.012,24.228 0.012,19.548 C0.012,14.270 2.650,9.327 7.441,5.631 C12.144,2.002 18.379,0.004 25.000,0.004 C31.620,0.004 37.856,2.002 42.558,5.631 C47.350,9.327 49.988,14.270 49.988,19.548 C49.988,24.229 47.848,28.754 43.961,32.289 ZM25.000,2.274 C12.468,2.274 2.273,10.023 2.273,19.548 C2.273,27.931 10.148,35.082 20.999,36.551 C21.491,36.618 21.883,37.000 21.963,37.492 C22.473,40.605 21.814,43.776 20.181,46.400 C24.270,45.352 27.463,41.886 28.026,37.531 C28.092,37.021 28.490,36.620 28.997,36.552 C39.850,35.084 47.727,27.933 47.727,19.548 C47.727,10.023 37.531,2.274 25.000,2.274 ZM33.287,26.819 L16.713,26.819 C16.089,26.819 15.582,26.310 15.582,25.683 C15.582,25.056 16.089,24.548 16.713,24.548 L33.287,24.548 C33.911,24.548 34.418,25.056 34.418,25.683 C34.418,26.310 33.911,26.819 33.287,26.819 ZM33.287,20.683 L16.713,20.683 C16.089,20.683 15.582,20.175 15.582,19.548 C15.582,18.921 16.089,18.413 16.713,18.413 L33.287,18.413 C33.911,18.413 34.418,18.921 34.418,19.548 C34.418,20.175 33.911,20.683 33.287,20.683 ZM33.287,14.545 L16.713,14.545 C16.089,14.545 15.582,14.037 15.582,13.410 C15.582,12.783 16.089,12.275 16.713,12.275 L33.287,12.275 C33.911,12.275 34.418,12.783 34.418,13.410 C34.418,14.037 33.911,14.545 33.287,14.545 Z" />
    </symbol>

</svg>

<div class="container page-wrapper page-cont-col">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($questionForm, 'title')->textInput(['maxlength' => true, 'class' => 'form-control input-lg']) ?>

            <?= Html::activeLabel($questionForm, 'body') ?>
            <?= Markdowneditor::widget(
                [
                    'model' => $questionForm,
                    'attribute' => 'body',
                ]
            ) ?>

            <?= $form->field($questionForm, 'tags')->dropDownList(
                $questionForm->listTags,
                ['multiple' => true, 'class' => 'form-control input-lg']
            ) ?>

            <div class="form-group">
                <div>
                    <?= Html::submitButton(
                        Yii::t('app', 'Publish'),
                        ['class' => 'btn btn-primary', 'name' => 'submit-question']
                    ) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>

        <div class="hidden-xs hidden-sm col-md-3 col-lg-3">

            <h4>Как правильно спросить?</h4>

            <div class="hint-item hint-search">
                <svg>
                    <use xlink:href="#ico_search_big"/>
                </svg>
                Сначала, попробуйте найти ответ среди вопросов других участников сообщества.<br>
                Для этого воспользуйтесь формой поиска &uarr;
            </div>
            <div class="hint-item hint-list">
                <svg>
                    <use xlink:href="#ico_list"/>
                </svg>
                Конкретизируйте ваш вопрос. Приведите исходный код и подробно опишите проблему.
            </div>
            <div class="hint-item hint-bubble">
                <svg>
                    <use xlink:href="#ico_bubble"/>
                </svg>
                Будте вежливы и постарайтесь не допускать грамматических ошибок.<br>
                Не используйте сленг.
            </div>
        </div>
    </div>
</div>