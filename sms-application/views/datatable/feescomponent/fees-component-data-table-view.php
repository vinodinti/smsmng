						<table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th style="width:8px;"><input type="checkbox" class="group-checkable check-select-all" data-set="#sample_1 .checkboxes" /></th>
									<th>Batch Name</th>
                                    <th>Branch Name</th>
									<th>Class Name</th>
									<th>Fees Name</th>
									<th>Fees Amount</th>
									<th>Fees Interval</th>
									<th class="hidden-phone">Create/Modify</th>
									<th class="hidden-phone">Date</th>
                                    <th class="hidden-phone">Status</th>
                                </tr>
                            </thead>
							
							<tbody>
									<?php if($FeesComponentDetails)foreach($FeesComponentDetails as $FeesComponent){ ?>
									<tr class="odd gradeX">
										<td><input name="checkid" type="checkbox" class="checkboxes checkid" value="<?php echo $FeesComponent->fees_component_id; ?>" /></td>
										<td class="center hidden-phone">
										<?php echo $FeesComponent->school_batch_value; ?>
										</td>
										<td class="center hidden-phone">
										<?php echo $FeesComponent->branch_name; ?>
										</td>
										<td class="center hidden-phone">
										<?php echo $FeesComponent->class_name; ?>
										</td>
										<td class="center hidden-phone">
										<?php echo $FeesComponent->fees_name; ?>
										</td>
										<td class="center hidden-phone">
										<?php echo $FeesComponent->fees_amount; ?>
										</td>
										<td class="center hidden-phone">
										<?php echo $FeesComponent->fees_interval; ?>
										</td>
										<td class="center hidden-phone">
										<?php 
											 echo "Created By :". getRecordCreatedBy($FeesComponent->fees_create_by)."<br/>"; 
											 echo "Modified By :". getRecordCreatedBy($FeesComponent->fees_modify_by);
										?>
										</td>
										<td class="center hidden-phone">
										<?php echo "Created On  :".DateFormatCtrl($FeesComponent->fees_create_on)."<br/>";
											  echo "Modified On :".DateFormatCtrl($FeesComponent->fees_modify_on); ?>
										</td>
										<td class="center hidden-phone">
											<?php echo getRecordStatusIcons($FeesComponent->fees_status); ?>
										</td>
									</tr>
									<?php } ?>
                            </tbody>
                        </table>
					
					<!--start popup model-->	
					<div id="myModal" class="widget modal fade" role="dialog">	
						<div class="event-pop-up"></div>
					</div>
					<!--end popup model-->