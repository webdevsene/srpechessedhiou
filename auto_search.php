<?php require_once ('process.php'); ?> 

<?php
        #autocomplete textbox jquery ajax in PHP

        if (isset($_POST['numcin_txb'])) {

            // traitement auto_search 
            
            $output = "";
            
            $user_input = $_POST['numcin_txb'];

            $sqlquery = "SELECT num_cin FROM `tbl_pecheur` WHERE num_cin LIKE '%$user_input%'";

            $result = $mysqli->query($sqlquery);

            $row_count = mysqli_num_rows($result);

            $output = '<ul class="list-unstyled">';

            if ($row_count > 0) {
                while ($row = mysqli_fetch_assoc($result)) { // oubien $row = $result->fetch_assoc()

                    $output = '<li id="nat" name="nat">' . ucwords($row['num_cin']) . '</li>';
                }
            }
            else {
                $output .= '<li>Aucune correspondance pour ce numéro dans le système !</li>';
            }

            $output .= '</ul>';
            echo $output;

        } 

?>