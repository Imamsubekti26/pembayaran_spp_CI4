<?= $this->extend('layout/menubar') ?>

<?= $this->section('content') ?>

<h1 class="title mb-6">Tambah Data</h1>

<form action="<?= base_url("spp/edit/$id") ?>" method="POST">
  <div class="columns">
    <div class="field column">
      <label class="label">Golongan</label>
      <div class="control">
        <input class="input" type="text" placeholder="misal: A" name="golongan" value="<?=$data['golongan']?>">
      </div>
    </div>
    <div class="field column">
      <label class="label">Tahun</label>
      <div class="control">
        <input class="input" type="text" placeholder="misal: 2024" name="tahun" value="<?=$data['tahun']?>">
      </div>
    </div>
    <div class="field column">
      <label class="label">Nominal</label>
      <div class="control">
        <input class="input" type="text" placeholder="misal: 2000000" name="nominal" value="<?=$data['nominal']?>">
      </div>
    </div>
  </div>
  <div class="columns">
    <div class="field column">
      <input type="submit" name="submit" class="button is-primary is-fullwidth" value="simpan perubahan">
    </div>
    <div class="field column is-one-fifth">
      <a href="<?= base_url("spp/hapus/$id") ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
        <input type="button" value="hapus data" class="button is-danger is-fullwidth" >
      </a>
    </div>
  </div>
</form>
  
</div>

<?php if($flash) :?>
<script>alert("<?= $flash?>")</script>
<?php endif ?>

<?= $this->endSection() ?>