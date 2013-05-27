<?php 
$limit=RECORDS_PER_PAGE;
$limit=10;
if(isset($_POST['cancelsubmit']))
  {
	if($_POST['epage']==''){
		$start=0;
		}
		else{
	$start=$_POST['epage'];
		}
	$_POST=array("searchvaue"=>$_POST['searchvaue'],"searchbypublication"=>$_POST['searchbypublication'],"searchbyrubric"=>$_POST['searchbyrubric'],"datevalue"=>$_POST['datevalue'],"inaapvaue"=>$_POST['inaapvaue']);
	}
else if(isset($_GET['epage']) && $_POST['cancelsubmit']=='')
 {
	$start=$_REQUEST['epage'];
	$postvaue=$_POST['serdata'];
	$_POST=unserialize(base64_decode($postvaue));
 }
else 
 {
	$start=0;	
 }
 	if(isset($_POST['limit']))
	{
		$end=$_POST['limit'];
	}
	else
	{
		$end= $limit;
	}
	$lim="LIMIT $start,$end";
	$postvalue=$_POST;
class pagination {
 public	function newpagination($erp_user,$pagename,$pvalue,$pagenum){
	 		 $limit=10;
			 $count = $erp_user;
	  		 $per_page = $limit;
	   		 $pages = ceil($count/$per_page);
			 if($erp_user > $limit){		
			?>
           	<ul id="pagination" class="my-pagination classC page-C-05">
           	<li id="1">First</li>
            <?php if(($_REQUEST['pagenum']!="1" && $_REQUEST['pagenum']!="")){?>
           	<li id="<?php if((!isset($_REQUEST['pagenum']) ||$_REQUEST['pagenum']=="1")){echo "1";}else{echo $_REQUEST['pagenum']-1;}?>">Previous</li>
            <?php }?>
			<?php
				
				if($pages > $limit)
				{	
					if($pagenum >($limit/2))
					{
					$k=$pagenum-4;
					$test=$pages-9;				
					$r=$pagenum+5;
						if($r > $pages)
						{
							$r=$pages;
						}
						if($k>$test)
						{
							$k=$test;
						}
					}
					else
					{
						$k=1;
						$r=10;
					}
				}
				else{
					$k=1;
					$r=$pages;
					}
				for($i=$k; $i<=$r; $i++)
				{
				if($_REQUEST['pagenum']==$i){
					$class='pageselected';
					}
				else if($_REQUEST['pagenum']==''&& $i=='1'){
					$class='pageselected';					
					}
				else{
					$class='';							
					}
					echo '<li id="'.$i.'"  class="'.$class.'" >'.$i.'</li>';
				}
			if($pages!=$_REQUEST['pagenum']){
			?>
            <li id="<?php if(!isset($_REQUEST['pagenum'])){echo "2";}else{echo $_REQUEST['pagenum']+1;}?>">Next</li>
            <?php }?>
            	<li id="<?php echo $pages;?>">last</li>
			</ul>	
            <?php }?>
    <script>
	jQuery("#pagination li").click(function(){
	var j = jQuery.noConflict();
	var pagename='<?php echo $pagename;?>';
	var pageNum = this.id;
	var start=(pageNum-1)*<?php echo $limit;?>;
	var dataString='serdata=<?php echo base64_encode(serialize($pvalue));?>';
	j.ajax({
		type:"post",
		url:pagename+".php?epage="+start+"&pagenum="+pageNum,
		data: dataString,
		success: function(data) {
			j("#maindiv").html(data);
			 }
			});	
	 		});	
    </script>
	<?php
	}
}
$f = new pagination;
?>
