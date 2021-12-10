<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;


class University extends ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    /**
     * @property integer $id
     * @property string $name
     * @property integer $count_of_students
     * @property integer $count_of_teachers
     */
    public static function tableName()
    {
        return '{{university}}';
    }
}