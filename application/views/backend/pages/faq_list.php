<a href="<?php echo base_url();?>index.php?admin/faq_create/" class="btn btn-primary" style="margin-bottom: 20px;">
<i class="fa fa-plus"></i>
Create faq
</a>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="basic-datatable" class="table dt-responsive nowrap" width="100%">
					<thead>
						<tr>
							<th>
								#
							</th>
							<th>FAQ Question</th>
							<th>Operation</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$faqs = $this->db->get('faq')->result_array();
							$counter = 1;
							foreach ($faqs as $row):
							  ?>
						<tr>
							<td><?php echo $counter++;?></td>
							<td style="text-transform: uppercase;"><?php echo $row['question'];?></td>
							<td>
								<a href="<?php echo base_url();?>index.php?admin/faq_edit/<?php echo $row['faq_id'];?>" class="btn btn-info btn-xs btn-mini">
								edit</a>
								<a href="<?php echo base_url();?>index.php?admin/faq_delete/<?php echo $row['faq_id'];?>" class="btn btn-danger btn-xs btn-mini" onclick="return confirm('Want to delete?')">
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
