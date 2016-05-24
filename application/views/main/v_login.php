
<form method="post" action="<?=site_url('main/checklogin'); ?>">
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        
        <div class="row">
            <div class="col-md-2">Username :</div>
            <div class="col-md-6"><input type="text" class="form-control" name="username" placeholder="username" /></div>
        </div>
        <div class="row">
            <div class="col-md-2">Password :</div>
            <div class="col-md-6"><input type="password" class="form-control" name="password" placeholder="password" /></div>
        </div>
        <div class="row" style="margin-top: 1%;">
            <div class="col-md-2"></div>
            <div class="col-md-4"><button type="submit" class="btn btn-primary">Login</button></div>
        </div>
        
    </div>
</div>
</form>