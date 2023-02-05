<?= $this->extend('layout/base') ?>

<?= $this->section('content') ?>
    
<div class="is-flex is-justify-content-center is-align-items-center" style="width:100vw; height:100vh;">
<div class="box p-6" style="width:30vw;">
  <h2 class="title has-text-centered">Login</h2>
  <form action="">
    <div class="field my-5">
      <label class="label">Username</label>
      <div class="control has-icons-left">
        <input class="input is-primary" type="text" placeholder="Username">
    </div>
    <div class="field my-5">
      <label class="label">password</label>
      <div class="control has-icons-left">
        <input class="input is-primary" type="password" placeholder="Password">
    </div>
    <div class="field my-6">
      <input type="submit" class="button is-fullwidth is-success" value="Masuk">
    </div>
  </form>
</div>
</div>


<?= $this->endSection() ?>