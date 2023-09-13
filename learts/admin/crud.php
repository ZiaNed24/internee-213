<?php
function connection()
{
	$host="localhost";
	$user = "root";
	$password= "";
	$db_name="2103g1";
	$conn=mysqli_connect($host,$user,$password,$db_name);
	return $conn;
}
	function query_exc($query)
	{
		$conn=connection();	
		$result= mysqli_query($conn,$query);
		return $result;
	}

	function fetch($table_name)
	{
		$conn=connection();

		$query= "select * from $table_name";
		$result= mysqli_query($conn,$query);
		return $result;
	}


	function fetch_row($table_name,$condition)//array("username"=>"ahmed","password"=>"1234")
	{
		$conn=connection();
		$col= "";
		foreach ($condition as $key => $value) {
			$col.="$key='$value' and ";
		}
		$col=rtrim($col,"and ");
		$query="select * from $table_name where $col";
		$result= mysqli_query($conn,$query);
		return $result;
	}

	function insert_row($table_name,$data)
	{
		$conn=connection();

		$col= "";
		$rows="";

		foreach ($data as $key => $value) {
			$col.="$key,";
			$rows.="'$value',";
		}
		$col=rtrim($col,",");
		$rows=rtrim($rows,",");
		 $query="insert into $table_name($col) values($rows)";

		 echo $query;

		$result=mysqli_query($conn,$query);
		return $result;
	}

function delete_row($table_name,$condition)
	{
		$conn=connection();
		$col= "";
		foreach ($condition as $key => $value) {
			$col.="$key='$value' and ";
		}
		$col=rtrim($col,"and ");
		 $query="delete from $table_name where $col";
		$result= mysqli_query($conn,$query);
		return $result;
	}
								
	function update_row($table_name,$data,$condition)
	{
		$conn=connection();
		$col_row= "";
		$cond="";
		foreach ($data as $key => $value) {
			$col_row.="$key='$value',";			
		}

		foreach ($condition as $key => $value) {
			$cond.="$key='$value' and ";			
		}

		$col_row=rtrim($col_row,",");
		$cond=rtrim($cond,"and ");
		 $query="update $table_name set $col_row where $cond";
		$result= mysqli_query($conn,$query);
		return $result;
	}

?>