<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShipmentPlan $shipmentPlan
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Shipment Plan'), ['action' => 'edit', $shipmentPlan->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Shipment Plan'), ['action' => 'delete', $shipmentPlan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shipmentPlan->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Shipment Plans'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Shipment Plan'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Shipped Stock'), ['controller' => 'ShippedStock', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Shipped Stock'), ['controller' => 'ShippedStock', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="shipmentPlans view large-9 medium-8 columns content">
    <h3><?= h($shipmentPlan->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Amazon Inbound Shipment Code') ?></th>
            <td><?= h($shipmentPlan->amazon_inbound_shipment_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amazon Inbound Shipment Name') ?></th>
            <td><?= h($shipmentPlan->amazon_inbound_shipment_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Warehouse Code') ?></th>
            <td><?= h($shipmentPlan->warehouse_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($shipmentPlan->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($shipmentPlan->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Packages') ?></th>
            <td><?= $this->Number->format($shipmentPlan->packages) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creater Id') ?></th>
            <td><?= $this->Number->format($shipmentPlan->creater_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Worker Id') ?></th>
            <td><?= $this->Number->format($shipmentPlan->worker_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Work Point') ?></th>
            <td><?= $this->Number->format($shipmentPlan->work_point) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($shipmentPlan->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($shipmentPlan->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Shipped Stock') ?></h4>
        <?php if (!empty($shipmentPlan->shipped_stock)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Amazon Sku Id') ?></th>
                <th scope="col"><?= __('Shipment Plan Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($shipmentPlan->shipped_stock as $shippedStock): ?>
            <tr>
                <td><?= h($shippedStock->id) ?></td>
                <td><?= h($shippedStock->amazon_sku_id) ?></td>
                <td><?= h($shippedStock->shipment_plan_id) ?></td>
                <td><?= h($shippedStock->quantity) ?></td>
                <td><?= h($shippedStock->created) ?></td>
                <td><?= h($shippedStock->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ShippedStock', 'action' => 'view', $shippedStock->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ShippedStock', 'action' => 'edit', $shippedStock->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ShippedStock', 'action' => 'delete', $shippedStock->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shippedStock->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
