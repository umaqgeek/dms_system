<div class="row">
    <div class="col-md-12">
        
        <center>
            <h3>Add My Document</h3>
        </center>
        
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
                        <em><h5>Format allowed: gif, jpg, jpeg, png, pdf, txt, text, doc, docx, word, xls, and xlsx.</h5></em>
                    </td>
                </tr>
                <tr>
                    <th>Description</th>
                    <th>:</th>
                    <td>
                        <textarea name="d_desc" class="form-control" placeholder="Insert the description here."></textarea>
                    </td>
                </tr>
                <tr>
                    <th>Location (Optional)</th>
                    <th>:</th>
                    <td>
                        <select name="m_id" class="form-control">
                            <option value="0">-- Please Choose --</option>
                            <?php
                            if (isset($mukim) && !empty($mukim)) {
                                foreach ($mukim as $m) {
                            ?>
                            <option value="<?=$m->m_id; ?>"><?=$m->m_desc; ?></option>
                            <?php } } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Area (Optional)</th>
                    <th>:</th>
                    <td>
                        <select name="s_id" class="form-control">
                            <option value="0">-- Please Choose --</option>
                            <?php
                            if (isset($state) && !empty($state)) {
                                foreach ($state as $s) {
                            ?>
                            <option value="<?=$s->s_id; ?>"><?=$s->s_desc; ?></option>
                            <?php } } ?>
                        </select>
                    </td>
                </tr>
            </table>
            
            <button type="submit" class="btn btn-success"> Add </button>
        </form>
        
    </div>
</div>