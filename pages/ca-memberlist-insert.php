<?php
/**********************************************************************************
 * Name:    ca-memberlist-insert.php
 *
 * Usage:   Insert Data into Database
 **********************************************************************************/

?>

<div class="row">
    <div class="col-md-9">
        <?php echo Helper::error_check($success_id); ?>
        <h1>Add New Member</h1>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Insert Member Information</h3>
            </div>
            <div class="panel-body">

                <form action="" method="post">

                    <div class="form-group">
                        <label for="frnName" class="col-sm-4 control-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="ca_name" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="frnPhone" class="col-sm-4 control-label">Phone</label>
                        <div class="col-sm-8">
                            <input type="phone" class="form-control" name="ca_phone">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="frnEmail" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" name="ca_email" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="frnExtra" class="col-sm-4 control-label">Extra</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="ca_extra" >
                        </div>
                    </div>

                    <div class="col-sm-8 col-sm-offset-4">
                        <button type="submit" name="listaction" value="handleinsert" class="btn btn-primary">Create Member</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>