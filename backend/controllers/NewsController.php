<?php

namespace backend\controllers;
use backend\models\NewsTegSearch;
use common\models\News;
use backend\models\NewsSearch;
use common\models\NewsTeg;
use common\models\Recommendations;
use mPDF;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{
    /**
     * @inheritDoc
     */
    /**
     * Lists all News models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionExcel()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderPartial('excel', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]);
    }

    public function actionExportExcel2()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // Initalize the TBS instance
        $OpenTBS = new \hscstudio\export\OpenTBS; // new instance of TBS
        // Change with Your template kaka
        $template = Yii::getAlias('@backend') . '/web/uploads/excel/dataNews.xlsx';
        $OpenTBS->LoadTemplate($template); // Also merge some [onload] automatic fields (depends of the type of document).
        //$OpenTBS->VarRef['modelName']= "Mahasiswa";
        $data = [];
        $no = 1;
        foreach ($dataProvider->getModels() as $mahasiswa) {

            $data[] = [
                'no' => $no++,
                'title_uz' => $mahasiswa->title_uz,
                'title_en' => $mahasiswa->title_en,
                'desc_uz' => $mahasiswa->desc_uz,
                'desc_en' => $mahasiswa->desc_en,
                'body_uz' => $mahasiswa->body_uz,
                'body_en' => $mahasiswa->body_en,
                'category' => $mahasiswa->category->name_uz,
                'region' => $mahasiswa->region->name_uz,
                'created_at' => $mahasiswa->created_at,
            ];
        }

        $OpenTBS->MergeBlock('data', $data);
        // Output the result as a file on the server. You can change output file
        $OpenTBS->Show(OPENTBS_DOWNLOAD, 'data_news.xlsx'); // Also merges all [onshow] automatic fields.
        exit;
    }


    /**
     * @throws \MpdfException
     */
    public function actionExportPdf()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $html = $this->renderPartial('_pdf.php', ['dataProvider' => $dataProvider]);
        $mpdf = new mPDF('c', 'A4', '', '', 0, 0, 0, 0, 0, 0);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
//        VarDumper::dump($html);
        $mpdf->writeHTML($html);
        $mpdf->Output();
        exit;
    }


    public function actionImport(){
        $modelImport = new \yii\base\DynamicModel([
            'fileImport'=>'File Import',
        ]);
        $modelImport->addRule(['fileImport'],'required');
        $modelImport->addRule(['fileImport'],'file',['extensions'=>'ods,xls,xlsx'],['maxSize'=>1024*1024]);

        if(Yii::$app->request->post()){
            $modelImport->fileImport = \yii\web\UploadedFile::getInstance($modelImport,'fileImport');
            if($modelImport->fileImport && $modelImport->validate()){
                $inputFileType = \PHPExcel_IOFactory::identify($modelImport->fileImport->tempName);
                $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($modelImport->fileImport->tempName);
                $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
                $baseRow = 3;
//                VarDumper::dump($sheetData[$baseRow]['A'],12,true);die();
                while(!empty($sheetData[$baseRow]['B'])){
                    $model = new News();

                    $model->title_uz = (string)$sheetData[$baseRow]['B'];
                    $model->title_en = (string)$sheetData[$baseRow]['C'];
                    $model->desc_uz = (string)$sheetData[$baseRow]['D'];
                    $model->desc_en = (string)$sheetData[$baseRow]['E'];
                    $model->body_uz = (string)$sheetData[$baseRow]['F'];
                    $model->body_en = (string)$sheetData[$baseRow]['G'];
                    $model->image = (string)$sheetData[$baseRow]['H'];
                    $model->save();
                    $baseRow++;
                }
                Yii::$app->getSession()->setFlash('success','Success');
            }else{
                Yii::$app->getSession()->setFlash('error','Error');
            }
        }
        return $this->render('import',[
            'modelImport' => $modelImport,
        ]);
    }


    public function actionViewPdf($id)
    {
       $pdf_content= $this->renderPartial('viewpdf', [
            'model' => $this->findModel($id)
        ]);
       $mpdf= new \Mpdf\Mpdf();
       $mpdf->WriteHTML($pdf_content);
       $mpdf->Output();
       exit;
    }


    /**
     * Displays a single News model.
     * @param int $id ID
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new NewsTegSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $tegModel = new NewsTeg();
        $tegModel->news_id = $id;

        if ($tegModel->load(Yii::$app->request->post())) {
            if (!NewsTeg::findOne(['teg_id' => $tegModel->teg_id, 'news_id' => $tegModel->news_id])) {
                $tegModel->save();
            } else {
                Yii::$app->session->setFlash('error', 'Bu teg qo\'shilgan');
                return $this->redirect(['view', 'id' => $id]);
            }
            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
            'tegModel' => $tegModel,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new News();


        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->upload_file()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->upload_file()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }


    public function actionRecommend($id)
    {

        $recommend = new Recommendations();
        $recommend->news_id = $id;
        if (!Recommendations::findOne(['news_id' => $recommend->news_id])) {
            $recommend->save();
        } else {
            Yii::$app->session->setFlash('error', 'Qo\'shilgan');
            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->redirect(['view', 'id' => $id]);
    }

}
