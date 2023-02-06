<?= $this->extend('layout/menubar') ?>

<?= $this->section('content') ?>

<h1 class="title mb-6">Monitor Data Petugas</h1>

<div class="columns">
    <div class="field column">
      <div class="control">
        <input class="input" type="text" placeholder="Cari...">
      </div>
    </div>
    <div class="field column is-1">
    <button class="button is-info">s</button>
    </div>
    <div class="field column is-3 is-flex is-justify-content-end">
      <div class="control">
        <a href="<?= base_url('petugas/tambah')?>">
          <button class="button is-link">Tambah data</button>
        </a>
      </div>
    </div>
  </div>

<table class="table table is-fullwidth">
  <thead>
    <th width="5%">no</th>
    <th width="10%">id</th>
    <th width="20%">nama</th>
    <th width="20%">username</th>
    <th width="15%">aksi</th>
  </thead>
  <tbody>
    <?php foreach ($data as $key => $value) :?>
    <tr>
      <td><?= $value['nomor']?></td>
      <td><?= $value['id_petugas']?></td>
      <td><?= $value['nama_petugas']?></td>
      <td><?= $value['username']?></td>
      <td>
        <a href="<?= base_url('petugas/edit/'."/".$value['id_petugas'])?>">
            <button class="button is-primary has-tooltip-bottom is-small" data-tooltip="Edit/Hapus siswa">e</button>
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