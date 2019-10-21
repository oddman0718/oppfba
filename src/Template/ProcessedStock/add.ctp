<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProcessedStock $processedStock
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Processed Stock'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Processing Plans'), ['controller' => 'ProcessingPlans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Processing Plan'), ['controller' => 'ProcessingPlans', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="processedStock form large-9 medium-8 columns content">
    <?= $this->Form->create($processedStock) ?>
    <fieldset>
        <legend><?= __('Add Processed Stock') ?></legend>
        <?php
            echo $this->Form->control('processed_stock');
            echo $this->Form->control('processing_plan_id', ['options' => $processingPlans]);
            echo $this->Form->control('quantity');
            echo $this->Form->control('quantity_before');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
