<?php
namespace app\modules\yiiform\models;

use Yii;

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
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
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
            'country_id' => 'ID',
            'country_name' => 'Name',

        ];
    }
	
	
}
