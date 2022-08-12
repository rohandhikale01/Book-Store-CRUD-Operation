<?php
function InputElement($icon,$placeholder,$name,$value)
{
    $ele="
    <div class=\"input-group mb-3\">
    <span class=\"input-group-text bg-warning\">$icon</span>
    <input type=\"text\" autocomplete=\"off\" class=\"form-control\" placeholder='$placeholder' name='$name' value='$value'>
  </div>";

  echo $ele;
}

function ButtonElement($btnid,$style,$text,$name,$attr)
{
  $btn="<button name='$name' '$attr' class='$style' id='$btnid'>$text</button>";
  echo $btn;  
}


?>