<?= $this->extend('layout/menubar') ?>

<?= $this->section('content') ?>

<h1 class="title mb-6">Edit Data Kelas</h1>

<form action="<?= base_url("kelas/edit/$id") ?>" method="POST">
  <div class="columns">
    <div class="field column">
      <label class="label">Angkatan</label>
      <div class="control">
        <input class="input" name="angkatan" type="text" placeholder="misal: 2020" value="<?= $data['angkatan']?>">
      </div>
    </div>
    <div class="field column">
      <label class="label">Kelas</label>
      <div class="control">
        <input class="input" name="kelas" type="text" placeholder="misal: A" value="<?= $data['kelas']?>">
      </div>
    </div>
    <div class="field column">
      <label class="label">Jurusan</label>
      <div class="control">
        <input class="input" name="jurusan" type="text" placeholder="misal: RPL" value="<?= $data['jurusan']?>">
      </div>
    </div>
  </div>
  <div class="columns">
    <div class="field column">
      <input type="submit" name="submit" class="button is-primary is-fullwidth" value="simpan perubahan">
    </div>
    <div class="field column is-one-fifth">
      <a href="<?= base_url("kelas/hapus/$id") ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
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