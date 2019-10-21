<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AmazonSku Entity
 *
 * @property int $id
 * @property string $display_string
 * @property string $amazon_sku
 * @property string $fn_sku
 * @property string $product_model
 * @property int $quantity_contained
 * @property int $unit_work_point
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ShippedStock[] $shipped_stock
 */
class AmazonSku extends Entity
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
        'display_string' => true,
        'amazon_sku' => true,
        'fn_sku' => true,
        'product_model' => true,
        'quantity_contained' => true,
        'unit_work_point' => true,
        'created' => true,
        'modified' => true,
        'shipped_stock' => true
    ];
}
