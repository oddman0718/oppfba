<h1>ログイン</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('username', ['label' => 'ユーザ名']) ?>
<?= $this->Form->control('password_hash', ['label' => 'パスワード']) ?>
<?= $this->Form->button('ログイン') ?>
<?= $this->Form->end() ?>
