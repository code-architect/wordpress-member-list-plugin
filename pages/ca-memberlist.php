<?php
/**********************************************************************************
 * Name:    ca-memberlist.php
 *
 * Usage:   Display the member-list in a table
 **********************************************************************************/

$data = $member->fetch_all_member();

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
                <?php if($data != false){
                foreach($data as $row){
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
