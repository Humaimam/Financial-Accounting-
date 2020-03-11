<?php
$flag1=false;
$flag2=false;

$connect = mysqli_connect('127.0.0.1', 'root', '','accountingCyclea');
if($connect)
{
echo "connected";
}

$trialBl="CREATE TABLE accountingCyclea.trialbalance ( Particular varchar( 150 ) not null, debit int ( 100 ) null, credit int ( 100 ) null )";
if(mysqli_query($connect,$trialBl)){
   echo "<br>created table for trial balance<br>";
}



$numberofitem="SELECT * FROM accountingCyclea.recordofitems ";
$select=mysqli_query($connect,$numberofitem);
 while($row1=mysqli_fetch_array($select,MYSQLI_ASSOC))   
{
//$sumfortrial="SELECT SUM(debit) as debitAm, SUM(credit) as creditAm from accountingCyclea.".$_POST['credPart'];
$sumfortrial="SELECT SUM(debit) as debitAm, SUM(credit) as creditAm from accountingCyclea.".$row1['items'];
$fetch=mysqli_query($connect,$sumfortrial);
    $row2=mysqli_fetch_array($fetch,MYSQLI_ASSOC);
    if($row2['debitAm']>$row2['creditAm'])
    {
    $total=$row2['debitAm']-$row2['creditAm'];
    $checkifexist="SELECT * FROM accountingCyclea.trialbalance";
    $query3=mysqli_query($connect,$checkifexist);

    while($row4=mysqli_fetch_array($query3,MYSQLI_ASSOC))
    
    {

    if($row4['Particular']==$row1['items'])
    {
     $updatetrial="UPDATE accountingCyclea.trialbalance SET debit= '".$total."' ,credit= '0'  WHERE Particular= '".$row1['items']."' ";
     if(mysqli_query($connect,$updatetrial))
        {
        echo "<br><br>update value";
        $flag1=true;
        break;
        }
        else echo "<br><br>couldn't updated";

     
    }
    
    }
    if($flag1==false)
    {
        $insertintotable="INSERT INTO accountingCyclea.trialbalance(Particular, debit) VALUES ('$row1[items]', '$total')";
        if(mysqli_query($connect,$insertintotable))
        {
        echo "<br><br>insert into table";
        }
        else echo "<br><br> error";

    }
    

}
else{
    $total=$row2['creditAm']-$row2['debitAm'];
    $checkifexist="SELECT * FROM accountingCyclea.trialbalance";
    $query3=mysqli_query($connect,$checkifexist);

    while($row4=mysqli_fetch_array($query3,MYSQLI_ASSOC))
    
    {

    if($row4['Particular']==$row1['items'])
    {
     $updatetrial="UPDATE accountingCyclea.trialbalance SET credit= '".$total."' ,debit= '0'  WHERE Particular= '".$row1['items']."' ";
        if(mysqli_query($connect,$updatetrial))
        {
        echo "<br><br>update value";
        $flag2=true;

        break;
        }
        else echo "<br><br>couldn't updated";

     
    }
    
    }
    if($flag2==false)
    {
        $insertintotable="INSERT INTO accountingCyclea.trialbalance(Particular, debit) VALUES ('$row1[items]', '$total')";
        if(mysqli_query($connect,$insertintotable))
        {
        echo "<br><br>insert into table";
        }
        else echo "<br><br> error";

    }
}

}

$join="SELECT * FROM accountingCyclea.trialbalance";
$cnct=mysqli_query($connect,$join);
if($cnct)
$COUNT=mysqli_num_rows($cnct);
echo "<table style=margin-left:10%; border= '1'>";
echo "<tr style=background-color:cadetblue><td>Particular</td><td>Debit Amount</td><td>Credit Amount</td></tr>";
while($ROW=MYSQLI_FETCH_ARRAY($cnct,MYSQLI_ASSOC)){
echo "<tr style=background-color:aqua><td>".$ROW['Particular']."</td><td>".$ROW['debit']."</td><td>".$ROW['credit']."</td></tr>";
}
echo "</table>";
?>