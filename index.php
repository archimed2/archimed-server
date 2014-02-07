<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ArchiMed - Rapport generering</title>

    <link rel="stylesheet" href="themes/base/jquery.ui.all.css">
	<script src="jquery-1.8.0.js"></script>
	<script src="ui/jquery.ui.core.js"></script>
	<script src="ui/jquery.ui.datepicker.js"></script>
	<link rel="stylesheet" href="ui/style.css">
	<script>
	$(function() {
		$( "#create_date" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
		
		$( "#end_date" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
	});
</script>

<script type="text/javascript">
	function validation()
	{
		  var create_date = document.getElementById('create_date').value;
		  var end_date   = document.getElementById('end_date').value;
		  
		  if(create_date == "")
		  {
			 alert('Please Select the Start Date');
			 return false;
		  }
		  
		  if(end_date == "")
		  {
			 alert('Please Select the End Date');
			 return false;
		  }
		
				 
		  // Here are the two dates to compare
			var date1 = create_date;
			var date2 = end_date;

			// First we split the values to arrays date1[0] is the year, [1] the month and [2] the day
			date1 = date1.split('-');
			date2 = date2.split('-');

			// Now we convert the array to a Date object, which has several helpful methods
			date1 = new Date(date1[0], date1[1], date1[2]);
			date2 = new Date(date2[0], date2[1], date2[2]);

			// We use the getTime() method and get the unixtime (in milliseconds, but we want seconds, therefore we divide it through 1000)
			date1_unixtime = parseInt(date1.getTime() / 1000);
			date2_unixtime = parseInt(date2.getTime() / 1000);

			// This is the calculated difference in seconds
			var timeDifference = date2_unixtime - date1_unixtime;

			// in Hours
			var timeDifferenceInHours = timeDifference / 60 / 60;

			// and finaly, in days :)
			var timeDifferenceInDays = timeDifferenceInHours  / 24;

			if(timeDifferenceInDays < 0){			
				alert("Please select the correct start date and end date");
				return false;
			} 
		  return true;
	}
	
</script>
</head>
<body>
<form name="survey" method="post" action="histroy_export.php">
<table style="border:#0066FF solid 1px; width:320px; padding-left:20px; height:150px; margin:210px 20px 0px 420px;">
  <tr>
    <td style="font-size:12px; color:#0066FF;" colspan="2"> ArchiMed - Rapport generering</td>	
  </tr>  

  <tr>
    <td style="font-size:12px;">Start dato</td>
	<td><input type="text" name="create_date_archi" id="create_date" style="width:160px; font-size:12px;" value="<?php echo date("Y-m-d"); ?>" />
  </tr>
  <tr>
    <td style="font-size:12px;">Slut dato</td>
	<td><input type="text" name="end_date_archi" id="end_date" style="width:160px; font-size:12px;" value="<?php echo date("Y-m-d"); ?>" />
  </tr>

   <tr>
    <td>&nbsp;</td>
	<td><input type="submit" name="report" value="Generer rapport" style="font-size:12px;" onclick="return validation();" /></td>
  </tr>
</table>
</form>
</body>
</html>
