<?php
if(isset($_POST['submit'])){

  include_once('conexao.php');

  $ip_inicial = $_POST['criapool'];

  $stmt = $pdo->prepare('INSERT INTO ip (id, ip) VALUES (NULL, :ip)');
  $stmt->bindParam(':ip', $ip_inicial);
  $stmt->execute();

  $consulta = $pdo->query("SELECT id, ip AS ip_inicial FROM ip;");

    if($ip_inicial == $ip_inicial)
    for($i = 0; $i <= 255; $i++) {
      $ip = rtrim(long2ip(ip2long($ip_inicial) & (~255)),"0").+$i.PHP_EOL;
      //print_r($ip);

      $stmt = $pdo->prepare('INSERT INTO ip (id, ip) VALUES (NULL, :ip)');
      $stmt->bindParam(':ip', $ip);
      $stmt->execute();

    }

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pool IP</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #submit{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }
    </style>
</head>
<body>
    <div class="box">
        <form action="pool_ip.php" method="POST">
            <fieldset>
                <legend><b>Criar Pool de ip</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="criapool" id="criapool" class="inputUser" required>
                    <label for="criapool" class="labelInput">Pool Inicial</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>