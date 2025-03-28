<html>
<head>
    <title>Hello Laravel</title>
</head>
<body bgcolor="grey">
    <h1>
        Welcome to 
        <?php 
            if(!empty($firstname) && !empty($lastname)) {
                echo $firstname . ' ' . $lastname . ' homepage';
            } else {
                echo 'homepage';
            }
        ?>
    </h1>
    <p>This is the third time to run Laravel Framework.</p>
</body>
</html>
