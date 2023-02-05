<?= $this->extend('layout/menubar') ?>

<?= $this->section('content') ?>

<h1 class="title mb-6">Monitor Data Siswa</h1>

<form action="<?= base_url('siswa') ?>" method="GET" class="columns">
  <div class="field column">
    <div class="control">
      <input class="input" type="text" placeholder="Cari nama, nisn, atau nis..." name="cari" value="<?= $get['cari']??''?>">
    </div>
  </div>
  <div class="field column is-2">
    <div class="control">
      <div class="select is-fullwidth">
        <select name="kelas">
          <option value="">Semua Kelas</option>
          <?php foreach ($kelas as $key => $value) : ?>
            <option value="<?= $value['id_kelas'] ?>"><?= $value['kode kelas'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
  </div>
  <div class="field column is-1">
    <input type="submit" class="button is-info" value="s">
  </div>
  <div class="field column is-3 is-flex is-justify-content-end">
    <div class="control">
      <a href="<?= base_url('siswa/tambah')?>">
        <input type="button" class="button is-link" value="Tambah data">
      </a>
    </div>
  </div>
</form>

<table class="table table is-fullwidth">
  <thead>
    <th width="10%">nisn</th>
    <th width="20%">nama</th>
    <th width="5%">nis</th>
    <th width="10%">kelas</th>
    <th width="40%">alamat</th>
    <th width="15%">aksi</th>
  </thead>
  <tbody>
    <?php foreach ($data as $key => $value) : ?>
      <tr>
        <td><?= $value['nisn'] ?></td>
        <td><?= $value['nama'] ?></td>
        <td><?= $value['nis'] ?></td>
        <td><?= $value['kelas'] ?></td>
        <td><?= $value['alamat'] ?></td>
        <td>
          <a href="<?= base_url('siswa/edit'."/".$value['nisn']) ?>">
            <button class="button is-primary has-tooltip-bottom is-small" data-tooltip="Edit/Hapus siswa">e</button>
          </a>
          <a href="<?= base_url('siswa') ?>">
            <button class="button is-info has-tooltip-bottom is-small" data-tooltip="Lihat data SPP">s</button>
          </a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?php if($flash) :?>
<script>alert("<?= $flash?>")</script>
<?php endif ?>

<?= $this->endSection() ?>