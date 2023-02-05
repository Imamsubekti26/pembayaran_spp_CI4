<?= $this->extend('layout/menubar') ?>

<?= $this->section('content') ?>

<h1 class="title mb-6">SPP atas nama '<?= $siswa['nama'] ?>'</h1>
<h2 class="subtitle"><b>Rp.<?= $dibayar ?>,-</b> sudah dibayar dari total <b>Rp.<?= $total ?>,-</b></h2>
<h2 class="subtitle">sisa tanggungan : <b>Rp.<?= $belum_bayar ?>,-</b></h2>

<div class="is-flex is-justify is-justify-content-end mb-6">
  <div class="field">
    <div class="control">
      <form action="<?= base_url('pembayaran/tambah')?>" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <button class="button is-link">Tambah data</button>
      </form>
    </div>
  </div>
</div>

<table class="table table is-fullwidth">
  <thead>
    <th width="5%">no</th>
    <th width="10%">tanggal bayar</th>
    <th width="10%">nominal</th>
    <th width="10%">petugas</th>
    <th width="15%">aksi</th>
  </thead>
  <tbody>
    <?php foreach ($pembayaran as $key => $value): ?>
    <tr>
      <td><?= $value['nomor']?></td>
      <td><?= $value['tgl_bayar']?></td>
      <td><?= $value['jumlah_bayar']?></td>
      <td><?= $value['nama_petugas']?></td>
      <td>
        <a href="<?= base_url('pembayaran/edit')."/".$value['id_pembayaran'] ?>">
          <button class="button is-primary has-tooltip-bottom is-small" data-tooltip="Edit/Hapus kelas">e</button>
        </a>
        <a href="<?= base_url('pembayaran')."?cari=&kelas=".$value['id_pembayaran'] ?>">
          <button class="button is-info has-tooltip-bottom is-small" data-tooltip="Lihat daftar siswa">s</button>
        </a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?= $this->endSection() ?>