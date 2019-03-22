<a href="<?php echo base_url();?>index.php?admin/user_create/" class="btn btn-primary" style="margin-bottom: 20px;">
<i class="fa fa-plus"></i>
Create user
</a>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">User List</h4>
                <p class="text-muted font-14 mb-4">
                <table id="basic-datatable" class="table dt-responsive nowrap" width="100%">
					<thead>
						<tr>
							<th>
								#
							</th>
							<th>User Email</th>
							<th>Subscribed Package</th>
							<th>Manage</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$users = $this->db->get_where('user', array('type'=>0))->result_array();
							$counter = 1;
							foreach ($users as $row):
							  ?>
						<tr>
							<td><?php echo $counter++;?></td>
							<td style="text-transform: uppercase;"><?php echo $row['email'];?></td>
							<td>
								<?php
									$plan_id	=	$this->crud_model->get_active_plan_of_user($row['user_id']);
									if ($plan_id != false)
									{
										$plan_name	=	$this->db->get_where('plan', array('plan_id' => $plan_id))->row()->name;
										echo $plan_name;
									}
									?>
							</td>
							<td>
								<a href="<?php echo base_url();?>index.php?admin/user_edit/<?php echo $row['user_id'];?>" class="btn btn-info btn-xs btn-mini">
								edit</a>
								<a href="<?php echo base_url();?>index.php?admin/user_delete/<?php echo $row['user_id'];?>" class="btn btn-danger btn-xs btn-mini" onclick="return confirm('Want to delete?')">
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
