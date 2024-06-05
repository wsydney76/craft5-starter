<?php

namespace modules\main\controllers;

use craft\elements\Entry;
use craft\web\Controller;
use yii\web\NotFoundHttpException;

class RedirectController extends Controller
{
    protected array|bool|int $allowAnonymous = true;

    public function actionArticleIndex()
    {
        $entry = Entry::find()
            ->section('page')
            ->type('articleIndex')
            ->one();

        if (!$entry) {
            throw new NotFoundHttpException('Page not found');
        }

        $this->redirect($entry->url);
    }

    public function actionArticle($slug)
    {
        $entry = Entry::find()
            ->section('article')
            ->slug($slug)
            ->one();

        if (!$entry) {
            throw new NotFoundHttpException('Page not found');
        }

        $this->redirect($entry->url);
    }
}