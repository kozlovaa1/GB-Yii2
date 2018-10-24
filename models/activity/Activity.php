<?php
namespace app\models;

/**
 * Activity класс
 *
 * Отражает сущность хранимого в календаре события
 */

class Activity extends \yii\base\Model
{
    /**
     * Название события
     *
     * @var string
     */
    public $title;

    /**
     * День начала события. Хранится в Unix timestamp
     *
     * @var int
     */
    public $startDay;

    /**
     * День завершения события. Хранится в Unix timestamp
     *
     * @var int
     */
    public $endDay;

    /**
     * ID автора, создавшего события
     *
     * @var int
     */
    public $idAuthor;

    /**
     * Описание события
     *
     * @var string
     */
    public $body;

    public function attributeLabels()
    {
        return [
            'title' => 'Название события',
            'startDay' => 'Дата начала',
            'endDay' => 'Дата завершения',
            'idAuthor' => 'ID автора',
            'body' => 'Описание события'
        ];
    }
}