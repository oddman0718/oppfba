<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProcessingPlan $processingPlan
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Processing Plan'), ['action' => 'edit', $processingPlan->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Processing Plan'), ['action' => 'delete', $processingPlan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $processingPlan->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Processing Plans'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Processing Plan'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Processed Stock'), ['controller' => 'ProcessedStock', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Processed Stock'), ['controller' => 'ProcessedStock', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="processingPlans view large-9 medium-8 columns content">
    <h3><?= h($processingPlan->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($processingPlan->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($processingPlan->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creater Id') ?></th>
            <td><?= $this->Number->format($processingPlan->creater_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Worker Id') ?></th>
            <td><?= $this->Number->format($processingPlan->worker_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Work Point') ?></th>
            <td><?= $this->Number->format($processingPlan->work_point) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($processingPlan->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($processingPlan->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Processed Stock') ?></h4>
        <?php if (!empty($processingPlan->processed_stock)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Processed Stock') ?></th>
                <th scope="col"><?= __('Processing Plan Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Quantity Before') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($processingPlan->processed_stock as $processedStock): ?>
            <tr>
                <td><?= h($processedStock->id) ?></td>
                <td><?= h($processedStock->processed_stock) ?></td>
                <td><?= h($processedStock->processing_plan_id) ?></td>
                <td><?= h($processedStock->quantity) ?></td>
                <td><?= h($processedStock->quantity_before) ?></td>
                <td><?= h($processedStock->created) ?></td>
                <td><?= h($processedStock->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProcessedStock', 'action' => 'view', $processedStock->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProcessedStock', 'action' => 'edit', $processedStock->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProcessedStock', 'action' => 'delete', $processedStock->id], ['confirm' => __('Are you sure you want to delete # {0}?', $processedStock->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
