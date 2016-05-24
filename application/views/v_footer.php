        </div>
    </div>
    
    <script>
        $(document).ready(function () {
            var options = {
                    "backdrop" : "true"
            }
            $('#basicModalError').modal(options);
        });
    </script>
    
        <?php if (isset($error)) { ?>
        <div class="modal collapse" id="basicModalError" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog" style="margin-top:20%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <i class="fa fa-exclamation-triangle fa-2x" style="color:#c0392b"></i>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" ></i></button>
                        <br />
                    </div>
                    <div class="modal-body">

                        <!--<div class="alert alert-danger fade in" role="alert"> -->
                        <div class="col-md-9" style="float:left;" >
                            <?= $error; ?> 
                        </div>

                        <div class="col-md-3"  align="right">
                            <!-- <button type="button" onclick="history.back(-1);" class="btn blue-button" style="height:30px;line-height:5px;">Back</button> -->
                            <button type="button" class="btn btn-danger" data-toggle="modal"  data-dismiss="modal" style="height:30px;line-height:5px;">OK</button>
                        </div>
                        <!--</div> -->

                        <br /><br />

                    </div>
                </div>
            </div>
        </div>
    <?php } else if (isset($sucess)) { ?>
        <div class="modal collapse" id="basicModalError" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog" style="margin-top:20%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <i class="fa fa-check-circle fa-2x"  style="color:#27ae60;"></i>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" ></i></button>
                        <br />
                    </div>
                    <div class="modal-body">

                        <!-- <div class="alert alert-success fade in" role="alert"> -->
                        <div class="col-md-9" style="float:left;" >
                            <?= $sucess; ?> 
                        </div>

                        <div class="col-md-3"  align="right">
                            <button type="button" class="btn btn-success" data-toggle="modal"  data-dismiss="modal" style="height:30px;line-height:5px;">OK</button>
                        </div>

                        <!-- </div> -->

                        <br /><br />

                    </div>
                </div>
            </div>
        </div>
    <?php } else if (isset($info)) { ?>
        <div class="modal fade" id="basicModalError" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-info fade in" role="alert"><?= $info; ?></div>

                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    
    
</body>

</html>