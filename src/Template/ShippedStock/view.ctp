<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShippedStock $shippedStock
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Shipped Stock'), ['action' => 'edit', $shippedStock->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Shipped Stock'), ['action' => 'delete', $shippedStock->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shippedStock->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Shipped Stock'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Shipped Stock'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Shipment Plans'), ['controller' => 'ShipmentPlans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Shipment Plan'), ['controller' => 'ShipmentPlans', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="shippedStock view large-9 medium-8 columns content">
    <h3><?= h($shippedStock->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Shipment Plan') ?></th>
            <td><?= $shippedStock->has('shipment_plan') ? $this->Html->link($shippedStock->shipment_plan->id, ['controller' => 'ShipmentPlans', 'action' => 'view', $shippedStock->shipment_plan->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($shippedStock->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amazon Sku Id') ?></th>
            <td><?= $this->Number->format($shippedStock->amazon_sku_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($shippedStock->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($shippedStock->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($shippedStock->modified) ?></td>
        </tr>
    </table>
</div>
