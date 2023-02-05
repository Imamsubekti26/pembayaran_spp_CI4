<?= $this->extend('layout/base') ?>

<?= $this->section('content') ?>

<div class="columns">
  <aside class="menu column is-one-fifth p-5" style='height:100vh;'>
    <p class="menu-label">Transaksi Pembayaran</p>
    <ul class="menu-list">
      <li><a href="<?= base_url('siswa')?>">Bayar SPP</a></li>
      <li><a href="<?= base_url('petugas')?>">Histori</a></li>
    </ul>
    <p class="menu-label">Monitor Data</p>
    <ul class="menu-list">
      <li><a href="<?= base_url('siswa')?>">Siswa</a></li>
      <li><a href="<?= base_url('petugas')?>">Petugas</a></li>
      <li><a href="<?= base_url('kelas')?>">Kelas</a></li>
      <li><a href="<?= base_url('spp')?>">SPP</a></li>
    </ul>
    <p class="menu-label">Pengaturan</p>
    <ul class="menu-list">
      <li><a href="<?= base_url('')?>">Profil Saya</a></li>
      <li><a href="<?= base_url('')?>">Keluar</a></li>
    </ul>
  </aside>
  <div class="column">
    <div class="p-6 m-6">
      <?= $this->renderSection('content') ?>
    </div>
  </div>
</div>

<?= $this->endSection() ?>


