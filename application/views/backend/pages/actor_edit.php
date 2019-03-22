<?php
	$actor_detail = $this->db->get_where('actor',array('actor_id'=>$actor_id))->row();
?>
<div class="row justify-content-center">
    <div class="col-xl-8 col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
				<form method="post" action="<?php echo base_url();?>index.php?admin/actor_edit/<?php echo $actor_id;?>"
					<div class="row">
						<div class="col-12">
							<div class="form-group mb-3">
			                    <label for="name">Actor Name</label>
								<span class="help">e.g. "Leonardo di Caprio"</span>
			                    <input type="text" class="form-control" id = "name" name="name" value="<?php echo $actor_detail->name;?>">
			                </div>
							<div class="form-group mb-3">
			                    <label for="thumb">Image</label>
			                    <input type="file" class="form-control" name="thumb">
			                </div>
							
							<div class="form-group">
								<input type="submit" class="btn btn-success" value="Update">
								<a href="<?php echo base_url();?>index.php?admin/actor_list" class="btn btn-secondary">Go back</a>
							</div>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
