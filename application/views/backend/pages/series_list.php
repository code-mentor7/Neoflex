<a href="<?php echo base_url();?>index.php?admin/series_create/" class="btn btn-primary" style="margin-bottom: 20px;">
<i class="fa fa-plus"></i>
Create series
</a>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Tv Series List</h4>
                <table id="basic-datatable" class="table dt-responsive nowrap" width="100%">
					<thead>
						<tr>
							<th>
								#
							</th>
							<th></th>
							<th>Series Title</th>
							<th>Genre</th>
							<th>Operation</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$seriess = $this->db->get('series')->result_array();
							$counter = 1;
							foreach ($seriess as $row):
							  ?>
						<tr>
							<td style="vertical-align: middle;"><?php echo $counter++;?></td>
							<td><img src="<?php echo $this->crud_model->get_thumb_url('series' , $row['series_id']);?>" style="height: 60px;" /></td>
							<td style="vertical-align: middle;"><?php echo $row['title'];?></td>
							<td style="vertical-align: middle;">
								<?php echo $this->db->get_where('genre',array('genre_id'=>$row['genre_id']))->row()->name;?>
							</td>
							<td style="vertical-align: middle;">
								<a href="<?php echo base_url();?>index.php?browse/playseries/<?php echo $row['series_id'];?>"
									target="_blank" class="btn btn-secondary btn-xs btn-mini">
								<i class="fa fa-external-link"></i>visit</a>
								<a href="<?php echo base_url();?>index.php?admin/series_edit/<?php echo $row['series_id'];?>" class="btn btn-info btn-xs btn-mini">
								manage</a>
								<a href="<?php echo base_url();?>index.php?admin/series_delete/<?php echo $row['series_id'];?>" class="btn btn-danger btn-xs btn-mini" onclick="return confirm('Want to delete?')">
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
