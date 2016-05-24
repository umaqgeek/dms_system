<div class="row">
    <div class="col-md-12">
        
        <button type="button" class="btn btn-info" 
                onclick="location.href='<?=site_url('users/privateDocument'); ?>';"> Back to My Documents </button>
        <br />
        <br />
        
        <form method="post" action="<?=site_url('users/privateDocument_process'); ?>" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <th>File Name</th>
                    <th>:</th>
                    <td>
                        <input type="text" name="d_name" class="form-control" placeholder="Insert the file name here." />
                    </td>
                </tr>
                <tr>
                    <th>File Upload</th>
                    <th>:</th>
                    <td>
                        <input type="file" name="d_link" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <th>Description</th>
                    <th>:</th>
                    <td>
                        <textarea name="d_desc" class="form-control" placeholder="Insert the description here."></textarea>
                    </td>
                </tr>
            </table>
            
            <button type="submit" class="btn btn-success"> Add </button>
        </form>
        
    </div>
</div>