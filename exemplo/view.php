<html>
    <head><title>Teste de MVC</title></head>
    <body>
        <form method="POST" action="controller.php">
            Velocida: <input type="text" name="cx_velocidade"><br>
            Tempo: <input type="text" name="cx_tempo"><br>
            <input type="submit" value="Calcular">
        </form>
    </body>
</html>

<?php
    if(isset($distancia)){
        echo "Distância = {$distancia}";
    }
?>