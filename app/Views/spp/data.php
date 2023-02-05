<?= $this->extend('layout/menubar') ?>

<?= $this->section('content') ?>

<h1 class="title mb-6">Monitor Data SPP</h1>

<div class="is-flex is-justify is-justify-content-space-between mb-6">
  <form action="<?=base_url('spp')?>" method="GET" class="columns">
    <div class="field column">
      <div class="control">
        <div class="select">
          <select name="tahun">
            <option value="all">Tahun</option>
            <option value="all">Semua</option>
            <?php foreach ($tahun as $key => $value) : ?>
              <option value="<?= $value['tahun'] ?>" ><?= $value['tahun'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>  
    </div>
    <div class="field column">
      <div class="control">
        <input type="submit" value="s" class="button is-info">
      </div>
    </div>
  </form>
  <div class="field">
    <div class="control">
      <a href="<?= base_url('spp/tambah')?>">
        <button class="button is-link">Tambah data</button>
      </a>
    </div>
  </div>
</div>

<table class="table table is-fullwidth">
  <thead>
    <th width="5%">no</th>
    <th width="10%">tahun</th>
    <th width="10%">golongan</th>
    <th width="60%">nominal</th>
    <th width="15%">aksi</th>
  </thead>
  <tbody>
    <?php foreach ($spp as $key => $value) :?>
    <tr>
      <td><?= $value['nomor']?></td>
      <td><?= $value['tahun']?></td>
      <td><?= $value['golongan']?></td>
      <td>Rp.<?= $value['nominal']?>,-</td>
      <td>
        <a href="<?= base_url("spp/edit/"."/".$value['id_spp']) ?>">
          <button class="button is-primary has-tooltip-bottom is-small" data-tooltip="Edit/Hapus data">e</button>
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