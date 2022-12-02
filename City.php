<?php

namespace app\modules\yiiform\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "yiiform".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $gender
 * @property int $employee_number
 * @property string $website
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'city_id' => 'ID',
            'city_name' => 'Name',

        ];
    }
	
	
}
