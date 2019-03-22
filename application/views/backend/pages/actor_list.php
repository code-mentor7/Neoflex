<a href="<?php echo base_url();?>index.php?admin/actor_create/" class="btn btn-primary" style="margin-bottom: 20px;">
<i class="fa fa-plus"></i>
Create actor
</a>

<div class="row justify-content-center">
    <div class="col-xl-8 col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Actor List</h4>
                <table id="basic-datatable" class="table dt-responsive nowrap" width="100%">
					<thead>
						<tr>
							<th>
								#
							</th>
							<th></th>
							<th>Actor Name</th>
							<th>Operation</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$actors = $this->db->get('actor')->result_array();
							$counter = 1;
							foreach ($actors as $row):
							  ?>
						<tr>
							<td style="vertical-align: middle;"><?php echo $counter++;?></td>
							<td><a href="<?php echo base_url().'index.php?admin/actor_wise_movie_and_series/'.$row['actor_id']; ?>"><img src="<?php echo $this->crud_model->get_actor_image_url($row['actor_id']);?>" style="height: 60px;" /></a></td>
							<td style="vertical-align: middle;"><a href="<?php echo base_url().'index.php?admin/actor_wise_movie_and_series/'.$row['actor_id']; ?>" style="color: #6c757d;"><?php echo $row['name'];?></a></td>
							<td style="vertical-align: middle;">
								<a href="<?php echo base_url();?>index.php?admin/actor_edit/<?php echo $row['actor_id'];?>" class="btn btn-info btn-xs btn-mini">
								edit</a>
								<a href="<?php echo base_url();?>index.php?admin/actor_delete/<?php echo $row['actor_id'];?>" class="btn btn-danger btn-xs btn-mini" onclick="return confirm('Want to delete?')">
								delete</a>
							</td>
						</tr>
						<?php endforeach;?>
					</tbody>
                </table>
            </div>
        </div>
    </div>
</div>
