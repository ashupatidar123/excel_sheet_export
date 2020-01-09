<?php

public function userExcel(Request $req)
{
	$results = $this->adminModel->customFetchQuery('*',$tbl='users',$where='','ORDER BY user_id DESC');
	$results = json_decode(json_encode($results), True);
	//echo "<pre>"; print_r($results); die();
	$filename = "user_details.xls";
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=$filename");  
	header("Pragma: no-cache"); 
	header("Expires: 0");
	$data  =  '';
	$data .= '<table border="3">';
	$data .= '<tr>';
	$data .= '<th>Sno</th><th>User ID</th><th>Username</th><th>Name</th>';
	$data .= '<th>Mobile</th><th>Register Date</th>';
	$data .= '</tr>';
	$sno=1;
	foreach($results as $key => $row)
	{
		$data .= '<tr>';
		$data .= '<td>'.$sno++.'</td>';
		$data .= '<td>'.$row['user_id'].'</td>';
		$data .= '<td>'.$row['username'].'</td>';
		$data .= '<td>'.$row['Name'].'</td>';
		$data .= '<td>'.$row['Mobile'].'</td>';
		$data .= '<td>'.$row['Email'].'</td>';
		$data .= '<td>'.$row['created_date'].'</td>';
		$data .= '<td>'.$row['Email'].'</td>';
		$data .= '<td>'.$row['Email'].'</td>';			
		$data .= '</tr>';
	}
	$data .= '</table>';
	print_r($data);
}