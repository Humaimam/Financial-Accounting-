<?php



$mysql_id = mysqli_connect('127.0.0.1', 'root', '','accountingCyclea');
if($mysql_id)
{
echo "connected";
}

$join="SELECT * FROM accountingCyclea.trialbalance";
$cnct=mysqli_query($mysql_id,$join);
if($cnct)
$COUNT=mysqli_num_rows($cnct);
echo "<table style=margin-left:10%; border= '1'>";
echo "<tr style=background-color:cadetblue><td>Particular</td><td>Debit Amount</td><td>Credit Amount</td></tr>";
while($ROW=MYSQLI_FETCH_ARRAY($cnct,MYSQLI_ASSOC)){
echo "<tr style=background-color:aqua><td>".$ROW['Particular']."</td><td>".$ROW['debit']."</td><td>".$ROW['credit']."</td></tr>";
}
echo "</table>";

?>