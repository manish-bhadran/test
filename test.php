<!DOCTYPE html>
<html>
<body>

<h1>The XMLHttpRequest Object</h1>

<h3>Start typing a name in the input field below:</h3>

<form action=""> 
First name: <input type="text" id="txt1" onkeyup="showHint(this.value)">
</form>

<h3>Suggestions: </h3>
  <p id="txtHint"></p> 

<script>
function showHint(str) {
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "gethint.php?q="+str, true);
  xhttp.send();   
}
</script>

</body>
</html>

file2

<?php
// Array with names
$a[] = "Asha";
$a[] = "Bala Murli";
$a[] = "Chandana";
$a[] = "Denver";
$a[] = "Bhupesh";
$a[] = "Faisal";
$a[] = "Manish";
$a[] = "Hemshanker";
$a[] = "Karthik";
$a[] = "Shiva";
$a[] = "Mahesh";
$a[] = "Anu";
$a[] = "Dilip";
$a[] = "Ranjith";
$a[] = "Shreya";
$a[] = "Aarushi";
$a[] = "Nalina";
$a[] = "Anusha";
$a[] = "Akash";
$a[] = "Rohan";
$a[] = "Saurabh";
$a[] = "Manjunath";
$a[] = "Pruthvi";
$a[] = "Yogi";
$a[] = "Yeshu";
$a[] = "Raushan";
$a[] = "Jani";
$a[] = "Kavya";
$a[] = "Negi";
$a[] = "Pavithra";
// get the q parameter from URL
$q = $_REQUEST["q"];
$hint = "";
// lookup all hints from array if $q is different from "" 
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = $name;
      } else {
        $hint .= "<li> $name</li>";
      }
    }
  }
}
// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;
?>

xml

<!DOCTYPE html>
<html>

<body>
  <h2>Updates the element "demo" with the HTML table built by extracting XML data.</h2>
<button type="button" onclick="loadXMLDoc()">Featch XML FIle data in HTML Table</button>
<br><br>
<table id="demo" border="1"><tr><td>Demo</td></tr></table>


<script>
function loadXMLDoc() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      myFunction(this);
    }
  };
  xmlhttp.open("GET", "cd_catalog.xml", true);
  xmlhttp.send();
}
function myFunction(xml) {
  var i;
  var xmlDoc = xml.responseXML;
  var table="<tr><th>Artist</th><th>Title</th></tr>";
  var x = xmlDoc.getElementsByTagName("CD");
  for (i = 0; i <x.length; i++) { 
    table += "<tr><td>" +
    x[i].getElementsByTagName("ARTIST")[0].childNodes[0].nodeValue +
    "</td><td>" +
    x[i].getElementsByTagName("TITLE")[0].childNodes[0].nodeValue +
    "</td></tr>";
  }
  document.getElementById("demo").innerHTML = table;
}
</script>

</body>
</html>

xml
<html>
<head><title>Answer 4</title></head>
<body>
<h2>XML document FoodMenu.xml fetch the calories of French Toast and display it to the user using AJAX</h2>
<div id='showfood'></div>

<script>
displayfood(3);
function displayfood(i) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      myFunction(this, i);
    }
  };
  xmlhttp.open("GET", "FoodMenu.xml", true);
  xmlhttp.send();
}
function myFunction(xml, i) {
  var xmlDoc = xml.responseXML; 
  x = xmlDoc.getElementsByTagName("food");
  document.getElementById("showfood").innerHTML =
  "NAME: " +
  x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue +
  "<br>PRICE: " +
  x[i].getElementsByTagName("price")[0].childNodes[0].nodeValue +
  "<br>DESCRIPTION: " + 
  x[i].getElementsByTagName("description")[0].childNodes[0].nodeValue +
  "<br>CALORIES: " + 
  x[i].getElementsByTagName("calories")[0].childNodes[0].nodeValue;
}
</script>

</body>
</html>

POST

<html>
<body>

<h1>AJAX XMLHttpRequest USING POST METHOD</h1>

<button type="button" onclick="display()">CLICK HERE TO DISPLAY </button>

<p id="demo"></p>
 
<script>
function display() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "ans22.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("fname=Manish&lname=Bhadran");
}
</script>

</body>
</html>

GET

<!DOCTYPE html>
<html>
<body>

<h1>AJAX XMLHttpRequest USWING GET METHOD</h1>

<button type="button" onclick="loadDoc()">CLICK HERE TO DISPLAY</button>

<p id="demo"></p>

<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "ans2.php?fname=Manish&lname=Bhadran", true);
  xhttp.send();
}
</script>
 
</body>
</html>

php xml

<!DOCTYPE html>
<html>
<head><title>Q11</title></head>

<body>
<h4>PHP program that prints the XML fourth guest in the list by accessing it directly instead of using  the tree structure</h4>
<?php
$xml=simplexml_load_file("book.xml") or die("Error: Cannot create object");
echo $xml->book[3]->title . "<br>";
echo $xml->book[3]->author;
?> 

</body>
</html>

file text

<!DOCTYPE html>
<html>
<body>

<div id="demo">
<h1>The XMLHttpRequest Object</h1>
<button type="button" onclick="loadDoc()">Change Content</button>
</div>
<P id="demo">Manish</P>
<script>
function  loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) 
    {
      document.getElementById("demo").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "pink.txt", true);
  xhttp.send();
}
</script>

</body>
</html>
GET & POST
<?php 
echo "Hello ".$_GET["fname"]." ".$_GET["lname"];
 ?>