<?php

    header('Content-Type: text/html; charset=utf-8');

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <title></title>
            <meta charset="utf-8" />
            
            <script src="jquery-1.9.1.js" type="text/javascript"></script>

            <link href="Office.css" rel="stylesheet" type="text/css" />
            <script src="https://appsforoffice.microsoft.com/lib/1.1/hosted/office.js" type="text/javascript"></script>
            
            <link href="App.css" rel="stylesheet" type="text/css" />
            <script src="App.js" type="text/javascript"></script>

            <link href="Home.css" rel="stylesheet" type="text/css" />
            <script src="Home.js" type="text/javascript"></script>
            
            <script>

                function addAttendees(element) {

                    var newRecipients = [
                        {
                            "displayName": "" + element.value + "",
                            "emailAddress": "" + element.value + ""
                        }
                    ];

                    Office.context.mailbox.item.to.addAsync(newRecipients, function(result) {
                        if (result.error) {
                            showMessage(result.error);
                        } else {
                            showMessage("Recipients added");
                        }
                    });
                }

            </script>

    </head>

    <body>

        <div id="content-main">
        <div class="padding">

    <?php

        $suche = $_GET["S"];

        //load database connection
            $host = "YOURHOST";
            $user = "USER";
            $password = "password";
            $database_name = "DB NAME";
            $port = "3306";

            $pdo = new PDO("mysql:host=$host;dbname=$database_name;port=$port", $user, $password, array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ));
        // Search from MySQL database table
        $search=$_GET['S'];
        $query = $pdo->prepare("select * from contacts where id LIKE '%$search%' OR firstname LIKE '%$search%' OR lastname LIKE '%$search%' OR email LIKE '%$search%' LIMIT 0, 2000");
        $query->bindValue(1, "%$search%", PDO::PARAM_STR);
        $query->execute();
        // Display search result
                if (!$query->rowCount() == 0) {			
                    while ($results = $query->fetch()) {
                        
                        echo "<button>+</button><p>Name: ".$results['firstname']." ".$results['lastname']." | E-Mail: <input type='button' name='My button' value='".$results['email']."' onClick='addAttendees(this);'><br />";
                    }	
                } else {
                    echo 'The search for "'.$suche.'" did not return any hits!';
                }		



        ?>

        </div>

        </div>

    </body>

</html>


