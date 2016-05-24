<?php if ($p == 'm') { ?>

<div class="row">
    <div class="col-md-12">

        <center><h3>Edit Location</h3></center>

        <button type="button" class="btn btn-info" 
                onclick="location.href='<?=site_url('users/manageLocationArea'); ?>';"> Back </button>
        <br /><br />
        
        <form method="post" action="<?=site_url('users/manageLocationArea/editprocess/m'); ?>">
            <input type="hidden" name="idx" value="<?=$this->my_func->custom_encrypt($d->m_id); ?>" />
            <table class="table">
                <tr>
                    <th>Location Name</th>
                    <th>:</th>
                    <td>
                        <input type="text" name="m_desc" value="<?=$d->m_desc; ?>" class="form-control" placeholder="Insert location name here." />
                    </td>
                </tr>
            </table>

            <button type="submit" class="btn btn-success"> Save </button>
        </form>

    </div>
</div>

<?php } else if ($p == 's') { ?>

<div class="row">
    <div class="col-md-12">

        <center><h3>Edit Area</h3></center>

        <button type="button" class="btn btn-info" 
                onclick="location.href='<?=site_url('users/manageLocationArea'); ?>';"> Back </button>
        <br /><br />
        
        <form method="post" action="<?=site_url('users/manageLocationArea/editprocess/s'); ?>">
            <input type="hidden" name="idx" value="<?=$this->my_func->custom_encrypt($d->s_id); ?>" />
            <table class="table">
                <tr>
                    <th>Area Name</th>
                    <th>:</th>
                    <td>
                        <input type="text" name="s_desc" value="<?=$d->s_desc; ?>" class="form-control" placeholder="Insert area name here." />
                    </td>
                </tr>
            </table>

            <button type="submit" class="btn btn-success"> Save </button>
        </form>

    </div>
</div>

<?php } ?>

