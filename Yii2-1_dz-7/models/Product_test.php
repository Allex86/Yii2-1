<?php

namespace app\models;

use yii\base\Model;

/**
 * Product is the model behind the product.
 */
class Product_test extends Model
{
    public $product_id;
    public $product_name;
    public $product_cayegory;
    public $product_price;

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'ID Product',
            'product_name' => 'Product name',
            'product_cayegory' => 'Product category',
            'product_price' => 'Product price'
        ];
    }
}
