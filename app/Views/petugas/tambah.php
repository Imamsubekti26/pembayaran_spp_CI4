<?= $this->extend('layout/menubar') ?>

<?= $this->section('content') ?>

<h1 class="title mb-6">Tambah Data Petugas</h1>

<form action="<?= base_url('petugas/tambah') ?>" method="POST">
  <div class="field">
    <label class="label">Nama</label>
    <div class="control">
      <input class="input" type="text" placeholder="misal: Andi Hermansyah" name="nama_petugas">
    </div>
  </div>
  <div class="columns">
    <div class="field column">
      <label class="label">Username</label>
      <div class="control">
        <input class="input" type="text" placeholder="misal: andi123" name="username">
      </div>
    </div>
    <div class="field column">
      <label class="label">Password</label>
      <div class="control">
        <input class="input" type="password" placeholder="***" name="password">
      </div>
    </div>
  </div>
  <div class="field">
    <label class="label">Level</label>
    <div class="select">
      <select name="level">
        <option value="petugas">Petugas</option>
        <option value="admin">Admin</option>
      </select>
    </div>
  </div>
  <div class="field">
    <input type='submit' class="button is-primary is-fullwidth" value="simpan">
  </div>
</form>
  
</div>

<?php if($flash) :?>
<script>alert("<?= $flash?>")</script>
<?php endif ?>

<?= $this->endSection() ?>