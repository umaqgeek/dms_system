<div class="row">
    <div class="col-md-12">
        
        <center><h3>List of Public Documents</h3></center>
        
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
</script>