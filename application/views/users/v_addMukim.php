<div class="row">
    <div class="col-md-12">

        <center><h3>Add Location</h3></center>

        <button type="button" class="btn btn-info" 
                onclick="location.href='<?=site_url('users/manageLocationArea'); ?>';"> Back </button>
        <br /><br />
        
        <form method="post" action="<?=site_url('users/manageLocationArea/addprocess/m'); ?>">
            <table class="table">
                <tr>
                    <th>Location Name</th>
                    <th>:</th>
                    <td>
                        <input type="text" name="m_desc" class="form-control" placeholder="Insert location name here." />
                    </td>
                </tr>
            </table>

            <button type="submit" class="btn btn-success"> Add Location </button>
        </form>

    </div>
</div>