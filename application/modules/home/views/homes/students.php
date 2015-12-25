			<div id="students">
            	<?php
					function cut_str($val,$start,$end){
						$total 	= strlen($val);
						$cutted = mb_substr($val,$start,$end,'UTF-8');
						$cutted_leng = strlen($cutted);
						if($cutted_leng < $total){
							$seccess = $cutted."...";
						}else{
							$seccess = $cutted;
						}
						return $seccess;
					}
				?>		
	            <h2 class="studenth2">Ý kiến học viên</h2>
	            <?php
				if(isset($students) && $students != NULL){
					foreach($students as $stude){
						echo "<div class='content_left_mid'>";
						    if($stude['student_avatar'] != NULL){
								echo "<img src='".base_url()."uploads/students/thumb/".$stude['student_avatar']."' alt='".$stude['student_name']."' title='".$stude['student_name']."' width='83' class='student_img' />";
							}else{
								echo "<img src='".base_url()."uploads/students/thumb/noavatar.png' alt='".$stude['student_name']."' title='".$stude['student_name']."' width='83' height='105' class='student_img' />";
							}
							echo "<h3>".$stude['student_name']."</h3>";
							echo "<div class='student_info'>".cut_str($stude['student_info'],0,70)."</div>";
							echo "<div class='cls'></div>";
							echo "<ul>";
								echo "<li>- Phone : ".$stude['student_phone']."</li>";
								echo "<li>- Email : ".$stude['student_email']."</li>";
								if($stude['student_face'] != NULL){
								echo "<li>- Facebook : <a href=".$stude['student_face']." target='_blank' style='font-size:11px;color:#060'>Xem</a></li>";
								}
							echo "</ul>";
						echo "</div>";
					}
				}
				?>
          </div>