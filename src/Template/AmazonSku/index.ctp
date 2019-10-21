<?php
/**
 * @var AppView $this
 * @var AmazonSku[]|CollectionInterface $amazonSku
 */

use App\Model\Entity\AmazonSku;
use App\View\AppView;
use Cake\Collection\CollectionInterface; ?>

<div class="amazonSku index large-9 medium-8 columns content">
    <h3><?= __('Amazon SKU') ?></h3>
    <table>
        <?= $this->Html->link(__('Amazon SKUを追加'), ['action' => 'add']) ?>
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', 'ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('display_string', '表記') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amazon_sku', 'Amazon SKU') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fn_sku', 'FNSKU') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_model', '製品型番') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity_contained', '商品数') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unit_work_point', 'ポイント') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', '作成日時') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified', '更新日時') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($amazonSku as $amazonSku): ?>
            <tr>
                <td><?= $this->Number->format($amazonSku->id) ?></td>
                <td><?= h($amazonSku->display_string) ?></td>
                <td><?= h($amazonSku->amazon_sku) ?></td>
                <td><?= h($amazonSku->fn_sku) ?></td>
                <td><?= h($amazonSku->product_model) ?></td>
                <td><?= $this->Number->format($amazonSku->quantity_contained) ?></td>
                <td><?= $this->Number->format($amazonSku->unit_work_point) ?></td>
                <td><?= h($amazonSku->created) ?></td>
                <td><?= h($amazonSku->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('編集'), ['action' => 'edit', $amazonSku->id]) ?>
                    <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $amazonSku->id], ['confirm' => __('Are you sure you want to delete # {0}?', $amazonSku->id)]) ?>
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
