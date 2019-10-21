<?php
namespace App\Model\Entity;

use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;

/**
 * ProcessingPlan Entity
 *
 * @property int $id
 * @property string $status
 * @property int $creater_id
 * @property int $worker_id
 * @property int $work_point
 * @property FrozenTime $created
 * @property FrozenTime $modified
 *
 * @property User $creater
 * @property User $worker
 * @property ProcessedStock[] $processed_stock
 */
class ProcessingPlan extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'status' => true,
        'creater_id' => true,
        'worker_id' => true,
        'work_point' => true,
        'created' => true,
        'modified' => true,
        'creater' => true,
        'worker' => true,
        'processed_stock' => true
    ];
}
