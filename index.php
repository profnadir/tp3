<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Calculatrice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Calculatrice</h1>
        <form method="post">
            <div class="mb-3">
                <label for="operande1" class="form-label">Opérande 1</label>
                <input type="number" class="form-control" id="operande1" name="operande1" required
                 value="<?php old('operande1') ?>">
            </div>
            <div class="mb-3">
                <label for="operator" class="form-label">Opérateur</label>
                <select name="operator" id="operator" class="form-select">
                    <option value="+">Addition</option>
                    <option value="-">Soustraction</option>
                    <option value="*">Multiplication</option>
                    <option value="/">Division</option>
                    <option value="%">Modulo</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="operande2" class="form-label">Opérande 2</label>
                <input type="number" class="form-control" id="operande2" name="operande2" required
                    value="<?php old('operande2') ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">=</label>
            </div>
            <div class="mb-3">
                <label for="resultat" class="form-label">Resultat</label>
                <input type="text" class="form-control" id="resultat" name="resultat" value="<?php echo isset($resultat) ? $resultat : ''; ?>">
            </div>
            <button type="submit" class="btn btn-primary mb-3" name="calculer">Calculer</button>
           
        </form>
        <?php

            //if(isset($_POST['calculer'])){
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {

                $operande1 = $_POST['operande1'];
                $operator = $_POST['operator'];
                $operande2 = $_POST['operande2'];

                if( $operator == '/' && $operande2 == 0){
                    echo 'Impossible de diviser par 0';
                }else{
                    $resultat = 0;

                    switch($operator){
                        case '+' :
                            $resultat = $operande1 + $operande2;
                            break;
                        case '-' :
                            $resultat = $operande1 - $operande2;
                            break;
                        case '*' :
                            $resultat = $operande1 * $operande2;
                            break;
                        case '/' :
                            $resultat = $operande1 / $operande2;
                            break;
                        case '%' :
                            $resultat = $operande1 % $operande2;
                            break;
                    }
    
                    echo "Resultat du calcul ".$operande1.$operator.$operande2 . " = ".$resultat;
                    
                }
            }

            function old($inputName)
            {
                if(isset($_POST[$inputName])) echo $_POST[$inputName];
            }
        ?>
    </div>
</body>
</html>
