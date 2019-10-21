<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShipmentPlan[]|\Cake\Collection\CollectionInterface $shipmentPlans
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Shipment Plan'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Shipped Stock'), ['controller' => 'ShippedStock', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Shipped Stock'), ['controller' => 'ShippedStock', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="shipmentPlans index large-9 medium-8 columns content">
    <h3><?= __('Shipment Plans') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amazon_inbound_shipment_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amazon_inbound_shipment_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('packages') ?></th>
                <th scope="col"><?= $this->Paginator->sort('warehouse_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creater_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('worker_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('work_point') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($shipmentPlans as $shipmentPlan): ?>
            <tr>
                <td><?= $this->Number->format($shipmentPlan->id) ?></td>
                <td><?= h($shipmentPlan->amazon_inbound_shipment_code) ?></td>
                <td><?= h($shipmentPlan->amazon_inbound_shipment_name) ?></td>
                <td><?= $this->Number->format($shipmentPlan->packages) ?></td>
                <td><?= h($shipmentPlan->warehouse_code) ?></td>
                <td><?= $this->Number->format($shipmentPlan->creater_id) ?></td>
                <td><?= $this->Number->format($shipmentPlan->worker_id) ?></td>
                <td><?= $this->Number->format($shipmentPlan->work_point) ?></td>
                <td><?= h($shipmentPlan->status) ?></td>
                <td><?= h($shipmentPlan->created) ?></td>
                <td><?= h($shipmentPlan->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $shipmentPlan->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $shipmentPlan->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shipmentPlan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shipmentPlan->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
