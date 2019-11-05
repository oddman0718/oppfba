<?php
/**
 * @var AppView $this
 * @var ProcessingPlan[]|CollectionInterface $processingPlans
 */

use App\Model\Entity\ProcessingPlan;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

$conditions = [];
if ($this->request->getQuery()) {
    foreach ($this->request->getQuery() as $key => $value) {
        switch ($key) {
            case 'page':
            case 'direction':
            case 'sort':
                break;
            default:
                if (!empty($value)) {
                    $conditions[$key]= trim($value);
                }
                break;
        }
    }
}
?>

<div class="processingPlans index large-9 medium-8 columns content">
    <h3><?= __('加工プラン') ?></h3>
    <?= $this->Form->create(null, ['type' => 'get']) ?>
    <?php
        echo $this->Form->control('creater_id', ['label' => '作業者']);
        echo $this->Form->control('created', ['label' => '作成日時']);
        echo $this->Form->control('status', ['label' => 'ステータス']);
    ?>
    <?= $this->Form->button(__('検索')) ?>
    <?= $this->Form->end() ?>
    <table>
        <?= $this->Html->link(__('加工プラン作成'), ['action' => 'add']) ?>
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', 'ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status', 'ステータス') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creater_id', '作成者') ?></th>
                <th scope="col"><?= $this->Paginator->sort('worker_id', '作業者') ?></th>
                <th scope="col"><?= $this->Paginator->sort('work_point', 'ポイント') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', '作成日時') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified', '更新日時') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($processingPlans as $processingPlan): ?>
            <tr>
                <td><?= $this->Number->format($processingPlan->id) ?></td>
                <td><?= h($processingPlan->status) ?></td>
                <td><?= $this->Number->format($processingPlan->creater_id) ?></td>
                <td><?= $this->Number->format($processingPlan->worker_id) ?></td>
                <td><?= $this->Number->format($processingPlan->work_point) ?></td>
                <td><?= h($processingPlan->created) ?></td>
                <td><?= h($processingPlan->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $processingPlan->id]) ?>
                    <?= $this->Html->link(__('編集'), ['action' => 'edit', $processingPlan->id]) ?>
                    <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $processingPlan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $processingPlan->id)]) ?>
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
