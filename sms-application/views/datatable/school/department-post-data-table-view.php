	<table id="grid-keep-selection" class="table table-striped table-bordered" data-searchable="false" 
	data-action="<?php echo base_url(); ?>super_admin/school/departmentpost/get-table-data">
		<thead>
			<tr>
				<th data-column-id="department_posts_id" data-type="numeric" data-identifier="true" data-visible="false">Sno</th>
				<th data-column-id="department_name" data-sortable="true" >Department Name</th>
				<th data-column-id="department_posts_name" data-order="asc">Department Post Name</th>
				<th data-column-id="department_posts_create_on" data-converter="datetime">Create On</th>
				<th data-column-id="department_posts_status" data-formatter="status">Status</th>
			</tr>
		</thead>
	</table> 
<?php /*
					<table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th style="width:8px;"><input type="checkbox" class="group-checkable check-select-all" data-set="#sample_1 .checkboxes" /></th>
                                    <th>Department Name</th>
									<th>Department Post Name</th>
									<th class="hidden-phone">Create/Modify</th>
                                    <th class="hidden-phone">Date</th>
                                    <th class="hidden-phone">Status</th>
                                </tr>
                            </thead>
						
							<tbody>
								<?php if($getDepartmentPostDetails)foreach($getDepartmentPostDetails as $getDepartmentPost){ ?>
									<tr class="odd gradeX">
										<td><input name="checkid" type="checkbox" class="checkboxes checkid" value="<?php echo $getDepartmentPost->department_posts_id; ?>" /></td>
										<td class="center"><?php echo $getDepartmentPost->department_name; ?></td>
										<td class="center"><?php echo $getDepartmentPost->department_posts_name; ?></td>
										<td class="center">
											<?php echo "Created By  :". getRecordCreatedBy($getDepartmentPost->department_posts_create_by) ."<br/>";
												  echo "Modified By :". getRecordCreatedBy($getDepartmentPost->department_posts_modify_by); 
											  ?>
										</td>
										<td class="center hidden-phone">
										<?php echo "Created On  :".DateFormatCtrl($getDepartmentPost->department_posts_create_on)."<br/>";
											  echo "Modified On :".DateFormatCtrl($getDepartmentPost->department_posts_modify_on); ?></td>
										<td class="center hidden-phone">
											<?php echo getRecordStatusIcons($getDepartmentPost->department_posts_status); ?>
										</td>
									</tr>
								<?php } ?>
                            </tbody>
                    </table>
*/ ?>