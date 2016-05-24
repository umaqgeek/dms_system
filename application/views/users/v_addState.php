<div class="row">
    <div class="col-md-12">

        <center><h3>Add Area</h3></center>

        <button type="button" class="btn btn-info" 
                onclick="location.href='<?=site_url('users/manageLocationArea'); ?>';"> Back </button>
        <br /><br />
        
        <form method="post" action="<?=site_url('users/manageLocationArea/addprocess/s'); ?>">
            <table class="table">
                <tr>
                    <th>Area Name</th>
                    <th>:</th>
                    <td>
                        <input type="text" name="s_desc" class="form-control" placeholder="Insert area name here." />
                    </td>
                </tr>
            </table>

            <button type="submit" class="btn btn-success"> Add Area </button>
        </form>

    </div>
</div>