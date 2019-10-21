<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShipmentPlan $shipmentPlan
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $shipmentPlan->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $shipmentPlan->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Shipment Plans'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Shipped Stock'), ['controller' => 'ShippedStock', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Shipped Stock'), ['controller' => 'ShippedStock', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="shipmentPlans form large-9 medium-8 columns content">
    <?= $this->Form->create($shipmentPlan) ?>
    <fieldset>
        <legend><?= __('Edit Shipment Plan') ?></legend>
        <?php
            echo $this->Form->control('amazon_inbound_shipment_code');
            echo $this->Form->control('amazon_inbound_shipment_name');
            echo $this->Form->control('packages');
            echo $this->Form->control('warehouse_code');
            echo $this->Form->control('creater_id');
            echo $this->Form->control('worker_id');
            echo $this->Form->control('work_point');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
