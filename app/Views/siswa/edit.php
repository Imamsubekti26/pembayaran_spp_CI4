<?= $this->extend('layout/menubar') ?>

<?= $this->section('content') ?>

<h1 class="title mb-6">Edit Data Siswa</h1>

<form action="<?= base_url('siswa/edit'."/".$id) ?>" method="POST">
  <div class="columns">
    <div class="field column">
      <label class="label">NISN</label>
      <div class="control">
        <input class="input" type="text" placeholder="misal: 0011348937" name="nisn" value="<?= $data['nisn'] ?>">
      </div>
    </div>
    <div class="field column">
      <label class="label">NIS</label>
      <div class="control">
        <input class="input" type="text" placeholder="misal: 2213" name="nis" value="<?= $data['nis'] ?>">
      </div>
    </div>
    <div class="field column">
      <label class="label">Kelas</label>
      <div class="select is-fullwidth">
        <select name="kelas">
          <option value="">Pilih Kelas</option>
          <?php foreach ($kelas as $key => $value) : ?>
            <option value="<?= $value['id_kelas'] ?>" <?= $value['id_kelas'] == $data['id_kelas']? 'selected' : ''?> ><?= $value['kode kelas'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
  </div>
  <div class="field">
    <label class="label">Nama</label>
    <div class="control">
      <input class="input" type="text" placeholder="misal: Dika Hermansyah M." name="nama" value="<?= $data['nama'] ?>">
    </div>
  </div>
  <div class="columns">
    <div class="field column">
      <label class="label">Alamat</label>
      <div class="control">
        <input class="input" type="text" placeholder="format: dusun, desa, kecamatan, kabupaten" name="alamat" value="<?= $data['alamat'] ?>">
      </div>
    </div>
    <div class="field column is-one-third">
      <label class="label">No. Telpon</label>
      <div class="control">
        <input class="input" type="text" placeholder="misal: 08342..." name="no_telp" value="<?= $data['no_telp'] ?>">
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
            <option value="<?= $value['id_spp'] ?>" <?= $value['id_spp']== $data['id_spp'][0]?'selected':'' ?> ><?= $value['tahun']."-".$value['golongan']."-".$value['nominal'] ?></option>
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
            <option value="<?= $value['id_spp'] ?>" <?= $value['id_spp']== $data['id_spp'][1]?'selected':'' ?> ><?= $value['tahun']."-".$value['golongan']."-".$value['nominal'] ?></option>
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
            <option value="<?= $value['id_spp'] ?>" <?= $value['id_spp']== $data['id_spp'][2]?'selected':'' ?> ><?= $value['tahun']."-".$value['golongan']."-".$value['nominal'] ?></option>
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
            <option value="<?= $value['id_spp'] ?>" <?= $value['id_spp']== $data['id_spp'][3]?'selected':'' ?> ><?= $value['tahun']."-".$value['golongan']."-".$value['nominal'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
  </div>
  <div class="columns">
    <div class="field column">
      <input type="submit" name="submit" class="button is-primary is-fullwidth" value="simpan perubahan">
    </div>
    <div class="field column is-one-fifth">
      <a href="<?= base_url("siswa/hapus/$id") ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
        <input type="button" value="hapus data" class="button is-danger is-fullwidth" >
      </a>
    </div>
  </div>
</form>
  

<?php if($flash) :?>
<script>alert("<?= $flash?>")</script>
<?php endif ?>

<?= $this->endSection() ?>