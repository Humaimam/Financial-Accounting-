<?php

$connect=mysqli_connect("127.0.0.1","root","","accountingCyclea");
$database="CREATE DATABASE accountingCyclea";
if(mysqli_query($connect,$database)){
    echo "created database";
}
 $createtable="CREATE TABLE accountingCyclea.generalJournal ( DT date not null, debitParticular varchar( 150 ) not null, creditParticular varchar( 150 ) not null, debit int ( 100 ) not null, credit int ( 100 ) not null )";
 if(mysqli_query($connect,$createtable)){
    echo "created table";
}

$insertintotable="INSERT INTO accountingCyclea.generalJournal(DT, debitParticular, creditParticular, debit, credit) VALUES ('".$_POST['date']."','".$_POST['debPart']."','".$_POST['credPart']."','".$_POST['debitAmount']."','".$_POST['creditAmount']."')";
if(mysqli_query($connect,$insertintotable)){
    echo "insert into table";
}

$item="CREATE TABLE accountingCyclea.recordofitems ( items varchar ( 100 ) not null )";
if(mysqli_query($connect,$item)){
   echo "item list generated";
}


$createTacountfordebit="CREATE TABLE accountingCyclea.".$_POST['debPart']." ( debit INT( 100 ) NULL, credit INT( 100 ) NULL )";
if(mysqli_query($connect,$createTacountfordebit)){
    echo " Create taccount debit table";
    $record="INSERT INTO accountingCyclea.recordofitems (items) VALUES ('".$_POST['debPart']."')";
    if(mysqli_query($connect,$record)){
        echo " <br>insert into record table";    
}
}
$insertintodebittable="INSERT INTO accountingCyclea.".$_POST['debPart']." (debit) VALUES ('".$_POST['debitAmount']."')";
if(mysqli_query($connect,$insertintodebittable)){
    echo " insert into debit table";
}


$createTacountfordebit="CREATE TABLE accountingCyclea.".$_POST['credPart']." ( debit INT( 100 ) NULL, credit INT( 100 ) NULL )";
if(mysqli_query($connect,$createTacountfordebit)){
    echo " Create taccount credit table";

    $record2="INSERT INTO accountingCyclea.recordofitems (items) VALUES ('".$_POST['credPart']."')";
    if(mysqli_query($connect,$record2)){
        echo " <br>insert item2 into record table";    

    }
}
$insertintocredittable="INSERT INTO accountingCyclea.".$_POST['credPart']." (credit) VALUES ('".$_POST['creditAmount']."')";
if(mysqli_query($connect,$insertintocredittable)){
    echo " insert into credit table";
}


header("location:page2.php");

?>