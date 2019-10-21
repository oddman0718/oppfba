<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProcessedStock Entity
 *
 * @property int $id
 * @property int $processed_stock
 * @property int $processing_plan_id
 * @property int $quantity
 * @property int $quantity_before
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ProcessingPlan $processing_plan
 */
class ProcessedStock extends Entity
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
        'processed_stock' => true,
        'processing_plan_id' => true,
        'quantity' => true,
        'quantity_before' => true,
        'created' => true,
        'modified' => true,
        'processing_plan' => true
    ];
}
