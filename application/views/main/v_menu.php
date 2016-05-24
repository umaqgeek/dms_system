

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="<?=site_url('main'); ?>">Home Page 
                    [ Document Management System ]
                <img src="<?=base_url(); ?>assets/img/logodms.png" width="50" height="50" />
                </a>                
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
<!--                    <li>
                        <a href="#about">About</a>
                    </li>-->
                    <li>
                        <a href="<?=site_url('main/login'); ?>">Login Page</a>
                    </li>
                    <li>
                        <a href="<?=site_url('main/registration'); ?>">Registration</a>
                    </li>
                    <li>
                        <a href="<?=site_url('main/listDocuments'); ?>">List of Public Documents</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


