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
class Yiiform extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'yiiform';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'gender', 'employee_number', 'website','gender','textarea','country','state'], 'required'],
            [['employee_number'], 'integer'],
            [['name', 'email', 'gender', 'website','textarea'], 'string', 'max' => 255],
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
            'email' => 'Email',
            'gender' => 'Gender',
            'employee_number' => 'Employee Number',
            'website' => 'Website',
			'gender' => 'Gender',
			'textarea' => 'Text Area',
			'movies' => 'Movies',
			'image' => 'Image',
			'country' => 'Country',
			'state' => 'State'
        ];
    }
	
	public function upload() {
        if ($this->validate()) {
				$this->image->saveAs('../uploads/'  . $this->image->baseName . '.' .$this->image->extension);
            return true;
         } else {
            return false;
         }
      }  

	
}
