<?php
print "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>\n";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Ejemplo de recogida y comprobación de datos (Resultado). Ejemplo de ejercicio.
  PHP. Bartolomé Sintes Marco</title>
  <link href="mclibre_php_soluciones.css" rel="stylesheet" type="text/css"
  title="Color" />
</head>

<body>
<h1>Ejemplo de recogida y comprobación de datos (Resultado)</h1>
<?php
function recoge($var) 
{
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}

$nombre = recoge("nombre");
$edad   = recoge("edad");

$nombreOk = false;
$edadOk   = false;

if ($nombre == "") {
    print "<p class=\"aviso\">No ha escrito su nombre.</p>\n";
} else {
    $nombreOk = true;
}

if ($edad == "") {
    print "<p class=\"aviso\">No ha escrito su edad.</p>\n";
} elseif (!is_numeric($edad)) {
    print "<p  class=\"aviso\">No ha escrito la edad como número.</p>\n";
} elseif (!ctype_digit($edad)) {
    print "<p class=\"aviso\">No ha escrito la edad como número entero.</p>\n";
} elseif ($edad < 0 || $edad > 130) {
    print "<p class=\"aviso\">La edad no está entre 0 y 130 años.</p>\n";
} else {
    $edadOk = true;
}

if ($nombreOk && $edadOk) {
    print "<p>Su nombre es <strong>$nombre</strong>.</p>\n";
    print "<p>Su edad es <strong>$edad</strong> años.</p>\n";
}

?>
<p><a href="ejemplo_recogida_datos_2.html">Volver al formulario.</a></p>

<p class="ultmod">Última modificación de esta página: 30 de septiembre de 2014</p>

<p class="licencia">
Este programa forma parte del curso <strong><span xmlns:dct="http://purl.org/dc/terms/" 
xmlns:property="dct:title">Páginas web con PHP</span></strong> por
<a xmlns:cc="http://creativecommons.org/ns#" href="http://www.mclibre.org/"
rel="cc:attributionURL">Bartolomé Sintes Marco</a>.<br />
El programa PHP que genera esta página está bajo
<a rel="license" href="http://www.gnu.org/licenses/agpl.txt">licencia AGPL 3 o
posterior</a></p>
</body>
</html>