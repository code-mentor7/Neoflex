<div class="row">
	<div class="col-12">
		<form method="post" action="<?php echo base_url();?>index.php?admin/settings" enctype="multipart/form-data">
			<div class="row">
				<div class="col-6">
			        <div class="card">
			            <div class="card-body">
							<div class="form-group mb-3">
								<label for="simpleinput1">Website Name</label>
								<input type="text" class="form-control" id = "simpleinput1" name="site_name" value="<?php echo $site_name;?>">
							</div>
							<div class="form-group mb-3">
								<label for="simpleinput2">Website Email</label>
								<input type="text" class="form-control" id = "simpleinput2" name="site_email" value="<?php echo $site_email;?>">
							</div>

							<div class="form-group mb-3">
                                <label for="example-select">Trial Period Functionality</label>
                                <select class="form-control" id="example-select" name="trial_period">
									<option value="on" <?php if ($trial_period == 'on')echo 'selected';?>>On</option>
									<option value="off" <?php if ($trial_period == 'off')echo 'selected';?>>Off</option>
                                </select>
                            </div>

							<div class="form-group mb-3">
								<label for="simpleinput3">Trial Period Number of days</label>
								<input type="number" min="0" class="form-control" id = "simpleinput3" name="trial_period_days" value="<?php echo $trial_period_days;?>">
							</div>

							<!-- WEBSITE LANGUAGE SETTINGS -->
							<div class="form-group mb-3">
                                <label for="example-select2">Website Language</label>
                                <select class="form-control" id="example-select2" name="language">
									<?php
									$fields = $this->db->list_fields('language');
									foreach ($fields as $field) {
										if ($field == 'phrase_id' || $field == 'phrase')
											continue;

										$current_default_language = $this->db->get_where('settings', array('type' => 'language'))->row()->description;
										?>
										<option value="<?php echo $field; ?>"
												<?php if ($current_default_language == $field) echo 'selected'; ?>> <?php echo $field; ?> </option>
										<?php
									}
									?>
                                </select>
                            </div>

							<!-- WEBSITE TEMPLATE SETTINGS -->
							<div class="form-group mb-3">
                                <label for="example-select3">Website Theme</label>
                                <select class="form-control" id="example-select3" name="theme">
									<?php
										$themes = directory_map('./application/views/frontend/', 1);
										//print_r($themes);
										for($i = 0; $i < sizeof($themes) ; $i++) {
											if ($themes[$i] == 'index.php')
												continue;
											$themes[$i] = substr($themes[$i], 0, -1);
											?>
											<option value="<?php echo $themes[$i];?>" <?php if ($theme == $themes[$i])echo 'selected';?>>
												<?php echo $themes[$i];?></option>
											<?php
										}
									?>
                                </select>
                            </div>

							<div class="form-group mb-3">
                                <label for="simpleinput4">Paypal merchant email</label>
                                <input type="text" id="simpleinput4" class="form-control" name="paypal_merchant_email" value="<?php echo $paypal_merchant_email;?>">
                            </div>

							<div class="form-group mb-3">
                                <label for="simpleinput5">Stripe publishable key</label>
                                <input type="text" id="simpleinput5" class="form-control" name="stripe_publishable_key" value="<?php echo $stripe_publishable_key;?>">
                            </div>

							<div class="form-group mb-3">
                                <label for="simpleinput6">Stripe secret key</label>
                                <input type="text" id="simpleinput6" class="form-control" name="stripe_secret_key" value="<?php echo $stripe_secret_key;?>">
                            </div>

							<div class="form-group mb-3">
                                <label for="simpleinput8">Invoice address</label>
                                <input type="text" id="simpleinput8" class="form-control" name="invoice_address" value="<?php echo $invoice_address;?>">
                            </div>

							<div class="form-group mb-3">
                                <label for="simpleinput9">Envato purchase code</label>
                                <input type="text" id="simpleinput9" class="form-control" name="purchase_code" value="<?php echo $purchase_code;?>">
                            </div>
			            </div>
			        </div>
			    </div>

				<div class="col-6">
			        <div class="card">
			            <div class="card-body">
							<div class="form-group">
								<label class="form-label">Website logo</label>
								<span class="help"></span>
								<div class="controls">
									<input type="file" name="logo" />
									<img src="<?php echo base_url();?>assets/global/logo.png" height="20" />
								</div>
							</div>

							<div class="form-group mb-3">
                                <label for="example-textarea">Website privacy policy</label>
                                <textarea class="form-control" id="example-textarea" name="privacy_policy" rows="6"><?php echo $privacy_policy;?></textarea>
                            </div>

							<div class="form-group mb-3">
                                <label for="example-textarea">Website refund policy</label>
                                <textarea class="form-control" id="example-textarea" name="refund_policy" rows="6"><?php echo $refund_policy;?></textarea>
                            </div>
			            </div>
			        </div>
			    </div>
				<div class="col-4">
					<div class="form-group">
						<input type="submit" class="btn btn-success" value="Update Website Settings">
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<h4 class="page-title"><?php echo get_phrase('update_product');?></h4>
<div class="row">
	<div class="col-6">
		<div class="card">
			<div class="card-body">
				<?php echo form_open(site_url('index.php?updater/update') , array('class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data'));?>
					<div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('file'); ?></label>

                        <div class="col-sm-5">

                            <input type="file" name="file_name" data-label="<i class='mdi mdi-file'></i> Browse" required/>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <input type="submit" class="btn btn-info" value="<?php echo get_phrase('install_update'); ?>" />
                        </div>
                    </div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
