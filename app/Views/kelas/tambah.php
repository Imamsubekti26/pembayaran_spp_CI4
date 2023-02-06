<?= $this->extend('layout/menubar') ?>

<?= $this->section('content') ?>

<h1 class="title mb-6">Tambah Data Kelas</h1>

<form action="<?= base_url("kelas/tambah")?>" method="POST">
  <div class="columns">
    <div class="field column">
      <label class="label">Angkatan</label>
      <div class="control">
        <input class="input" type="text" placeholder="misal: 2020" value="<?=$tahun_ini?>" name="angkatan">
      </div>
    </div>
    <div class="field column">
      <label class="label">Kelas</label>
      <div class="control">
        <input class="input" type="text" placeholder="misal: A"  name="kelas">
      </div>
    </div>
    <div class="field column">
      <label class="label">Jurusan</label>
      <div class="control">
        <input class="input" type="text" placeholder="misal: RPL"  name="jurusan">
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