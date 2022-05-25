<!DOCTYPE html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<html>
	<head>
		<meta charset="utf-8">
		<title>Event Calendar</title>
        <link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "calendar.css" ?>">
	</head>
	<body>
        <?php include("view/menu.php"); ?>
        <div class = "center">
            <?php include("view/actual-cal.php"); ?>
        </div>
	</body>
</script>
</html>

