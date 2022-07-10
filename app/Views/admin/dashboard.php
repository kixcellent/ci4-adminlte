<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>
    <h1>Welcome, <?= user()->username ?></h1>
<?= $this->endSection() ?>