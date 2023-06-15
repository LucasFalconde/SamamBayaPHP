<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-success fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            Yii::$app->user->isGuest
            ? ['label' => 'SamamBaya', 'url' => Yii::$app->homeUrl]
            : '',
            Yii::$app->user->isGuest
            ? ['label' => 'Home', 'url' => ['/site/index']]
            : '',

            [
                'label' => 'Login',
                'url' => ['/site/login'],
                'visible' => Yii::$app->user->isGuest,
            ],
            [
                'label' => 'Usuário',
                'url' => ['/usuario/index'],
                'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->Log === 'admin@admin.com',
            ],
            [
                'label' => 'Log Operação',
                'url' => ['/logoperacao/index'],
                'visible' => !Yii::$app->user->isGuest,
            ],
            [
                'label' => 'Plantas',
                'url' => ['/planta/index'],
                'visible' => !Yii::$app->user->isGuest,
            ],
            [
                'label' => 'Sensores',
                'url' => ['/sensor/index'],
                'visible' => !Yii::$app->user->isGuest,
            ],
            Yii::$app->user->isGuest
                ? ''
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->Nome . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>',
        ],
    ]);
    
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div>
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<?php $this->endBody() ?>

<?php
// Impede o acesso direto a URLs que requerem autenticação
$authenticatedUrls = ['/usuario/index', '/logoperacao/index', '/planta/index', '/sensor/index'];
$requestedUrl = Yii::$app->request->getUrl();
$isAuthenticatedUrl = in_array($requestedUrl, $authenticatedUrls);

if ($isAuthenticatedUrl && Yii::$app->user->isGuest) {
    Yii::$app->getResponse()->redirect(Url::to(['/site/login']));
    Yii::$app->end();
}
?>

</body>
</html>
<?php $this->endPage() ?>
