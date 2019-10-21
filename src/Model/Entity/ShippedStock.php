<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ShippedStock Entity
 *
 * @property int $id
 * @property int $amazon_sku_id
 * @property int $shipment_plan_id
 * @property int $quantity
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\AmazonSkus $amazon_skus
 * @property \App\Model\Entity\ShipmentPlan $shipment_plan
 */
class ShippedStock extends Entity
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
        'amazon_sku_id' => true,
        'shipment_plan_id' => true,
        'quantity' => true,
        'created' => true,
        'modified' => true,
        'amazon_skus' => true,
        'shipment_plan' => true
    ];
}
