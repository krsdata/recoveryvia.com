<?php
if($numofpages > '1')
{
	if($page==1)
	{
		$firstPage = 'javascript:void(0);';
		$previousPage = 'javascript:void(0);';
	}
	else
	{
		$firstPage = $_SERVER['PHP_SELF'].'?repp='.$_GET['repp'].'&search='.$_GET['search'];
		$previousPage = $_SERVER['PHP_SELF'].'?repp='.$_GET['repp'].'&page='.($page-1).'&search='.$_GET['search'];
	}
	
	if($page==$numofpages)
	{
		$lastPage = 'javascript:void(0);';
		$nextPage = 'javascript:void(0);';
	}
	else
	{
		$lastPage = $_SERVER['PHP_SELF'].'?repp='.$_GET['repp'].'&page='.$numofpages.'&search='.$_GET['search'];
		$nextPage = $_SERVER['PHP_SELF'].'?repp='.$_GET['repp'].'&page='.($page+1).'&search='.$_GET['search'];
	}
?>
	
	<a href="<?php echo $firstPage;?>" class="page-far-left"></a>
	<a href="<?php echo $previousPage;?>" class="page-left"></a>
	<div id="page-info"><?php echo $pagination;?></div>
	<a href="<?php echo $nextPage;?>" class="page-right"></a>
	<a href="<?php echo $lastPage;?>" class="page-far-right"></a>
    
<?php
}
?>    