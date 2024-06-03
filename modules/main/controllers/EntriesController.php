<?php

namespace modules\main\controllers;

use craft\elements\Entry;
use craft\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Entries controller
 */
class EntriesController extends Controller
{

    protected array|int|bool $allowAnonymous = true;

    /**
     * main/entries/random action
     */
    public function actionRandom(): Response
    {
        $entry = Entry::find()
            ->section('article')
            ->orderBy('RAND()')
            ->one();

        if(!$entry) {
           throw new NotFoundHttpException('Entry not found');
        }

        return $this->redirect($entry->url);
    }
}
