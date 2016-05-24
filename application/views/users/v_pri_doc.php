<div class="row">
    <div class="col-md-12">
        
        <center><h3>My Documents</h3></center>
        
        <button type="button" class="btn btn-success" 
                onclick="location.href='<?=site_url('users/privateDocument/add'); ?>';"> Add My Document </button>
        <br />
        <br />
        
        <table class="table" id="table1">
            <thead>
                <tr style="background-color: #eee;">
                    <th>#</th>
                    <th>View</th>
                    <th>File Name</th>
                    <th>Type</th>
                    <th>Size</th>
                    <th>Date Added</th>
                    <th>Description</th>
                    <th>Owner</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                if (isset($document) && !empty($document)) {
                    foreach ($document as $d) {
                ?>
                <tr>
                    <td><?=$i++; ?></td>
                    <td><?php
                    $dt_id = $d->dt_id;
                    if ($dt_id == 1) {
                        ?>
                        <a href="<?=base_url(); ?>assets/uploads/files/<?=$d->d_link; ?>" target="_blank">View File</a>
                        <?php
                    } else if ($dt_id == 2) {
                        ?>
                        <a href="<?=base_url(); ?>assets/uploads/files/<?=$d->d_link; ?>" target="_blank">
                            <img src="<?=base_url(); ?>assets/uploads/files/<?=$d->d_link; ?>" height="50" width="50" />
                        </a>
                        <?php
                    }
                    ?></td>
                    <td><?=$d->d_name; ?></td>
                    <td><?=$d->dt_desc; ?></td>
                    <td><?=number_format($d->d_size, 2); ?> kb</td>
                    <td><?=$this->my_func->sql_time_to_datetime($d->d_datetime); ?></td>
                    <td><?=$d->d_desc; ?></td>
                    <td><?=$d->u_fullname; ?></td>
                    <td>
                        <?php
                        $sess = $this->session->all_userdata();
                        $u_id_sess = $sess['u_id'];
                        $u_id_file = $d->u_id;
                        if ($u_id_file == $u_id_sess) {
                            $d_idx = $this->my_func->custom_encrypt($d->d_id);
                            ?>
                        <a onclick="return ask('Are you sure to delete this?');" href="<?=site_url('users/privateDocument_delete/'.$d_idx); ?>">
                            <span class="fa fa-remove"></span>
                        </a>
                        &nbsp;
                        <a onclick="return ask('Are you sure to public this?');" href="<?=site_url('users/changeDocument/1/'.$d_idx); ?>">
                            <span class="fa fa-adjust"></span>
                        </a>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <?php } } ?>
            </tbody>
        </table>
        
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#table1").DataTable();
    });
    
    function ask(ayat) {
        return confirm(ayat);
    }
</script>