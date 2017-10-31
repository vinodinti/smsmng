	<table id="grid-keep-selection" class=" table table-striped table-bordered" data-searchable="false" data-action="<?php echo base_url(); ?>super_admin/school/branch/get-table-data">
		<thead>
			<tr>
				<th data-column-id="branch_id" data-type="numeric" data-identifier="true" data-visible="false">Sno</th>
				<th data-column-id="branch_name" data-sortable="true" >Name</th>
				<th data-column-id="recognition_no" data-order="asc">Recognition No</th>
				<th data-column-id="branch_phone_no1">Contact 1</th>
				<th data-column-id="branch_phone_no2">Contact 2</th>
				<th data-column-id="branch_address1">Address 1</th>
				<th data-column-id="branch_address1">Address 2</th>
				<th data-column-id="branch_pin">Pin</th>
				<th data-column-id="branch_create_on" data-converter="datetime">Create On</th>
				<th data-column-id="record_status" data-formatter="status">Status</th>
			</tr>
		</thead>
	</table>
	<?php /*
						<table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th style="width:8px;"><input type="checkbox" class="group-checkable check-select-all" data-set="#sample_1 .checkboxes" /></th>
                                    <th>Branch Name</th>
									<th>Recognition No</th>
									<th>Contact No</th>
									<th class="hidden-phone">Address</th>
									<th class="hidden-phone">Create/Modify</th>
                                    <th class="hidden-phone">Date</th>
                                    <th class="hidden-phone">Status</th>
                                </tr>
                            </thead>
						
							<tbody>
									<?php if($getBranchDetails)foreach($getBranchDetails as $Branch){ ?>
									<tr class="odd gradeX">
										<td><input name="checkid" type="checkbox" class="checkboxes checkid" value="<?php echo $Branch->branch_id; ?>" /></td>
										<td class="center"><?php echo $Branch->branch_name; ?></td>
										<td class="center hidden-phone"><?php echo $Branch->recognition_no; ?></td>
										<td class="center hidden-phone">
										<?php echo "Contact No 1 :". $Branch->branch_phone_no1."<br/>"; ?>
										<?php echo "Contact No 2 :". $Branch->branch_phone_no2; ?>
										</td>
										<td class="center hidden-phone">
										<?php echo "Address 1 :". $Branch->branch_address1."<br/>"; ?>
										<?php echo "Address 2 :". $Branch->branch_address1."<br/>"; ?>
										<?php echo "Country :". $Branch->branch_country."<br/>"; ?>
										<?php echo "State :". $Branch->branch_state."<br/>"; ?>
										<?php echo "Pin :". $Branch->branch_pin; ?>
										</td>
										<td class="center hidden-phone">
										<?php 
											 echo "Created By :". getRecordCreatedBy($Branch->branch_create_by)."<br/>"; 
											 echo "Modified By :". getRecordCreatedBy($Branch->branch_modify_by);
										?>
										</td>
										<td class="center hidden-phone">
										<?php echo "Created On  :".DateFormatCtrl($Branch->branch_create_on)."<br/>";
											  echo "Modified On :".DateFormatCtrl($Branch->branch_modify_on); ?></td>
										<td class="center hidden-phone">
											<?php echo getRecordStatusIcons($Branch->branch_status); ?>
										</td>
									</tr>
									<?php } ?>
                            </tbody>
                        </table>
	*/ ?>