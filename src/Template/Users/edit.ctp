<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var array $roles
 */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('ユーザを編集') ?></legend>
        <?php
            echo $this->Form->control('username', ['label' => 'ユーザ名']);
            echo $this->Form->control('email', ['label' => 'Eメール']);
            echo $this->Form->control('password_hash', ['label' => 'パスワード']);
            echo $this->Form->control('role_id', ['options' => $roles, 'label' => 'ユーザロール']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <?= $this->Html->link(__('戻る'), ['action' => 'index']) ?>
</div>
