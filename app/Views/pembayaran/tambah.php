<?= $this->extend('layout/menubar') ?>

<?= $this->section('content') ?>

<h1 class="title mb-6">input SPP atas nama '<?= $siswa['nama'] ?>'</h1>

<form action="<?= base_url("pembayaran/tambah/input")?>" method="POST">
  <div class="columns">
    <div class="field column">
      <label class="label">Tanggal</label>
      <div class="control">
        <input class="input" type="date" placeholder="misal: 2020" value="<?= date('Y-m-d') ?>" name="tanggal">
      </div>
    </div>
    <div class="field column">
      <label class="label">Nominal</label>
      <div class="control">
        <input class="input" type="text" placeholder="misal: A"  name="nominal">
      </div>
    </div>
    <div class="field column">
      <label class="label">petugas</label>
      <div class="control">
        <input class="input" type="text" placeholder="misal: RPL" name="petugas">
      </div>
    </div>
  </div>
  <div class="field">
    <button class="button is-primary is-fullwidth">simpan</button>
  </div>
</form>

<?php if($flash) :?>
<script>alert("<?= $flash?>")</script>
<?php endif ?>

<?= $this->endSection() ?>