<div class="row">
    <div class="col-md-6">

        <button type="button" class="btn btn-success" 
                onclick="location.href = '<?= site_url('users/manageLocationArea/add/m'); ?>';">Add Location</button>
        <br /><br />

        <table class="table table-hover" id="table1">
            <thead>
                <tr style="background-color: #eee;">
                    <th><center>#.</center></th>
                    <th><center>Location Name</center></th>
                    <th><center>Action</center></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                if (isset($mukim) && !empty($mukim)) {
                    foreach ($mukim as $m) {
                        $idx = $this->my_func->custom_encrypt($m->m_id);
                        ?>
                        <tr>
                            <td><center><?= $i++; ?>.</center></td>
                            <td><center><?= $m->m_desc; ?></center></td>
        <td><center>
            <a href="<?=site_url('users/manageLocationArea/edit/m/?idx='.$idx); ?>">
                <span class="fa fa-folder-open-o"></span>
            </a>
            &nbsp;
            <a onclick="return ask('Are you sure to delete this?');" href="<?=site_url('users/manageLocationArea/delete/m/?idx='.$idx); ?>">
                <span class="fa fa-remove"></span>
            </a>
        </center></td>
                        </tr>
                <?php }
            }
            ?>
            </tbody>
        </table>

    </div>
    <div class="col-md-6">

        <button type="button" class="btn btn-success" 
                onclick="location.href = '<?= site_url('users/manageLocationArea/add/s'); ?>';">Add Area</button>
        <br /><br />

        <table class="table table-hover" id="table2">
            <thead>
                <tr style="background-color: #eee;">
                    <th><center>#.</center></th>
            <th><center>Area Name</center></th>
                    <th><center>Action</center></th>
            </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                if (isset($state) && !empty($state)) {
                    foreach ($state as $s) {
                        $idx = $this->my_func->custom_encrypt($s->s_id);
                        ?>
                        <tr>
                            <td><center><?= $i++; ?>.</center></td>
                    <td><center><?= $s->s_desc; ?></center></td>
        <td><center>
            <a href="<?=site_url('users/manageLocationArea/edit/s/?idx='.$idx); ?>">
                <span class="fa fa-folder-open-o"></span>
            </a>
            &nbsp;
            <a onclick="return ask('Are you sure to delete this?');" href="<?=site_url('users/manageLocationArea/delete/s/?idx='.$idx); ?>">
                <span class="fa fa-remove"></span>
            </a>
        </center></td>
                    </tr>
                <?php }
            }
            ?>
            </tbody>
        </table>

    </div>
</div>

<script>
    $(document).ready(function () {
        $("#table1").DataTable();
        $("#table2").DataTable();
    });
    
    function ask(ayat) {
        return confirm(ayat);
    }
</script>