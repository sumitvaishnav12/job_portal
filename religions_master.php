<?php
include("index_layout.php");
include("database.php");
if(isset($_POST['saveDetails'])){
	$name=$_POST['name'];	 
	mysql_query("insert into `religions` SET `name`='$name'");	

	$_SESSION['type']="success";
	$_SESSION['message']="Religion added successfully";
	header("location:religions_master.php");
}  

if(isset($_POST['deleteAction']))
{
	$delete_id=$_POST['delete_id'];
	mysql_query("update `religions` SET `is_deleted`='1' where id='$delete_id'" );

	$_SESSION['type']="success";
	$_SESSION['message']="Religion successfully Deleted";
	header("location:religion_master.php");
} 
?> 
<?php head();?> 
	<section class="content-header myHead">
		<div class="pull-right hidden-xs">
	      View List 
	    </div>
		Religion Master
	</section>
	<section class="content"> 
	    <div class="row">
		    <div class="col-md-6">
				<div class="portlet box "> 
					<div class="portlet-body form">
						<form  class="form-horizontal" id="formValidation"  role="form" method="post"> 
							<div class="box-body"> 
								<div class="form-group">
				                  <label for="inputEmail3" class="col-sm-4 control-label">Religion Name</label> 
				                  <div class="col-sm-8">
				                    <input class="form-control" placeholder="Religion Name" required name="name" autocomplete="off" type="text">
				                  </div>
				                </div> 
								<div class="col-md-offset-5 col-md-6" style="">
									<button type="submit" name="saveDetails" class="btn btn-primary">Submit</button> 
								</div> </br> </br>
							</div> 
						</form>
					</div>
			 	</div>
        	</div> 
            <div class="col-md-6">
				<div class="portlet box blue"> 
					<div class="portlet-body form">
						<div class="table-scrollable">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr style="background:#F5F5F5">
										<th>#</th>
										<th>Name</th> 
					                    <th>Action</th>
									</tr>
								</thead>
								<tbody>
						 		<?php
						  		$getData=mysql_query("select * from `religions` where `is_deleted` = '0'");		
								$i=0;
								while($fetchData=mysql_fetch_array($getData))
								{
									$i++;
									$id=$fetchData['id'];
									$name=$fetchData['name']; 
									?>
				                    
										<tr>
											<td> <?php echo $i;?></td>
											<td  width="50%" class="search"><?php echo $name;?></td> 
											<td>
			                                    <!-- <a class="btn blue-madison blue-stripe btn-sm" rel="tooltip" title="Edit" data-toggle="modal" href="#edit<?php echo $id;?>"><i class="fa fa-edit"></i></a> --> 
			                                    
			                                    <a class="btn btn-sm btn-danger"  rel="tooltip" title="Delete"  data-toggle="modal" href="#delete<?php echo $id ;?>"><i class="fa fa-trash"></i></a>
			                                    <div id="delete<?php echo $id ;?>" class="modal fade" role="dialog">
			                                        <div class="modal-dialog modal-md" >
			                                        	<form method ="post">
			                                                <div class="modal-content">
			                                                  <div class="modal-header" style=" background-color: #3E3A86;color:#fff;">
			                                                        <button type="button" class="close" style="color:#fff !important;opacity:1" data-dismiss="modal">&times;</button>
			                                                        <h4 class="modal-title" >
			                                                            Stay Attention
			                                                        </h4>
			                                                    </div>
			                                                    <div class="modal-body">
			                                                    <h4 class="modal-title">
			                                                        Are you sure you want to remove this record?
			                                                        </h4>
			                                                    </div>
			                                                    <input type="hidden" value="<?php echo $id; ?>" name="delete_id">
			                                                    <div class="modal-footer">
			                                                        <button type="submit" class="btn btn-sm btn-primary" name="deleteAction">Yes</button>
			                                                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
			                                                    </div>
			                                                </div>
			                                            </form>
			                                        </div>
			                                    </div>
			             					</td>
										</tr>
									
			                    <?php 
			                	} 
			                	?>
			                	</tbody>
							</table>
						</div>
					</div>	   
				</div>
            </div>
        </div>
	</section>
 
<?php footer();?>
<?php script();?>
 
 

