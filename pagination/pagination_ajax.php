<?php
include('include/db.php');
$display_row = 3;
if(isset($_POST['starting_index']))
{
	
	$starting_index = $_POST['starting_index'] - 1;
	$starting_index = $starting_index * $display_row;
	$query_question = mysql_query("SELECT * FROM testing LIMIT $starting_index,$display_row");
	while($row_question = mysql_fetch_array($query_question))
	{
		echo $row_question['id'];
		echo "<br>";
	}
}
if(isset($_POST['index']))
{
	$query_total_rows = mysql_query("SELECT * FROM testing");
	$total_num_of_question = mysql_num_rows($query_total_rows);
	$pagination_num = ceil($total_num_of_question / $display_row);
	

	$starting_index = $_POST['index'];
	$previous = $starting_index - 1;
	if($starting_index != $pagination_num)
	{
		$next = $starting_index + 1;
	}
	elseif($starting_index == $pagination_num)
	{
		$next = $starting_index;
	}

	if($starting_index == 1 || $starting_index == 2 || $starting_index == 3 || $starting_index == 4)
	{
		if($pagination_num > 8)
		{
			if($starting_index != 1)
			{
				echo "<span class='".$previous."' ><<</span>";	
			}
			
			for($a = 1; $a <= 8; $a++)
			{
				if($a == $starting_index)
				{
					echo "<span class='".$a." span-bgclr'>$a</span>";
				}
				else
				{
					echo "<span class='".$a."'>$a</span>";
				}
				
			}
			echo "<span class='".$next."'>>></span>";
			echo "....";
			echo "<span class='".$pagination_num."'>Last</span>";
					

		}
		else
		{

			if($starting_index != 1)
			{
				echo "<span class='".$previous."' ><<</span>";	
			}
			for($a = 1; $a <= $pagination_num; $a++)
			{
				if($a == $starting_index)
				{
					echo "<span class='".$a." span-bgclr'>$a</span>";
				}
				else
				{
					echo "<span class='".$a."'>$a</span>";
				}
			}
			if($starting_index != $pagination_num)
			{
			echo "<span class='".$next."'>>></span>";	
			}	

		}	
	}
	elseif($starting_index == $pagination_num || $starting_index == ($pagination_num - 1) 
		|| $starting_index == ($pagination_num - 2) || $starting_index == ($pagination_num - 3) )
	{
		if($pagination_num > 8)
		{
			echo "<span class='1'>First</span>";
			echo "...";
			echo "<span class='".$previous."'><<</span>";
			for($a = $pagination_num - 7 ; $a <= $pagination_num; $a++)
			{
				if($a == $starting_index)
				{
					echo "<span class='".$a." span-bgclr'>$a</span>";
				}
				else
				{
					echo "<span class='".$a."'>$a</span>";
				}
			}
			if($starting_index != $pagination_num)
			{
				echo "<span class='".$next."'>>></span>";
			}
			
		}
		else
		{
			echo "<span class='".$previous."'><<</span>";
			for($a = 1; $a <= $pagination_num; $a++)
			{
				if($a == $starting_index)
				{
					echo "<span class='".$a." span-bgclr'>$a</span>";
				}
				else
				{
					echo "<span class='".$a."'>$a</span>";
				}
			}
			if($starting_index != $pagination_num)
			{
				echo "<span class='".$next."'>>></span>";
			}
			

		}	
	}
	//execute when click on center pagination number.
	else
	{
		if($pagination_num > 8)
		{
			$starting = $starting_index - 3;
			$ending = $starting_index + 3;

			echo "<span class='1'>First</span>";
			echo "...";
			echo "<span class='".$previous."'><<</span>";
			for($a = $starting; $a <= $ending; $a++)
			{
				if($a == $starting_index)
				{
					echo "<span class='".$a." span-bgclr'>$a</span>";
				}
				else
				{
					echo "<span class='".$a."'>$a</span>";
				}
				
			}
			echo "<span class='".$next."'>>></span>";
			echo "...";
			echo "<span class='".$pagination_num."'>Last</span>";
			
		}
		else
		{
			echo "<span class='".$previous."'><<</span>";
			for($a = 1; $a <= $pagination_num; $a++)
			{
				if($a == $starting_index)
				{
					echo "<span class='".$a." span-bgclr'>$a</span>";
				}
				else
				{
					echo "<span class='".$a."'>$a</span>";
				}
			}
			echo "<span class='".$next."'>>></span>";
		}
	}
}
?>
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