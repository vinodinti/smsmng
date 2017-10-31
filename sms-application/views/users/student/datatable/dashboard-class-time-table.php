        <?php
		//$WeekList 	= $this->dashboardmodel->getWeeks();
		//$PeriodList = $this->dashboardmodel->getPeriods();
		//head section
		$TimeTableMessase = '<table class="table table-striped table-bordered table-advance table-hover" id="sample_1"><thead><tr><th></th>';
		$PeriodNames = array();
		foreach($PeriodList as $Period){
			foreach($ResultStatus as $Result){
				if($Period->period_id==$Result->period_fk_id){
					if(!(in_array($Result->period_fk_id, $PeriodNames))){
								$TimeTableMessase .= '<th align="center">'. $Period->period_name .'</p></th>';
								$PeriodNames[] = $Result->period_fk_id;
							}
				}
			}
		}
		$TimeTableMessase .= '</tr></thead><tbody>';
		//body section
			if($ResultStatus){
				$WeekNames = array();
				
				foreach($WeekList as $WeekName){
					foreach($ResultStatus as $Result){
						if($WeekName->week_id==$Result->day_fk_id){
							
							if(!(in_array($Result->day_fk_id, $WeekNames))){
								$classsuccess = ucfirst($WeekName->week_name) == date('l') ? 'success' : '';
								$TimeTableMessase .= '<tr class="odd gradeX"><td class="highlight"><div class="'.$classsuccess.'"></div><a>'. ucfirst($WeekName->week_name) .'</a></td>';
								$WeekNames[] = $Result->day_fk_id;
							}
							//<p>". time_twentyFour_to_twelve($Result->start_time) ."-". time_twentyFour_to_twelve($Result->end_time).'</p>
					$TimeTableMessase .= "<td></p>". $Result->subject_name .' '. $Result->employee_full_name ."</p></td>";
					
						}
					}
					$TimeTableMessase .= "</tr>";
				} 
			}else{
				$TimeTableMessase .= "<td>No Records Found!</td>";
			}	
		$TimeTableMessase .= "</tbody></table>";
		
		echo $TimeTableMessase;
		?>