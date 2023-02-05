<?= $this->extend('layout/menubar') ?>

<?= $this->section('content') ?>

<h1 class="title mb-6">Tambah Data</h1>

<form action="<?= base_url('spp/tambah') ?>" method="POST">
  <div class="columns">
    <div class="field column">
      <label class="label">Golongan</label>
      <div class="control">
        <input class="input" type="text" placeholder="misal: A" name="golongan">
      </div>
    </div>
    <div class="field column">
      <label class="label">Tahun</label>
      <div class="control">
        <input class="input" type="text" placeholder="misal: 2024" name="tahun">
      </div>
    </div>
    <div class="field column">
      <label class="label">Nominal</label>
      <div class="control">
        <input class="input" type="text" placeholder="misal: 2000000" name="nominal">
      </div>
    </div>
  </div>
  <div class="field">
    <input type="submit" class="button is-primary is-fullwidth" value="simpan">
  </div>
</form>
  
</div>

<?php if($flash) :?>
<script>alert("<?= $flash?>")</script>
<?php endif ?>

<?= $this->endSection() ?>