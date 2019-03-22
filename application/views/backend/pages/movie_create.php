<form method="post" action="<?php echo base_url();?>index.php?admin/movie_create" enctype="multipart/form-data">
	<div class="row">
	    <div class="col-6">
	        <div class="card">
	            <div class="card-body">
					<div class="form-group mb-3">
	                    <label for="simpleinput1">Movie Title</label>
	                    <input type="text" class="form-control" id = "simpleinput1" name="title">
	                </div>
					<div class="form-group mb-3">
	                    <label for="url">Movie Trailer Url</label>
						<span class="help">- youtube or any hosted video</span>
	                    <input type="text" class="form-control" name="trailer_url" id="trailer_url">
	                </div>
					<div class="form-group mb-3">
	                    <label for="url">Movie Url</label>
						<span class="help">- youtube or any hosted video</span>
	                    <input type="text" class="form-control" name="url" id="url">
	                </div>

					<div class="form-group mb-3">
	                    <label for="">Thumbnail</label>
						<span class="help">- icon image of the movie</span>
	                    <input type="file" class="form-control" name="thumb">
	                </div>

					<div class="form-group mb-3">
	                    <label for="">Poster</label>
						<span class="help">- large banner image of the movie</span>
	                    <input type="file" class="form-control" name="poster">
	                </div>

					<div class="form-group mb-3">
						<label for="description_long">Long description</label>
						<textarea class="form-control" id="description_long" name="description_long" rows="6"></textarea>
					</div>

					<div class="form-group mb-3">
						<label for="description_short">Short description</label>
						<textarea class="form-control" id="description_short" name="description_short" rows="6"></textarea>
					</div>

					<div class="form-group mb-3">
						<label for="actors">Actors</label>
						<span class="help">- select multiple actors</span>
						<select class="form-control select2" id="actors" multiple name="actors[]">
							<?php
								$actors	=	$this->db->get('actor')->result_array();
								foreach ($actors as $row2):?>
							<option value="<?php echo $row2['actor_id'];?>">
								<?php echo $row2['name'];?>
							</option>
							<?php endforeach;?>
						</select>
					</div>

					<div class="form-group mb-3">
						<label for="genre_id">Genre</label>
						<span class="help">- genre must be selected</span>
						<select class="form-control select2" id="genre_id" name="genre_id">
							<?php
								$genres	=	$this->crud_model->get_genres();
								foreach ($genres as $row2):?>
							<option value="<?php echo $row2['genre_id'];?>">
								<?php echo $row2['name'];?>
							</option>
							<?php endforeach;?>
						</select>
					</div>

					<div class="form-group mb-3">
						<label for="year">Publishing Year</label>
						<span class="help">- year of publishing time</span>
						<select class="form-control select2" id="year" name="year">
							<?php for ($i = date("Y"); $i > 2000 ; $i--):?>
							<option value="<?php echo $i;?>">
								<?php echo $i;?>
							</option>
							<?php endfor;?>
						</select>
					</div>

					<div class="form-group mb-3">
						<label for="rating">Rating</label>
						<span class="help">- star rating of the movie</span>
						<select class="form-control select2" id="rating" name="rating">
							<?php for ($i = 0; $i <= 5 ; $i++):?>
							<option value="<?php echo $i;?>">
								<?php echo $i;?>
							</option>
							<?php endfor;?>
						</select>
					</div>

					<div class="form-group mb-3">
						<label for="featured">Featured</label>
						<span class="help">- featured movie will be shown in home page</span>
						<select class="form-control select2" id="featured" name="featured">
							<option value="0">No</option>
							<option value="1">Yes</option>
						</select>
					</div>
	            </div>
	        </div>
	    </div>
		<div class="row">
			<div class="col-6">
				<div class="form-group">
					<label class="form-label">Preview:</label>
					<div id="video_player_div"></div>
				</div>
			</div>
		</div>

		<hr>
		<div class="col-6">
			<div class="row">
				<div class="form-group col-6">
					<input type="submit" class="btn btn-success col-12" value="Create Movie">
				</div>
				<div class="col-6">
					<a href="<?php echo base_url();?>index.php?admin/movie_list" class="btn btn-secondary col-12">Go back</a>
				</div>
			</div>
		</div>
	</div>
</form>
