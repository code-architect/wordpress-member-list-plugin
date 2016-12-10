<?php
/**********************************************************************************
 * Name:    ca-memberlist-shortcode-form.php
 *
 * Usage:   Display the member-list in a table
 **********************************************************************************/

$member = new Member();
$data = $member->fetch_all_member();

if($data == false)
{
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
    <?php if($data){
        foreach($data as $key => $row){
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



