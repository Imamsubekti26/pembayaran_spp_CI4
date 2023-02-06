<?= $this->extend('layout/menubar') ?>

<?= $this->section('content') ?>

<h1 class="title mb-6">Tambah Data Siswa</h1>

<form action="<?= base_url('siswa/tambah') ?>" method="POST">
  <div class="columns">
    <div class="field column">
      <label class="label">NISN</label>
      <div class="control">
        <input class="input" type="text" placeholder="misal: 0011348937" name="nisn" value="<?= old('nisn') ?>">
      </div>
    </div>
    <div class="field column">
      <label class="label">NIS</label>
      <div class="control">
        <input class="input" type="text" placeholder="misal: 2213" name="nis" value="<?= old('nis') ?>">
      </div>
    </div>
    <div class="field column">
      <label class="label">Kelas</label>
      <div class="select is-fullwidth">
        <select name="kelas">
          <option value="">Pilih Kelas</option>
          <?php foreach ($kelas as $key => $value) : ?>
            <option value="<?= $value['id_kelas'] ?>"><?= $value['kode kelas'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
  </div>
  <div class="field">
    <label class="label">Nama</label>
    <div class="control">
      <input class="input" type="text" placeholder="misal: Dika Hermansyah M." name="nama"  value="<?= old('nama') ?>">
    </div>
  </div>
  <div class="columns">
    <div class="field column">
      <label class="label">Alamat</label>
      <div class="control">
        <input class="input" type="text" placeholder="format: dusun, desa, kecamatan, kabupaten" name="alamat" value="<?= old('alamat') ?>">
      </div>
    </div>
    <div class="field column is-one-third">
      <label class="label">No. Telpon</label>
      <div class="control">
        <input class="input" type="text" placeholder="misal: 08342..." name="no_telp" value="<?= old('no_telp') ?>">
      </div>
    </div>
  </div>
  <div class="columns">
    <div class="field column">
      <label class="label">SPP tahun ke-1</label>
      <div class="select is-fullwidth">
        <select name="spp[0]">
          <option value="null">belum ada</option>
          <?php foreach ($spp as $key => $value) : ?>
            <option value="<?= $value['id_spp'] ?>"><?= $value['tahun']."-".$value['golongan']."-".$value['nominal'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
    <div class="field column">
      <label class="label">SPP tahun ke-2</label>
      <div class="select is-fullwidth">
        <select name="spp[1]">
          <option value="null">belum ada</option>
          <?php foreach ($spp as $key => $value) : ?>
            <option value="<?= $value['id_spp'] ?>"><?= $value['tahun']."-".$value['golongan']."-".$value['nominal'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
    <div class="field column">
      <label class="label">SPP tahun ke-3</label>
      <div class="select is-fullwidth">
        <select name="spp[2]">
          <option value="null">belum ada</option>
          <?php foreach ($spp as $key => $value) : ?>
            <option value="<?= $value['id_spp'] ?>"><?= $value['tahun']."-".$value['golongan']."-".$value['nominal'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
    <div class="field column">
      <label class="label">SPP tahun ke-4</label>
      <div class="select is-fullwidth">
        <select name="spp[3]">
          <option value="null">belum ada</option>
          <?php foreach ($spp as $key => $value) : ?>
            <option value="<?= $value['id_spp'] ?>"><?= $value['tahun']."-".$value['golongan']."-".$value['nominal'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
  </div>
  <div class="field">
    <input type="submit" class="button is-primary is-fullwidth" value="simpan">
  </div>
</form>
  

<?php if($flash) :?>
<script>alert("<?= $flash?>")</script>
<?php endif ?>

<?= $this->endSection() ?>