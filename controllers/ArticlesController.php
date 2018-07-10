<?php

namespace app\controllers;

use app\models\ArticleFiles;
use Yii;
use app\models\Articles;
use app\models\ArticlesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ArticlesController implements the CRUD actions for Articles model.
 */
class ArticlesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Articles models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticlesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Articles model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Articles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Articles();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Articles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Articles model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Articles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Articles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Articles::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Odpowiada za upload plików do artykułu
     *
     * @param integer $id id artykułu, do którego dodajemy plik
     *
     * @return mixed
     */
    public function actionUpload($id)
    {
        $model = new ArticleFiles();

        if(Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->name = $model->file->baseName;
            $model->article_id = $id;
            $model->hash = md5($model->file->baseName . microtime());
            $model->extension = $model->file->extension;

            if($model->upload()) {
                $model->save();

                return $this->redirect(['uploadedfiles', 'id' => $id]);
            }
        }

        return $this->render('upload', [
            'model' => $model,
        ]);
    }

    public function actionUploadedfiles($id)
    {
        $files = ArticleFiles::find()->where('article_id = ' . $id)->all();

        return $this->render('files', [
            'files' => $files,
            'article_id' => $id
        ]);
    }

    public function actionDownload($fileId)
    {
        $file = ArticleFiles::findOne($fileId);

        $filesConfig = Yii::$app->getComponents()['files'];
        $dirId = ceil($file->id / $filesConfig['files_limit']);

        return \Yii::$app->response->sendFile(
            $filesConfig['path'] . DIRECTORY_SEPARATOR . $dirId . DIRECTORY_SEPARATOR . $file->hash . '.' . $file->extension,
            $file->name . "." . $file->extension
        );
    }
}
