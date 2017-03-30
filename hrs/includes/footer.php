<div class="clear">&nbsp;</div>
<!-- start footer -->
<div id="footer">
  <!--  start footer-left -->
  <div id="footer-left">&copy;2014   All rights reserved.</div>
  <!--  end footer-left -->
  <div class="clear">&nbsp;</div>
</div>
<!-- end footer -->
</body>
<script type="text/javascript">
function check_all(actionType)
{
	var length = document.getElementsByName("checkbox[]").length;
	var c_value = "";

	for (var i=1;i<=length;i++)
    {
		if (document.getElementById("checkbox"+i).checked==true)
      	{     
	  		c_value = c_value + document.getElementById("checkbox"+i).value + "\n";
	    }
    } 

	if(c_value!="")
	{
		if(actionType=='delete')
			var confirmMsg = "Are You sure, Do you want to delete selected records?";
		else if(actionType=='status')
			var confirmMsg = "Are You sure, Do you want to change status of selected records?";
		
		if(confirm(confirmMsg))
		{
			$('#multiType').val(actionType);
			$('#mainform').submit();
		}
	}
	else
	{
	   alert("Please check atleast one checkbox");
	   return false;
	   }
	}
	
function confirmDelete(delUrl)
{
	if (confirm("Are you sure you want to delete?"))
	{
		document.location = delUrl;
	}
}
</script>
<!------start colomm sorting-->
<script type="text/javascript">
var sortedOn = 0;

function SortTable(sortOn) {

var table = document.getElementById('product-table');
var tbody = table.getElementsByTagName('tbody')[0];
var rows = tbody.getElementsByTagName('tr');

var rowArray = new Array();
for (var i=0, length=rows.length; i<length; i++) {
rowArray[i] = new Object;
rowArray[i].oldIndex = i;
rowArray[i].value = rows[i].getElementsByTagName('td')[sortOn].firstChild.nodeValue;
}

if (sortOn == sortedOn) { rowArray.reverse(); }
else {
sortedOn = sortOn;

if (sortedOn == 0) {
rowArray.sort(RowCompareNumbers);
}
else {
rowArray.sort(RowCompare);
}
}

var newTbody = document.createElement('tbody');
for (var i=0, length=rowArray.length ; i<length; i++) {
newTbody.appendChild(rows[rowArray[i].oldIndex].cloneNode(true));
}

table.replaceChild(newTbody, tbody);
}

function RowCompare(a, b) { 

var aVal = a.value;
var bVal = b.value;
return (aVal == bVal ? 0 : (aVal > bVal ? 1 : -1));
}
// Compare number
function RowCompareNumbers(a, b) {

var aVal = parseInt( a.value);
var bVal = parseInt(b.value);
return (aVal - bVal);
}
// compare currency
function RowCompareDollars(a, b) {

var aVal = parseFloat(a.value.substr(1));
var bVal = parseFloat(b.value.substr(1));
return (aVal - bVal);
}
</script>
<!------end colomm sorting-->
</html>