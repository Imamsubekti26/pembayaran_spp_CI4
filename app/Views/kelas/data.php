<?= $this->extend('layout/menubar') ?>

<?= $this->section('content') ?>

<h1 class="title mb-6">Monitor Data Kelas</h1>

<div class="is-flex is-justify is-justify-content-end mb-6">
  <div class="field">
    <div class="control">
      <a href="<?= base_url('kelas/tambah')?>">
        <button class="button is-link">Tambah data</button>
      </a>
    </div>
  </div>
</div>

<table class="table table is-fullwidth">
  <thead>
    <th width="5%">no</th>
    <th width="10%">kode</th>
    <th width="10%">angkatan</th>
    <th width="10%">kelas</th>
    <th width="10%">jurusan</th>
    <th width="15%">aksi</th>
  </thead>
  <tbody>
    <?php foreach ($kelas as $key => $value): ?>
    <tr>
      <td><?= $value['nomor']?></td>
      <td><?= $value['tingkatan']." ".$value['jurusan']." ".$value['kelas']?></td>
      <td><?= $value['angkatan']?></td>
      <td><?= $value['kelas']?></td>
      <td><?= $value['jurusan']?></td>
      <td>
        <a href="<?= base_url('kelas/edit')."/".$value['id_kelas'] ?>">
          <button class="button is-primary has-tooltip-bottom is-small" data-tooltip="Edit/Hapus kelas">e</button>
        </a>
        <a href="<?= base_url('siswa')."?cari=&kelas=".$value['id_kelas'] ?>">
          <button class="button is-info has-tooltip-bottom is-small" data-tooltip="Lihat daftar siswa">s</button>
        </a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php if($flash) :?>
<script>alert("<?= $flash?>")</script>
<?php endif ?>

<?= $this->endSection() ?>