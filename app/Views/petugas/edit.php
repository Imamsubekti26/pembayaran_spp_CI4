<?= $this->extend('layout/menubar') ?>

<?= $this->section('content') ?>

<h1 class="title mb-6">Edit Data Petugas</h1>

<form action="<?= base_url('petugas/edit'."/".$id)?>" method="POST">
  <div class="field">
    <label class="label">Nama</label>
    <div class="control">
      <input class="input" type="text" name="nama" placeholder="Andi Hermansyah" value="<?= $data['nama_petugas']?>">
    </div>
  </div>
  <div class="field">
    <label class="label">Username</label>
    <div class="control">
      <input class="input" type="text" name="username" placeholder="andi123" value="<?= $data['username']?>">
    </div>
  </div>
  <div class="columns">
    <div class="field column">
      <label class="label">Password Lama</label>
      <div class="control">
        <input class="input" type="password" name="pwd[lama]" placeholder="***">
      </div>
    </div>
    <div class="field column">
      <label class="label">Password Baru</label>
      <div class="control">
        <input class="input" type="password" name="pwd[baru]" placeholder="***">
      </div>
    </div>
    <div class="field column">
      <label class="label">Ulangi Password</label>
      <div class="control">
        <input class="input" type="password" name="pwd[confirm]" placeholder="***">
      </div>
    </div>
  </div>
  <div class="field">
    <label class="label">Level</label>
    <div class="select ">
      <select name="level">
        <option value="petugas" <?= $data['level']=='petugas'?'selected':'' ?>>Petugas</option>
        <option value="admin" <?= $data['level']=='admin'?'selected':'' ?>>Admin</option>
      </select>
    </div>
  </div>
  <div class="columns">
    <div class="field column">
      <input type="submit" value="simpan perubahan" class="button is-primary is-fullwidth">
    </div>
    <div class="field column is-one-fifth">
      <a href="<?= base_url("petugas/hapus"."/".$id) ?>">
        <input type="button" class="button is-danger is-fullwidth" value="hapus data">
      </a>
    </div>
  </div>
  
</form>
  
</div>

<?php if($flash) :?>
<script>alert("<?= $flash?>")</script>
<?php endif ?>

<?= $this->endSection() ?>