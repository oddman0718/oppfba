<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AmazonSku $amazonSku
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Amazon Sku'), ['action' => 'edit', $amazonSku->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Amazon Sku'), ['action' => 'delete', $amazonSku->id], ['confirm' => __('Are you sure you want to delete # {0}?', $amazonSku->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Amazon Sku'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Amazon Sku'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Shipped Stock'), ['controller' => 'ShippedStock', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Shipped Stock'), ['controller' => 'ShippedStock', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="amazonSku view large-9 medium-8 columns content">
    <h3><?= h($amazonSku->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Display String') ?></th>
            <td><?= h($amazonSku->display_string) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amazon Sku') ?></th>
            <td><?= h($amazonSku->amazon_sku) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fn Sku') ?></th>
            <td><?= h($amazonSku->fn_sku) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Model') ?></th>
            <td><?= h($amazonSku->product_model) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($amazonSku->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity Contained') ?></th>
            <td><?= $this->Number->format($amazonSku->quantity_contained) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unit Work Point') ?></th>
            <td><?= $this->Number->format($amazonSku->unit_work_point) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($amazonSku->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($amazonSku->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Shipped Stock') ?></h4>
        <?php if (!empty($amazonSku->shipped_stock)): ?>
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
            <?php foreach ($amazonSku->shipped_stock as $shippedStock): ?>
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
