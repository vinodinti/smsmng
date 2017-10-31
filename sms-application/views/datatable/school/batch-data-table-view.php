	
	<table id="grid-keep-selection" class=" table table-striped table-bordered" data-searchable="false" data-action="<?php echo base_url(); ?>super_admin/school/batch/get-table-data">
		<thead>
			<tr>
				<th data-column-id="school_batch_id" data-type="numeric" data-identifier="true" data-visible="false">Sno</th>
				<th class="select-cell" data-column-id="school_batch_value" data-sortable="true" >Batch</th>
				<th data-column-id="school_batch_start_on" data-converter="datetime" data-order="asc">Batch Start On</th>
				<th data-column-id="school_batch_end_on" data-converter="datetime">Batch End On</th>
				<th data-column-id="school_batch_create_on" data-converter="datetime">Create On</th>
				<th data-column-id="record_status" data-formatter="status">Status</th>
			</tr>
		</thead>
	</table>
<?php /* codeigniter pagination 
						<!--ajax pagination-->
						<table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th style="width:8px;"><input type="checkbox" class="group-checkable check-select-all" data-set="#sample_1 .checkboxes" /></th>
									<th>Batch </th>
                                    <th>Batch Start On</th>
									<th>Batch Start End</th>
									<th class="hidden-phone">Create/Modify</th>
									<th class="hidden-phone">Date</th>
                                    <th class="hidden-phone">Status</th>
                                </tr>
                            </thead>
							
							<tbody>
									<?php if($BatchDetails)foreach($BatchDetails as $Batch){ ?>
									<tr class="odd gradeX">
										<td><input name="checkid" type="checkbox" class="checkboxes checkid" value="<?php echo $Batch->school_batch_id; ?>" /></td>
										<td class="center hidden-phone">
										<?php echo $Batch->school_batch_value; ?>
										</td>
										<td class="center hidden-phone">
										<?php echo DateFormatCtrl($Batch->school_batch_start_on); ?>
										</td>
										<td class="center hidden-phone">
										<?php echo DateFormatCtrl($Batch->school_batch_end_on); ?>
										</td>
										<td class="center hidden-phone">
										<?php 
											 echo "Created By :". getRecordCreatedBy($Batch->school_batch_create_by)."<br/>"; 
											 echo "Modified By :". getRecordCreatedBy($Batch->school_batch_modify_by);
										?>
										</td>
										<td class="center hidden-phone">
										<?php echo "Created On  :".DateFormatCtrl($Batch->school_batch_create_on)."<br/>";
											  echo "Modified On :".DateFormatCtrl($Batch->school_batch_modify_on); ?>
										</td>
										<td class="center hidden-phone">
											<?php echo getRecordStatusIcons($Batch->school_batch_status); ?>
										</td>
									</tr>
									<?php } ?>
                            </tbody>
                        </table>
						<div class="row-fluid">
							<div class="span6">
								<!--<div class="dataTables_info" id="sample_1_info">Showing 1 to 10 of <?php echo $RowsCount; ?> entries</div>-->
								<div class="dataTables_info" id="sample_1_info">Total Records <?php echo $RowsCount; ?></div>
							</div>
							<div class="span6">
								<div class="dataTables_paginate paging_bootstrap pagination">
									<?php echo $Pagination; ?>
								</div>
							</div>
						</div>
						
*/ ?>					
						