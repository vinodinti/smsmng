	<table id="grid-keep-selection" class="table table-striped table-bordered" data-searchable="false" 
	data-action="<?php echo base_url(); ?>super_admin/school/branchclasssection/get-table-data">
		<thead>
			<tr>
				<th data-column-id="section_id" data-type="numeric" data-identifier="true" data-visible="false">Sno</th>
				<th data-column-id="branch_name" data-sortable="true" >Branch Name</th>
				<th data-column-id="class_name" data-order="asc">Class Name</th>
				<th data-column-id="section_name" data-order="asc">Section Name</th>
				<th data-column-id="section_create_on" data-converter="datetime">Create On</th>
				<th data-column-id="section_status" data-formatter="status">Status</th>
			</tr>
		</thead>
	</table>
<?php /*
						<table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th style="width:8px;"><input type="checkbox" class="group-checkable check-select-all" data-set="#sample_1 .checkboxes" /></th>
									<th>Branch Name</th>
									<th>Class Name</th>
									<th>Section Name</th>
									<th class="hidden-phone">Create/Modify</th>
                                    <th class="hidden-phone">Date</th>
                                    <th class="hidden-phone">Status</th>
                                </tr>
                            </thead>
							
							<tbody>
									<?php if($getSectionDetails)foreach($getSectionDetails as $Section){ ?>
									<tr class="odd gradeX">
										<td><input name="checkid" type="checkbox" class="checkboxes checkid" value="<?php echo $Section->section_id ; ?>" /></td>
										<td class="center hidden-phone">
										<?php //echo $Section->branch_fk_id; ?>
										</td>
										<td class="center hidden-phone">
										<?php echo $Section->class_fk_id; ?>
										</td>
										<td class="center hidden-phone">
										<?php echo $Section->section_name; ?>
										</td>
										<td class="center hidden-phone">
										<?php 
											 echo "Created By :". getRecordCreatedBy($Section->section_create_by)."<br/>"; 
											 echo "Modified By :". getRecordCreatedBy($Section->section_modify_by);
										?>
										</td>
										<td class="center hidden-phone">
										<?php echo "Created On  :".DateFormatCtrl($Section->section_create_on)."<br/>";
											  echo "Modified On :".DateFormatCtrl($Section->section_modify_on); ?>
										</td>
										<td class="center hidden-phone">
											<?php echo getRecordStatusIcons($Section->section_status); ?>
										</td>
									</tr>
									<?php } ?>
                            </tbody>
                        </table>
*/ ?>