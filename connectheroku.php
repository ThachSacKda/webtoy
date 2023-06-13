<?php   
    $Connect = mysqli_connect("co28d739i4m2sb7j.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "irfmr2jl51gewasx", "dwx98ks7hgyd4ify", "uz071whlg10ona8o") or die("error".mysqli_error($Connect));
    mysqli_query($Connect, 'SET NAMES "utf8"');
?>