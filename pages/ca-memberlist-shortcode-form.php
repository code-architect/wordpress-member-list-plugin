<?php
/**********************************************************************************
 * Name:    ca-memberlist-shortcode-form.php
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
    echo $sql.'<p>This form is invalid. No Data Found.</p>';
}
?>

<table class="table">
    <tr class="info">
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Extra</th>
    </tr>
    <?php if($valid){
        foreach($wpdb->get_results($sql) as $key => $row){
    ?>
    <tr>
        <th><?php echo $row->ca_name; ?></th>
        <th><?php echo $row->ca_phone; ?></th>
        <th><?php echo $row->ca_email; ?></th>
        <th><?php echo $row->ca_extra; ?></th>
    </tr>
    <?php }
    }
    ?>
</table>



