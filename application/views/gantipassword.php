<div class="col-md-12">
    <div id="panel_1" class="box box-primary box-solid" >
      <div class="box-header with-border" >
        <h3 class="box-title">GANTI PASSWORD</h3> 
        <div class="box-tools pull-right">
        </div>
      </div>
      <div class="row">
    <div class="col-md-12">
            <div class="panel-body">
                <?php
                if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= $this->session->flashdata('success') ?>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $this->session->flashdata('error') ?>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('users/prosesUpdatePass') ?>" method="post">
                    <div class="form-group">
                        <label>PASSWORD LAMA</label>
                        <input name="old_password" type="password" class="form-control" id="old-password" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>PASSWORD BARU</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>ULANGI PASSWORD BARU</label>
                        <input name="password_confirm" type="password" class="form-control" id="password-confirm" placeholder="">
                    </div>

                    <button class="btn btn-primary btn-fill">UBAH PASSWORD</button>
                </form>
            </div>
    </div>

</div>
    </div>
</div>

