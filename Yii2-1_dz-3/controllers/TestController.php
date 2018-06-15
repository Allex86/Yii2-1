<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Product;
use app\components\TestService;
use yii\base\BaseObject;

class TestController extends Controller
{
	public function actionIndex()
	{
		// $test = 'test_text';
		$test = '<h1>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</h1>';

		// return $this->renderContent($test);
		
		// return \Yii::$app->test->run();
		// $test_service = new TestService(['var' => '321']);
		// $test_service->run();
		// return $this->renderContent($test_service->run());
		
		$product =new Product();

		$product->product_id = 1;
		$product->product_name = 'Something product';
		$product->product_cayegory = 'Something category product';
		$product->product_price = 100500;

		return $this->render('index', [
			'test' => $test,
			'model' => $product,
			'test_service' => \Yii::$app->test->run()
		]);
	}
}