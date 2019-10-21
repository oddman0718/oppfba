<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShippedStock $shippedStock
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $shippedStock->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $shippedStock->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Shipped Stock'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Shipment Plans'), ['controller' => 'ShipmentPlans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Shipment Plan'), ['controller' => 'ShipmentPlans', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="shippedStock form large-9 medium-8 columns content">
    <?= $this->Form->create($shippedStock) ?>
    <fieldset>
        <legend><?= __('Edit Shipped Stock') ?></legend>
        <?php
            echo $this->Form->control('amazon_sku_id');
            echo $this->Form->control('shipment_plan_id', ['options' => $shipmentPlans]);
            echo $this->Form->control('quantity');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
