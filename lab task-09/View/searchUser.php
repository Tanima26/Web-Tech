
<!DOCTYPE html>
<html>
<script>
function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "gethint.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
  <body>
<?php 
    include "nav.php";

?>
    <!-- [SEARCH FORM] -->
    <form method="post" action="../Control/findUser.php">
      <h1>Search Discounted Customers</h1>
      <input type="text" name="user_name" onkeyup="showHint(this.value)"/>
      <input type="submit" name="findUser" value="Search"/>
    </form>
    <p>Suggestions: <span id="txtHint"></span></p>

 
  </body>
</html>