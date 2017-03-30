<?php
$queryPagination = $obj->executeQry($sql,$link);
$totalRowsPagination=$obj->getRow($queryPagination);

$page = $_GET['page'];


if(isset($_GET['repp']) && $_GET['repp']!='')
{
	$recordPerPage = $_GET['repp'];
}

if(empty($page))
{
	$page = 1;
}


$recordFromId = ($page - 1) * $recordPerPage;
$numofpages = ceil($totalRowsPagination / $recordPerPage);

for($i = 1; $i <= $numofpages; $i++)
{
	if($page == $i)
		$pagination .= "<a class='current' href='javascript:void(0);'>".$i."</a>";
	else
		$pagination .= '<a href="'.$_SERVER['PHP_SELF'].'?repp='.$_GET['repp'].'&page='.$i.'&search='.$_GET['search'].'">'.$i.'</a>';
}



$sql=$sql." LIMIT $recordFromId,$recordPerPage";
?>