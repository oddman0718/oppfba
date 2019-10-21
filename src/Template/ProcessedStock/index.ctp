<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProcessedStock[]|\Cake\Collection\CollectionInterface $processedStock
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Processed Stock'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Processing Plans'), ['controller' => 'ProcessingPlans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Processing Plan'), ['controller' => 'ProcessingPlans', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="processedStock index large-9 medium-8 columns content">
    <h3><?= __('Processed Stock') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('processed_stock') ?></th>
                <th scope="col"><?= $this->Paginator->sort('processing_plan_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity_before') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($processedStock as $processedStock): ?>
            <tr>
                <td><?= $this->Number->format($processedStock->id) ?></td>
                <td><?= $this->Number->format($processedStock->processed_stock) ?></td>
                <td><?= $processedStock->has('processing_plan') ? $this->Html->link($processedStock->processing_plan->id, ['controller' => 'ProcessingPlans', 'action' => 'view', $processedStock->processing_plan->id]) : '' ?></td>
                <td><?= $this->Number->format($processedStock->quantity) ?></td>
                <td><?= $this->Number->format($processedStock->quantity_before) ?></td>
                <td><?= h($processedStock->created) ?></td>
                <td><?= h($processedStock->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $processedStock->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $processedStock->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $processedStock->id], ['confirm' => __('Are you sure you want to delete # {0}?', $processedStock->id)]) ?>
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
