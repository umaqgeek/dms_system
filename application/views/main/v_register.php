<div class="row">
    <div class="col-md-8 col-md-offset-2">
        
        <form method="post" action="<?=site_url('main/register_process'); ?>">
            <table class="table table-bordered">
                <tr>
                    <th>Full Name</th>
                    <th>:</th>
                    <td>
                        <input name="u_fullname" type="text" class="form-control" placeholder="Insert your full name here." />
                    </td>
                </tr>
                <tr>
                    <th>Username</th>
                    <th>:</th>
                    <td>
                        <input name="u_username" type="text" class="form-control" placeholder="Insert your username here." />
                    </td>
                </tr>
                <tr>
                    <th>Password</th>
                    <th>:</th>
                    <td>
                        <input name="u_password" type="password" class="form-control" placeholder="Insert your password here." />
                    </td>
                </tr>
            </table>
            
            <button type="submit" class="btn btn-success">Register</button>
            
        </form>
        
    </div>
</div>