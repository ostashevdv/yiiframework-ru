<?php

/* @var $this \yii\web\View */
/* @var $post \app\models\Post */

use app\helpers\Text;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Markdown;

$this->title = Html::encode($post->title);
?>
<article class="post-item">
    <div class="post-title">
        <?= Html::encode($post->title) ?>
    </div>

    <div class="post-info">
        <?= Yii::t('post', 'Date publication:') ?> <?= Yii::$app->formatter->asDatetime($post->updated_at, 'short'); ?><span class="margin-line">|</span>
        <?= Yii::t('post', 'Author:') ?> <?= Html::a(Html::encode($post->user->username), ['/user/view', 'id' => $post->user->id, 'username' => $post->user->username]); ?>

        <?php if (Yii::$app->user->id == $post->user_id && $post->status == $post::STATUS_INACTIVE) : ?>
            <span class="margin-line">|</span> <?= Html::a(Yii::t('post', 'Update post'), ['post/update', 'id' => $post->id]) ?>
        <?php endif; ?>
    </div>

    <?= Text::hideCut(HtmlPurifier::process(Markdown::process($post->body, 'gfm'))) ?>
</article>