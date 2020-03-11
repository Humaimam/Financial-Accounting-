<?php
echo "<form method=POST action='database.php'>
<label>Transaction</label>
<textarea rows=2 cols=50 name=transac placeholder=transaction></textarea><br/>
</br>
<label>Date of transaction</label>
<input type=text name=date placeholder=dd/mm/yy><br/>
</br>
<label>Debit Particulars</label>
<input type=text name=debPart >

<label>Select Nature</Label>
<select name=nature>
<option type=hidden>Nature</option>
<option>Assets</option>
<option>Liabilities</option>
<option>Expense</option>
<option>Capital</option>
<option>Revenues</option>
</select>
<label>Debit Amount</label>
<input type=text name=debitAmount placeholder=0><br/>
</br>
<label>Credit Particulars</label>
<input type=text name=credPart>
<label>Select Nature</Label>
<select name=nature>
<option type=hidden>Nature</option>
<option>Assets</option>
<option>Liabilities</option>
<option>Expense</option>
<option>Capital</option>
<option>Revenues</option>
</select>
<label>Credit Amount</label>
<input type=text name=creditAmount placeholder=0></input><br/>
<input type=submit>
</form>"

?>