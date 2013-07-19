
<?php
include('dbcon.php');
if ($_REQUEST) {
    $id = $_REQUEST['parent_id'];
    $query = "select * from sub_categ where c_id = " . $id;
    $results = mysql_query($query);
    ?>

    <div class="login_box" style="float:left;">
        <!-- sign in -->    
         
           <form action="index.php" method="post"/>
           
               <h3 style="text-align:center">Delete sub category</h3>
                <div class="box_content">
                    <div class="row-fluid">
                   
                        <div class="text-center">
                           
                           
                                                    <select name="sub_category_id"  id="search_category_id" class="span12" style="margin-bottom:48px;width:95%" required>
                                                        <option value=""></option>
                                                        
                                                            <option value="" selected>select one </option>
                                                            <?php
        while ($rows = mysql_fetch_assoc(@$results)) {
            ?>
            <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
        <?php }
        ?>
                                                           
                                                        </optgroup>
                                                        </select>
                           
                           
                      
                        </div>
                       
                        <button class="btn btn-block btn-primary btn-large" id="delete_sub_cat" type="submit">Delete</button>
                       
                    </div>
                </div>
                <div class="box_footer text-center clearfix minor_text">
                    
                </div>  
            </form>
       </div>
    
      

    <?php
}
?>