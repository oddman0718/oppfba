<?php
/**
 * @var AppView $this
 * @var ProcessingPlan $processingPlan
 */

use App\Model\Entity\ProcessingPlan;
use App\View\AppView; ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Processing Plans'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Processed Stock'), ['controller' => 'ProcessedStock', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Processed Stock'), ['controller' => 'ProcessedStock', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="processingPlans form large-9 medium-8 columns content">
    <?= $this->Form->create($processingPlan) ?>
    <fieldset>
        <legend><?= __('Add Processing Plan') ?></legend>
        <?php
            echo $this->Form->control('status');
            echo $this->Form->control('creater_id');
            echo $this->Form->control('worker_id');
            echo $this->Form->control('work_point');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
