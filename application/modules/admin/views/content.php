<div id="content">
    <div class="inner">
        <!--[if !IE]>start section<![endif]-->
        <!--[if !IE]>start section<![endif]-->
        <script type="text/javascript">
            $(document).ready(function(){
                var $tab  = $("ul.table_tabs li a");
                    $obj = $(".table_wrapper_inner");
                    $tab.click(function(){
                        $item = $(this).attr("name");
                        if($item != ""){
                            $(".selected").removeClass("selected");
                            $(this).addClass("selected");
                            $obj.hide();
                            $("#"+$item).show();
                            return false;
                        }else{
                            return true;
                        }
                    });
            });
        </script>
        <?php $this->load->view($template,$data);?>
    </div>
</div>