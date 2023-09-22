<?php
    include("conexionDB.php");
    if(isset($_POST['enfermero'])) {
        $enfermero = $_POST['enfermero'];
        $sql = "SELECT * FROM Enfermero WHERE apellido LIKE :enfermero";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':enfermero', $enfermero, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(empty($results)) {
            echo "Sin resultados";
        } else {
            foreach($results as $result) {
                echo $result['apellido'];
            }
        }
    }
?>