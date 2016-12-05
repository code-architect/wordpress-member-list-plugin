<?php
/**********************************************************************************
 * Name:    ca-memberlist.php
 *
 * Usage:   Display the member-list in a table
 **********************************************************************************/

global $wpdb;
$valid = true;
$sql = "SELECT * FROM ".$wpdb->prefix."memberlist";
$formData = $wpdb->get_results($sql);
if(!$formData)
{
    $valid = false;
    echo '<p><h1>This form is invalid. No Data Found.</h1></p>';
}
?>

    <div class="row">
        <div class="col-md-9">
            <h1>Memberlist Admin</h1>

            <form action="" method="post">
                <input type="hidden" name="listaction" value="insert"/>
                <button type="submit" class="btn btn-primary">Add New Member</button><br><br>
            </form>

            <table class="table">
                <tr class="info">
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Extra</th>
                    <th>Action</th>
                </tr>
                <?php if($valid){
                foreach($wpdb->get_results($sql) as $key => $row){
                ?>

                <form action="" method="post">
                    <tr>
                        <input type="hidden" name="listaction" value="edit"/>
                        <input type="hidden" name="memberid" value="<?php echo $row->ca_id; ?>"/>
                        <th><?php echo $row->ca_name; ?></th>
                        <th><?php echo $row->ca_phone; ?></th>
                        <th><?php echo $row->ca_email; ?></th>
                        <th><?php echo $row->ca_extra; ?></th>
                        <td>
                            <div class="btn-group" role="group">
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </button>
                            </div>
                        </td>
                    </tr>
                </form>
                <?php }
                }
                ?>
            </table>
        </div>
    </div>