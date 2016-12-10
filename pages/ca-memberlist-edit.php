<?php
/**********************************************************************************
 * Name:    ca-memberlist-edit.php
 *
 * Usage:   Display the edit form for a single member
 **********************************************************************************/

$row = $member->get_specific_rows($id);

$name   =   $row->ca_name;
$phone  =   $row->ca_phone;
$email  =   $row->ca_email;
$extra  =   $row->ca_extra;

?>

<div class="row">
    <div class="col-md-9">
        <h1>Memberlist Edit</h1>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Member Information</h3>
            </div>
            <div class="panel-body">

                <form action="" method="post">

                    <input type="hidden" name="ca_id" value="<?php echo $id; ?>"/>

                    <div class="form-group">
                        <label for="frnName" class="col-sm-4 control-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="ca_name" value="<?php echo $name; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="frnPhone" class="col-sm-4 control-label">Phone</label>
                        <div class="col-sm-8">
                            <input type="phone" class="form-control" name="ca_phone" value="<?php echo $phone; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="frnEmail" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" name="ca_email" value="<?php echo $email; ?>" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="frnExtra" class="col-sm-4 control-label">Extra</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="ca_extra" value="<?php echo $extra; ?>">
                        </div>
                    </div>

                    <div class="col-sm-8 col-sm-offset-4">
                        <button type="submit" name="listaction" value="handleupdate" class="btn btn-primary">Update</button>
                        <button type="submit" name="listaction" value="list" class="btn btn-warning">Cancel</button>
                        <button type="submit" name="listaction" value="handledelete" class="btn btn-danger"
                                onclick="return confirm('Delete this records?')">
                            Delete
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>