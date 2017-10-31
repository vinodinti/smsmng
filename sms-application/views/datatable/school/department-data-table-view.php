	<table id="grid-keep-selection" class="table table-striped table-bordered" data-searchable="false" 
	data-action="<?php echo base_url(); ?>super_admin/school/department/get-table-data">
		<thead>
			<tr>
				<th data-column-id="department_id" data-type="numeric" data-identifier="true" data-visible="false">Sno</th>
				<th data-column-id="branch_name" data-sortable="true" >Branch Name</th>
				<th data-column-id="department_name" data-order="asc">Department Name</th>
				<th data-column-id="department_create_on" data-converter="datetime">Create On</th>
				<th data-column-id="department_status" data-formatter="status">Status</th>
			</tr>
		</thead>
	</table>
<?php /*					
					<table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th style="width:8px;"><input type="checkbox" class="group-checkable check-select-all" data-set="#sample_1 .checkboxes" /></th>
                                    <th>Branch Name</th>
									<th>Department Name</th>
									<th class="hidden-phone">Create/Modify</th>
                                    <th class="hidden-phone">Date</th>
                                    <th class="hidden-phone">Status</th>
                                </tr>
                            </thead>
							
							<tbody>
								<?php if($getDepartmentDetails)foreach($getDepartmentDetails as $Department){ ?>
									<tr class="odd gradeX">
										<td><input name="checkid" type="checkbox" class="checkboxes checkid" value="<?php echo $Department->department_id; ?>" /></td>
										<td class="center"><?php echo $Department->branch_name; ?></td>
										<td class="center"><?php echo $Department->department_name; ?></td>
										<td class="center">
											<?php echo "Created By  :". getRecordCreatedBy($Department->department_create_by) ."<br/>";
												  echo "Modified By :". getRecordCreatedBy($Department->department_modify_by); 
											  ?>
										</td>
										<td class="center hidden-phone">
										<?php echo "Created On  :".DateFormatCtrl($Department->department_create_on)."<br/>";
											  echo "Modified On :".DateFormatCtrl($Department->department_modify_on); ?></td>
										<td class="center hidden-phone">
											<?php echo getRecordStatusIcons($Department->department_status); ?>
										</td>
									</tr>
								<?php } ?>
                            </tbody>
                    </table>
*/ ?>