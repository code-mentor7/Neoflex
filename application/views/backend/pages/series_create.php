<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
				<form method="post" action="<?php echo base_url();?>index.php?admin/series_create" enctype="multipart/form-data">
	                <div class="form-group mb-3">
	                    <label for="title">Tv Series Title</label>
	                    <input type="text" class="form-control" id = "title" name="title">
	                </div>
                    <!-- Select TV series if it is hosted or local -->
                    <div class="form-group mb-3">
                        <label for="genre_id">Tv Series Category</label>
                        <span class="help">- hosted url or local</span>
                        <select class="form-control select2" id="tv_category_id" name="tv_category_id">
                            <option value="hosted">hosted</option>
                            <option value="local">local</option>
                        </select>
                    </div>

                    <!-- hosted -->
                    <div id="hosted_tv" class="hosted_tv tv_category show">
                        <div class="form-group mb-3">
                            <label for="title">Tv Series URL</label>
                            <input type="text" class="form-control" id = "series_trailer_url" name="series_trailer_url">
                        </div>
                    </div>

                    <!-- local -->
                    <div id="local_tv" class="local_tv tv_category">
                        <div class="form-group mb-3">
                            <label for="local_movie_origin">Local Tv Series</label>
                            <span class="help">- local</span>
                            <input type="file" class="form-control" name="local_tv_series" accept="video/mp4">
                        </div>
                    </div>


	                <div class="form-group mb-3">
	                    <label for="thumb">Thumbnail</label>
						<span class="help">- icon image of the series</span>
	                    <input type="file" class="form-control" name="thumb">
	                </div>

	                <div class="form-group mb-3">
	                    <label for="poster">Poster</label>
						<span class="help">- large banner image of the series</span>
	                    <input type="file" class="form-control" name="poster">
	                </div>

					<div class="form-group mb-3">
						<label for="description_short">Short description</label>
						<textarea class="form-control" id="description_short" name="description_short" rows="6"></textarea>
					</div>

					<div class="form-group mb-3">
						<label for="description_long">Long description</label>
						<textarea class="form-control" id="description_long" name="description_long" rows="6"></textarea>
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
					<div class="row">
						<div class="form-group col-6">
							<input type="submit" class="btn btn-success col-12" value="Create">
						</div>
						<div class="col-6">
							<a href="<?php echo base_url();?>index.php?admin/series_list" class="btn btn-secondary col-12">Go back</a>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#tv_category_id").change(function () {
            $('.tv_category').toggleClass("show");
        });
    })
</script>
<style>
    .hosted_tv {
        display: none;
    }

    .local_tv {
        display: none;
    }

    .show {
        display: block;
    }
</style>