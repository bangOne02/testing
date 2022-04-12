<script>
    $(document).ready(function(){
        $('#tujuan').change(function(){
            if($(this).val() == 9999){
                $('#itujuan').prop('disabled', false);
            }else{
                $('#itujuan').prop('disabled', true);
            }
        });

        var currDate = new Date();

        $('.date').datepicker({
            locale: {
            dateFormat: 'YYYY-MM-DD'
            },
            startDate : currDate,
        });

        $('#sasis').change(function(){
            var $id = $(this).val();

            $.ajax({
                url : base_url+'SuratJalan/getCont',
                type: 'post',
                dataType: 'json',
                data: {id:$id},
                success:function(data){
                    $('#container').val(data['nocont']).change();
                }
            });
        });
    });
</script>

<form id="form-update-sj" method="post">
            <div class="box-body">
                
                <div class="col-md-12">
                    <div class="form-group">
                        <br>
                        <label>NOMOR SURAT JALAN</label>
                            <input readonly="true" style="text-transform:uppercase" placeholder="" class="form-control" value="<?php echo $table->nomorsj; ?>" autocomplete="off" name="nomorsj" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <br>
                        <label>ASAL SURAT JALAN</label>
                            <select class="form-control" name="asal" style="color: black">
                                    <option value="surabaya">SURABAYA</option>
                                    <option value="lamongan">LAMONGAN</option>
                                    <option value="dampit">DAMPIT</option>
                                    <option value="lampung">LAMPUNG</option> 
                            </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <br>
                        <label>TUJUAN SURAT JALAN</label>
                            <!-- <select id="tujuan" class="form-control select2" name="tujuan" style="height: 20px;">
                            
                            </select> -->
                        <select class="form-control select2" id="tujuan" name="tujuan" style="color: black">
                            <?php
                                $i = 0; 
                                echo "<option value=9999>OTHER</option>";
                                foreach($tujuan as $row){
                                if ($row->id == $table->tujuan) {
                                    $i = 1;
                                    echo "<option value='".$row->id."' selected>".$row->description."</option>";
                                }else{
                                    echo "<option value='".$row->id."'>".$row->description."</option>";
                                }
                            } ?>
                        </select>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group">
                        <br>
                        <label>&nbsp;</label>
                            <input style="text-transform:uppercase" id="itujuan"
                            <?php if ($i == 0)
                            {
                                ?>
                                 value="<?php if ($i == 0) { echo strtoupper($table->tujuan); } ?>"
                                <?php
                            } else
                            {
                                ?>
                                disabled value="<?php if ($i == 0) { echo strtoupper($table->tujuan); } ?>"
                            <?php    
                            }
                            ?>
                             placeholder="OTHER..." class="form-control" name="itujuan" required>
                    </div>
                </div>  
                
                <div class="col-md-12">
                    <div class="form-group" >
                        <br>
                        <label>NAMA PIC</label>
                            <input style="text-transform:uppercase" placeholder="" autocomplete="off" value="<?php echo $table->pic; ?>" class="form-control" name="pic" required>
                    </div>
                </div>
                <?php
                if ($table->size == 0)
                {
                ?>   
                    <div class="col-md-12" id="formtugas">
                    <div class="form-group" id="idtugas">
                        <label>TUGAS</label>
                            <textarea style="text-transform:uppercase;resize: none;height: 150px;" class="form-control" id="tugas" name="tugas"><?php echo $table->tugas; ?></textarea>
                    </div>
                    </div>
                <?php
                } else
                {
                ?>
                    <div class="col-md-12" id="formsasis">
                    <div class="form-group" >
                            <label>CHASIS KENDARAAN</label>
                            <select id="sasis" class="form-control select2" name="sasis" >
                            <?php
                                foreach($chasis as $row){
                                    if ($row->id == $table->sasis) {
                                        echo "<option value='".$row->id."' selected>".$row->chasis."</option>";
                                    }else{
                                        echo "<option value='".$row->id."'>".$row->chasis."</option>";
                                    }
                                } 
                            ?>
                            </select>
                    </div>
                    </div> 
                    <div class="col-md-12" id="formcontainer">
                        <div class="form-group">
                            <br>
                            <label>NOMOR CONTAINER</label>
                                <select id="container" class="form-control select2" name="nocontainer" >
                                <?php
                                    foreach($container as $row){
                                        if ($row->id == $table->nocontainer) {
                                            echo "<option value='".$row->id."' selected>".$row->container."</option>";
                                        }else{
                                            echo "<option value='".$row->id."'>".$row->container."</option>";
                                        }
                                    } 
                                ?>
                                </select>
                        </div>
                    </div>
                    <div class="col-md-12" id="formmuatan">
                        <div class="form-group">
                            <br>
                            <label>JENIS MUATAN</label>
                                <input style="text-transform:uppercase" placeholder="" value="<?php echo $table->jenismuatan; ?>" class="form-control" id="isimuatan" name="isimuatan">
                        </div>
                    </div> 
                    <div class="col-md-12" id="formgembok">
                        <div class="form-group">
                            <br>
                            <label>GEMBOK</label>
                                <input style="text-transform:uppercase" placeholder="" value="<?php echo $table->gembok; ?>" class="form-control" id="gembok" name="gembok">
                        </div>
                    </div>  
                    <div class="col-md-12" id="formpelayaran">
                        <div class="form-group">
                            <br>
                            <label>SEGEL PELAYARAN</label>
                                <input style="text-transform:uppercase" placeholder="" value="<?php echo $table->segelpelayaran ; ?>" class="form-control" id="segelpelayaran" name="segelpelayaran">
                        </div>
                    </div> 
                    <div class="col-md-12" id="formbeacukai">
                        <div class="form-group">
                            <br>
                            <label>SEGEL BEACUKAI</label>
                                <input style="text-transform:uppercase" placeholder="" class="form-control" value="<?php echo $table->segelbeacukai ; ?>" id="segelbeacukai" name="segelbeacukai">
                        </div>
                    </div> 
                <?php
                }
                ?>
                <div class="col-md-12">
                    <div class="form-group">
                        <br>
                        <label>NAMA KENDARAAN</label>
                            <select id="kendaraan" class="form-control select2" name="kendaraan">
                            <?php
                                foreach($kendaraan as $row){
                                    if ($row->id == $table->kendaraan) {
                                        echo "<option value='".$row->id."' selected>".$row->nopol." / ".$row->nama_jenis."</option>";
                                    }else{
                                        echo "<option value='".$row->id."'>".$row->nopol." / ".$row->nama_jenis."</option>";
                                    }
                                } 
                            ?>
                            </select>
                    </div>
                </div> 
                <div class="col-md-12">
                    <div class="form-group">
                        <br>
                        <label>DRIVER KENDARAAN</label>
                            <select id="sopir" class="form-control select2" name="sopir">
                            <?php
                                foreach($driver as $row){
                                    if ($row->id_mdriver == $table->sopir) {
                                        echo "<option value='".$row->id_mdriver."' selected>".strtoupper($row->nama_mdriver)."</option>";
                                    }else{
                                        echo "<option value='".$row->id_mdriver."'>".strtoupper($row->nama_mdriver)."</option>";
                                    }
                                } 
                            ?>
                            </select>
                    </div>
                </div> 
                
                <div class="col-md-12">
                        <div class="form-group">
                            <br>
                            <label>TANGGAL RENCANA KEBERANGKATAN
                            </label>
                            <input class="form-control date" data-date-format="dd-mm-yyyy" placeholder="" value="<?php echo $table->tglberangkat; ?>" name="tanggal" autocomplete="off" style="height: fit-content;" required>
                        </div> 
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <br>
                        <label>KETERANGAN</label>
                            <input style="text-transform:uppercase" placeholder="" value="<?php echo $table->keterangan ; ?>" class="form-control" name="keterangan">
                    </div>
                </div>
                
                <div id="myDIV" class="col-md-12">
                <div class="box-footer">
                    <input type="hidden" name="size" value="<?php echo $table->size; ?>" required>
                    <input type="hidden" name="id" value="<?php echo $table->id; ?>" required>
                    <input type="hidden" name="jenis" value="<?php echo $table->jenis; ?>" required>
                    <button type="submit" id="butn" style="background-color: #005b71; border-color: #005b71;" class="btn btn-sm btn-primary btn-flat pull-right">UPDATE</button>
                </div>
                </div>
            </div>
            <!-- /.box-body -->
            
</form>