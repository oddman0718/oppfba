<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShippedStock[]|\Cake\Collection\CollectionInterface $shippedStock
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Shipped Stock'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Shipment Plans'), ['controller' => 'ShipmentPlans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Shipment Plan'), ['controller' => 'ShipmentPlans', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="shippedStock index large-9 medium-8 columns content">
    <h3><?= __('Shipped Stock') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amazon_sku_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('shipment_plan_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($shippedStock as $shippedStock): ?>
            <tr>
                <td><?= $this->Number->format($shippedStock->id) ?></td>
                <td><?= $this->Number->format($shippedStock->amazon_sku_id) ?></td>
                <td><?= $shippedStock->has('shipment_plan') ? $this->Html->link($shippedStock->shipment_plan->id, ['controller' => 'ShipmentPlans', 'action' => 'view', $shippedStock->shipment_plan->id]) : '' ?></td>
                <td><?= $this->Number->format($shippedStock->quantity) ?></td>
                <td><?= h($shippedStock->created) ?></td>
                <td><?= h($shippedStock->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $shippedStock->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $shippedStock->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shippedStock->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shippedStock->id)]) ?>
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
