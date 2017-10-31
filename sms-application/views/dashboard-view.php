			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid" style="background-color:ffffff;">
				
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">
							<?php //echo MemberType(); ?> Dashboard
							<small>statistics and more</small>
						</h3>
					</div>
				</div>
				
				<!-- BEGIN PAGE CONTENT-->
				<div id="page" class="dashboard">
                   
				   					<!-- BEGIN SQUARE STATISTIC BLOCKS-->
					<?php $modulesInfo = getMemberModules(getMemberId()); ?>
                    <div class="square-state">
					
						<?php if($modulesInfo){ $count=1;
								foreach($modulesInfo as $key => $modules){ 
									if($count==1){ echo '<div class="row-fluid">'; } ?>
							
									<a class="icon-btn span2" href="<?php echo getDashboardUrl($modules->ModuleName); ?>">
										<i class="<?php echo $modules->ModuleImg; ?>"></i>
										<div><?php echo $modules->ModuleName; ?></div>
										<!--<span class="badge badge-important dropdown-toggle element">3</span>-->
									</a>
							
							<?php if(($count == 6) || ($key+1 == count($modulesInfo))){ echo '</div>'; $count=0;} ?>
					   
					   <?php $count=$count+1; }  } ?>
					
                    </div>
                    <!-- END SQUARE STATISTIC BLOCKS-->
					
					
                
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->