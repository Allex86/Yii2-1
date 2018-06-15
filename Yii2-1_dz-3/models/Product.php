<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $price
 * @property string $created_at
 */
class Product extends \yii\db\ActiveRecord
{
    const SCENARIO_DEFAULT = 'default';
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    public function scenarios()     // СЦЕНАРИИ
    {
        return [
            self::SCENARIO_DEFAULT => ['name'],
            self::SCENARIO_CREATE => ['name', 'price'],
            // self::SCENARIO_UPDATE => ['name', 'price', 'created_at']
            self::SCENARIO_UPDATE => ['price', 'created_at'] // Сценарий без name
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 20],

            // [['name'], 'filter', 'filter' => 'strip_tags', 'filter' => 'trim'],
            [['name'], 'filter', 'filter' => function($value){
                return trim(strip_tags($value));
            }],
            
            [['name', 'price'], 'required'],
            // [['created_at'], 'safe'],
            // [['name', 'price'], 'string', 'max' => 50],
            [['price'], 'integer', 'min' => 0, 'max' => 1000 /* 'string' , 'max' => 50 */],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'created_at' => 'Created At',
        ];
    }
}
