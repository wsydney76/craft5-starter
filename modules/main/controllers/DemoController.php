<?php

namespace modules\main\controllers;

use craft\elements\Entry;
use craft\web\Controller;
use yii\web\Response;

class DemoController extends Controller
{
    protected int|bool|array $allowAnonymous = true;

    // .../actions/main/demo/say-hello
    public function actionSayHello(): string
    {
        return 'Hello World';
    }

    public function actionArticlesJson(): Response
    {
        $articles = Entry::find()
            ->section('article')
            ->cache(60)
            ->collect();

        $data = [
            'count' => $articles->count(),
            'articles' => $articles->map(fn($article) =>
                 [
                    'title' => $article->title,
                    'url' => $article->url,
                    'tagline' => $article->tagline,
                ]
            ),
        ];

        // If we want to return nicely formatted JSON, we have to play around with the response object

        //$this->response->format = Response::FORMAT_JSON;
        //$this->response->data = $data;
        //$this->response->formatters[Response::FORMAT_JSON] = [
        //    'class' => JsonResponseFormatter::class,
        //    'prettyPrint' => true,
        //];
        //
        //return $this->response;

        return $this->asJson($data);
    }
}
