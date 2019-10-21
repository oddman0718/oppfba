<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProcessedStock $processedStock
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Processed Stock'), ['action' => 'edit', $processedStock->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Processed Stock'), ['action' => 'delete', $processedStock->id], ['confirm' => __('Are you sure you want to delete # {0}?', $processedStock->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Processed Stock'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Processed Stock'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Processing Plans'), ['controller' => 'ProcessingPlans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Processing Plan'), ['controller' => 'ProcessingPlans', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="processedStock view large-9 medium-8 columns content">
    <h3><?= h($processedStock->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Processing Plan') ?></th>
            <td><?= $processedStock->has('processing_plan') ? $this->Html->link($processedStock->processing_plan->id, ['controller' => 'ProcessingPlans', 'action' => 'view', $processedStock->processing_plan->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($processedStock->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Processed Stock') ?></th>
            <td><?= $this->Number->format($processedStock->processed_stock) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($processedStock->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity Before') ?></th>
            <td><?= $this->Number->format($processedStock->quantity_before) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($processedStock->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($processedStock->modified) ?></td>
        </tr>
    </table>
</div>
