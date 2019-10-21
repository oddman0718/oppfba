<?php
/**
 * @var AppView $this
 * @var AmazonSku $amazonSku
 */

use App\Model\Entity\AmazonSku;
use App\View\AppView; ?>

<div class="amazonSku form large-9 medium-8 columns content">
    <?= $this->Form->create($amazonSku) ?>
    <fieldset>
        <legend><?= __('Amazon SKUを追加') ?></legend>
        <?php
            echo $this->Form->control('display_string', ['label' => '表記']);
            echo $this->Form->control('amazon_sku', ['label' => 'Amazon SKU']);
            echo $this->Form->control('fn_sku', ['label' => 'FNSKU']);
            echo $this->Form->control('product_model', ['label' => '製品型番']);
            echo $this->Form->control('quantity_contained', ['label' => '商品数']);
            echo $this->Form->control('unit_work_point', ['label' => 'ポイント']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('登録')) ?>
    <?= $this->Form->end() ?>
    <?= $this->Html->link(__('戻る'), ['action' => 'index']) ?>
</div>
