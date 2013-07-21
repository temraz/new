
<?php
include('dbcon.php');
if ($_REQUEST) {
	
    $id = $_REQUEST['parent_id'];
    $query = "select * from sub_categ where c_id = " . $id;
    $results = mysql_query($query);
    ?>

   
<label class="req">ٍSub Department</label>
    <select name="sub_category" id="search_category_id" class="span10" required>
        <option></option>
                
<?php
while ($rows = mysql_fetch_assoc(@$results)) {
?>
           
<option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>	

        <?php }?>
                
    </select>

    <?php
}
?>