						<table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th style="width:8px;"></th>
                                    <th>School Name</th>
									<th>School Logo</th>
                                    <th class="hidden-phone">Create On</th>
                                    <th class="hidden-phone">Create By</th>
                                    <th class="hidden-phone">Status</th>
                                </tr>
                            </thead>
						
							<tbody>
									<?php if($getSchoolDetails)foreach($getSchoolDetails as $School){ ?>
									<tr class="odd gradeX">
										<td><input name="select" type="checkbox" class="checkboxes checkid select-box" value="<?php echo $School->school_id; ?>" /></td>
										<td class="center"><?php echo $School->school_name; ?></td>
										<td class="center">
										<?php if(getFileExists('storage/school-logo/'.$School->school_logo)){ ?>
										<img style="height:50px; width:50px;" src="<?php echo base_url().'storage/school-logo/'.$School->school_logo; ?>" />
										<?php } ?>
										</td>
										<td class="center hidden-phone"><?php echo $School->branch_create_on; ?></td>
										<td class="center hidden-phone"><?php echo getRecordCreatedBy($School->branch_create_by); ?></td>
										<td class="hidden-phone">
											<?php echo getRecordStatusIcons($School->school_status); ?>
										</td>
									</tr>
									<?php } ?>
                            </tbody>
                        </table>