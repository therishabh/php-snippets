<?php
include('include/db.php');

$query_total_rows = mysql_query("SELECT * FROM testing");
$total_num_of_question = mysql_num_rows($query_total_rows);
$display_row = 3;
$pagination_num = ceil($total_num_of_question / $display_row);

$query_question = mysql_query("SELECT * FROM testing LIMIT $display_row");

echo "<div class='pagination'>";
while($row_question = mysql_fetch_array($query_question))
{
	echo $row_question['id'];
	echo "<br>";
}
echo "</div>";

echo "<div class='pagination_bar'>";

if($pagination_num > 9)
{
	for($a = 1; $a <= 8; $a++)
	{
		if($a == 1)
		{
			echo "<span class='".$a." span-bgclr'>$a</span>";
		}
		else
		{
			echo "<span class='".$a."'>$a</span>";
		}
	}
	echo "<span class='2'>>></span>";
	echo "....";
	echo "<span class='".$pagination_num."'>Last</span>";
}
else
{
	for($a = 1; $a <= $pagination_num; $a++)
	{
		if($a == 1)
		{
			echo "<span class='".$a." span-bgclr'>$a</span>";
		}
		else
		{
			echo "<span class='".$a."'>$a</span>";
		}
	}
	echo "<span class='2'>>></span>";
}


echo "</div>";

?>
<style type="text/css">

.pagination_bar{
	margin-top:20px;
}
	span{
		margin:4px; 
		cursor: pointer;
		font-weight: bold;
		font-size: 20px;
		padding:10px;
		background:#efefef;
	}
	span:hover{
		background:rgba(15,203,184,.9);
	}
	.span-bgclr{
		background:rgba(15,203,184,.9);
	}
</style>
<script type="text/javascript" src="javascripts/jquery.js"></script>
<script type="text/javascript">
<?php
for($a = 1; $a <= $pagination_num; $a++)
{
?>
	$('.<?php echo $a;?>').click(function() {
		var starting_index = "<?php echo $a; ?>";
		$.ajax({
			type: "POST",
			url: "pagination_ajax.php",
			data: { starting_index:starting_index }
		}).success(function(result){

			$('.pagination').html(result);
		});
	});

	$('.<?php echo $a;?>').click(function() {
		var starting_index = "<?php echo $a; ?>";
		$.ajax({
			type: "POST",
			url: "pagination_ajax.php",
			data: { index:starting_index }
		}).success(function(result){
			$('.pagination_bar').html(result);
		});
	});

<?php
}
?>
</script>