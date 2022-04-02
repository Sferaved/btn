<?php

namespace app\controllers;

use app\models\Btn;
use app\models\BtnSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BtnController implements the CRUD actions for Btn model.
 */
class BtnController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Btn models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BtnSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $models = $dataProvider->getModels(); // Таблица отбранных записей
 	
     //////////// USD      
     //curency	
        foreach ($models  as $value) (             
            $curency[$value->id] = $value->curency
        );


        //Time		
                 foreach ($models  as $value) (             
                    $categories[$value->id] = date('d.m.Y',strtotime($value->time))
                );
     
        //summa	
        foreach ($models  as $value) (           
            $summa[$value->id] = $value->summa
        );

        
    if ($curency !== null){

        $value_to_delete = 'BITCOIN' ; //Элемент с этим значением нужно удалить
        $curency = array_flip($curency); //Меняем местами ключи и значения
        unset ($curency[$value_to_delete]) ; //Удаляем элемент массива
        $curency = array_flip($curency); //Меняем местами ключи и значения
      
        $array= array_keys($curency); //Масив исключаемых ключей
   
         ?>
            <pre>
            <?php
            print_r ($array);
        
            ?>
            </pre>
            <?php  



    foreach ($array as $value) {
   
             unset($categories[$value]);
             unset($summa[$value]);
      
    }
 
    $categories=array_values($categories);
 
    $summa=array_values($summa);
    $series =  ['name' => 'USD', 'data' => $summa];
    }
    
     
  
    //////////// BITCOIN   

    //curency	
    foreach ($models  as $value) (             
        $curency[$value->id] = $value->curency
    );


    //Time		
            foreach ($models  as $value) (             
                $categories[$value->id] = date('d.m.Y',strtotime($value->time))
            );

    //summa	
    foreach ($models  as $value) (           
        $summa[$value->id] = $value->summa
    );

    if ($curency !== null){
     $value_to_delete = 'USD' ; //Элемент с этим значением нужно удалить
     $curency = array_flip($curency); //Меняем местами ключи и значения
     unset ($curency[$value_to_delete]) ; //Удаляем элемент массива
     $curency = array_flip($curency); //Меняем местами ключи и значения
   
     $array= array_keys($curency); //Масив исключаемых ключей

    foreach ($array as $value) {

            unset($categories[$value]);
            unset($summa[$value]);
    
    }

    $categories=array_values($categories);

    $summa=array_values($summa);
    $series =  ['name' => 'USD', 'data' => $summa];

    }
    
    return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'series' => $series,
            'categories' => $categories,
        ]);
    }

    /**
     * Displays a single Btn model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model=Btn::find()->where(['=','id',$id])->one();
		

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Btn model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Btn();
        $model->time = date('Y-m-d H:i:s');
	
    	
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Btn model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Btn model.
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
     * Finds the Btn model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Btn the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Btn::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
