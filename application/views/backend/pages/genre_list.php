<a href="<?php echo base_url();?>index.php?admin/genre_create/" class="btn btn-primary" style="margin-bottom: 20px;">
<i class="fa fa-plus"></i>
	Create genre
</a>

<div class="row justify-content-center">
    <div class="col-xl-8 col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Genre List</h4>
                <table id="basic-datatable" class="table dt-responsive nowrap" width="100%">
					<thead>
						<tr>
							<th>
								#
							</th>
							<th>Genre Name</th>
							<th>Operation</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$genres = $this->crud_model->get_genres();
							$counter = 1;
							foreach ($genres as $row):
							  ?>
						<tr>
							<td><?php echo $counter++;?></td>
							<td style="text-transform: uppercase;"><?php echo $row['name'];?></td>
							<td>
								<a href="<?php echo base_url();?>index.php?admin/genre_edit/<?php echo $row['genre_id'];?>" class="btn btn-info btn-xs btn-mini">
								edit</a>
								<a href="<?php echo base_url();?>index.php?admin/genre_delete/<?php echo $row['genre_id'];?>" class="btn btn-danger btn-xs btn-mini" onclick="return confirm('Want to delete?')">
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
