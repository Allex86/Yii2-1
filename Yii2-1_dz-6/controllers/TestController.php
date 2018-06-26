<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Product_test;
use app\components\TestService;
use yii\base\BaseObject;

class TestController extends Controller
{
	public function actionIndex()
	{
		// $test = 'test_text';
		$test = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.';

		// return $this->renderContent($test);
		
		// return \Yii::$app->test->run();
		// $test_service = new TestService(['var' => '321']);
		// $test_service->run();
		// return $this->renderContent($test_service->run());
		
		$product =new Product_test();

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

	public function actionInsert()
	{
		\Yii::$app->db->createCommand()->insert('user',[
   		'username' => 'user_1',
			'name' => 'user_1',
			'surname' => 'user_1',
			'password_hash' => 111,
			'access_token' => 111,
			'auth_key' => 111,
			'created_at' => 111,
			'updated_at' => 111
		])->execute();

		\Yii::$app->db->createCommand()->insert('user',[
   		'username' => 'user_2',
			'name' => 'user_2',
			'surname' => 'user_2',
			'password_hash' => 222,
			'access_token' => 222,
			'auth_key' => 222,
			'created_at' => 222,
			'updated_at' => 222
		])->execute();

		\Yii::$app->db->createCommand()->insert('user',[
   		'username' => 'user_3',
			'name' => 'user_3',
			'surname' => 'user_3',
			'password_hash' => 333,
			'access_token' => 333,
			'auth_key' => 333,
			'created_at' => 333,
			'updated_at' => 333
		])->execute();
	
		$query_select = (new \yii\db\Query)
			->select('*')
			->from('user')
			->limit(3);
		_log($query_select->all());

	 	\Yii::$app->db->createCommand()->batchInsert('event', ['text', 'dt', 'creator_id', 'created_at'], [
		   ['text','dt',$query_select->all()[0]['id'],333],
		   ['text','dt',$query_select->all()[1]['id'],444],
		   ['text','dt',$query_select->all()[2]['id'],555]
		])->execute();
	}

	public function actionSelect()
	{
		$query_select_1 = (new \yii\db\Query)
			->select('*')
			->from('user')
			->where(['=', 'id', 1]);
		_log($query_select_1->all());
		// _end($query_select_1->all());

		$query_select_2 = (new \yii\db\Query)
			->select('*')
			->from('user')
			->where(['>', 'id', 1])
			->orderBy('name');
		_log($query_select_2->all());
		 _end($query_select_2->all());

		$query_select_3 = (new \yii\db\Query)
			->select('*')
			->from('user')
			->count();
		_log($query_select_3);
		// _end($query_select_3);
		
		$query_select_4 = (new \yii\db\Query)
			->select('*')
			->from('event')
			->innerJoin('user', 'creator_id');
		_log($query_select_4->all());
		// _end($query_select_4->all());
	}
}