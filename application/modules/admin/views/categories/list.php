<div class="section"> 
<script type="text/javascript">
	function check(){ if(confirm('Are you sure ?')){ return true; }else{ return false;}}
</script> 
  <!--[if !IE]>start title wrapper<![endif]-->
  <div class="title_wrapper"> <span class="title_wrapper_top"></span>
    <div class="title_wrapper_inner"> <span class="title_wrapper_middle"></span>
      <div class="title_wrapper_content">
        <h2 class="menu_title">Manage submenu</h2>
      </div>
    </div>
    <span class="title_wrapper_bottom"></span> </div>
  <!--[if !IE]>end title wrapper<![endif]--> 
  
  <!--[if !IE]>start section content<![endif]-->
  <div class="section_content"> <span class="section_content_top"></span>
    <div class="section_content_inner minheight">
      <div class="table_tabs_menu">
        <ul class="table_tabs">
          <li><a href="#" name="tab1" class="selected"><span><span>List all</span></span></a></li>
          <li><a href="javascript:void(0)" name=""><span><span>Search</span></span></a></li>
          <li><a href="<?php echo base_url(); ?>admin/categorie/add" name=""><span><span>Add new</span></span></a></li>
        </ul>
        <!--[if !IE]>start  tabs<![endif]--> 
        <!--[if !IE]>end  tabs<![endif]--> 
      </div>
      <!--[if !IE]>start table_wrapper<![endif]-->
      <div class="table_wrapper">
        <div class="table_wrapper_inner" id="tab1">
          <form action="" method="post" name="sac">
            <table cellpadding="0" cellspacing="0" width="905">
              <tbody>
                <tr>
                  <th width="32">Stt.</th>
                  <th width="318">Title</th>
                  <th width="94">Order by</th>
                  <th width="136">Type</th>
                  <th width="149">Category</th>
                  <th width="80">Status</th>
                  <th width="94">Actions</th>
                </tr>
                <?php
				if($listall != NULL){
					$stt = 0;
					foreach($listall as $items){
						$stt++;
						echo "<tr class='first'>";
						echo "<td>$stt</td>";
						echo "<td>".$items['name']."</td>";
						echo "<td>".$items['order']."</td>";
						if($items['type'] == 1){
							echo "<td>Primary</td>";
						}else{
							echo "<td style='color:red'>Second</td>";
						}
						echo "<td>".$items['cate_name']."</td>";
						if($items['status'] == 1){
							echo "<td><a href='".base_url()."admin/categorie/active/$items[id]/0'>Active</a></td>";
						}else{
							echo "<td><a href='".base_url()."admin/categorie/active/$items[id]/1'>Not active</a></td>";
						}
						echo "<td>";
								echo "<div class='actions_menu'><ul>";
									echo "<li><a href='".base_url()."admin/categorie/update/$items[id]/' class='edit'>Edit</a></li>";
									echo "<li><a href='".base_url()."admin/categorie/del/$items[id]/' class='delete' onclick='return check()'>Del</a></li>";
								echo "</ul></div>";
							echo "</td>";
							echo "</tr>";
						echo "</tr>";
					}
				}else{
					echo "<tr>";
					echo "<td colspan='6'>No data</td>";
					echo "</tr>";
				}
				?>
              </tbody>
            </table>
          </form>
          <div id="pagination">
            <?php  echo $this->pagination->create_links();?>
          </div>
        </div>
        <div class="table_wrapper_inner" id="tab2"> </div>
      </div>
      <!--[if !IE]>end table_wrapper<![endif]--> 
    </div>
    <!--[if !IE]>start pagination<![endif]-->
    <div class="pagination_wrapper"> <span class="pagination_top"></span>
      <div class="pagination_middle">
        <div class="pagination"> </div>
      </div>
      <span class="pagination_bottom"></span> </div>
    <!--[if !IE]>end pagination<![endif]--> 
    <span class="section_content_bottom"></span> </div>
  <!--[if !IE]>end section content<![endif]--> 
</div>