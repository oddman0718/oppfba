<?php
/**
 * @var AppView $this
 * @var ProcessingPlan $processingPlan
 */

use App\Model\Entity\ProcessingPlan;
use App\View\AppView; ?>

<div class="processingPlans form large-9 medium-8 columns content">
    <?= $this->Form->create($processingPlan) ?>
    <fieldset>
        <legend><?= __('加工プラン作成') ?></legend>
        <?php
            echo $this->Form->control('status', ['label' => 'ステータス']);
            echo $this->Form->control('creater_id', ['label' => '作成者']);
            echo $this->Form->control('worker_id', ['label' => '作業者']);
            echo $this->Form->control('work_point', ['label' => 'ポイント']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('登録')) ?>
    <?= $this->Form->end() ?>
    <?= $this->Html->link(__('戻る'), ['action' => 'index']) ?>
</div>
