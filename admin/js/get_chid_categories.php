
<?php
include('dbcon.php');
if ($_REQUEST) {
	
    $id = $_REQUEST['parent_id'];
    $query = "select * from sub_categ where c_id = " . $id;
    $results = mysql_query($query);
    ?>

    <div class="login_box" style="float:left;height:270px;overflow-y: scroll;
    overflow-x: hidden;">
        <!-- sign in -->    
         
           <form action="index.php" method="post"/>
           
               <h3 style="text-align:center">Delete sub category</h3>
                <div class="box_content">
                    <div class="row-fluid">
                   
                        <div class="text-center">
                           
         <?php
		 if(isset($id)){
        while ($rows = mysql_fetch_assoc(@$results)) {
            ?>
            <a href="http://localhost/new/civou/home/delete_sub_category/<?php echo $rows['id']; ?>"  class="btn btn-block btn-primary btn-large" style="color:#fff" id="delete_sub_cat"> <?php echo $rows['name']; ?> Delete </a>

        <?php }
        ?>
                                                           
                                              
                           
                           
                      
                        </div>
                       
                        
                       
                    </div>
                </div>
                <div class="box_footer text-center clearfix minor_text">
                    
                </div>  
            </form>
       </div>
    
      

    <?php
}}
?>