<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ShipmentPlan Entity
 *
 * @property int $id
 * @property string|null $amazon_inbound_shipment_code
 * @property string|null $amazon_inbound_shipment_name
 * @property int|null $packages
 * @property string|null $warehouse_code
 * @property int $creater_id
 * @property int $worker_id
 * @property int $work_point
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Creater $creater
 * @property \App\Model\Entity\Worker $worker
 * @property \App\Model\Entity\ShippedStock[] $shipped_stock
 */
class ShipmentPlan extends Entity
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
        'amazon_inbound_shipment_code' => true,
        'amazon_inbound_shipment_name' => true,
        'packages' => true,
        'warehouse_code' => true,
        'creater_id' => true,
        'worker_id' => true,
        'work_point' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'creater' => true,
        'worker' => true,
        'shipped_stock' => true
    ];
}
