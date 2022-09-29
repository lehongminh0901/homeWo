<?php
$Numbera = "";
$Numberb = "";
$Numberc = "";
if (isset ( $_POST ['Numbera'] )) {
    $Numbera = $_POST ['Numbera'];
}
if (isset ( $_POST ['Numberb'] )) {
    $Numberb = $_POST ['Numberb'];
}
if (isset ( $_POST ['Numberc'] )) {
    $Numberc = $_POST ['Numberc'];
}
//check điều kiện
function Result($a, $b, $c) {
    
    if ($a == "")
        $a = 0;
    if ($b == "")
        $b = 0;
    if ($c == "")
        $c = 0;
  
    echo "Equation: " . $a . "x^2 + " . $b . "x + " . $c . " = 0";
    echo "<br>";
    
    if ($a == 0) {
        if ($b == 0) {
            echo ("the equation has no solution!");
        } else {
            echo ("Equation has 1 solution: " . "x = " . (- $c / $b));
        }
        return;
    }
    //tính delta
    $delta = $b * $b - 4 * $a * $c;
    $x1 = "";
    $x2 = "";
    
    if ($delta > 0) {
        $x1 = (- $b + sqrt ( $delta )) / (2 * $a);
        $x2 = (- $b - sqrt ( $delta )) / (2 * $a);
        echo ("The equation with 2 solutions is : " . "x1 = " . $x1 . " và x2 = " . $x2);
    } else if ($delta == 0) {
        $x1 = (- $b / (2 * $a));
        echo ("The equation with a double solution is : x1 = x2 = " . $x1);
    } else {
        echo ("the equation has no solution!");
    }
}
?>
<form action="#" method="post">
 <table>
  <tr>
   <td>Enter number A</td>
   <td><input type="text" name="Numbera" value="<?=$Numbera?>" /></td>
  </tr>
  <tr>
   <td>Enter number B</td>
   <td><input type="text" name="Numberb" value="<?=$Numberb?>" /></td>
  </tr>
  <tr>
   <td>Enter number C</td>
   <td><input type="text" name="Numberc" value="<?=$Numberc?>" /></td>
  </tr>
  <tr>
   <td></td>
   <td><input type="submit" value="result"></td>
  </tr>
 </table>
</form>
<br>
<?php
if (is_numeric ( $GLOBALS ['Numbera'] ) && is_numeric ( $GLOBALS ['Numberb'] ) 
        && is_numeric ( $GLOBALS ['Numberc'] )) {
    Result ( $GLOBALS ['Numbera'], $GLOBALS ['Numberb'], $GLOBALS ['Numberc'] );
} 
?>