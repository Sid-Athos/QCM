<div class="topnav" id="myTopnav">
<?php if(isset($_SESSION['pic'])){?><img src="<?php echo $_SESSION['pic'];?>" style="float:left;width:55px;height:53px;opacity: 0.75;filter: alpha(opacity=50)"><?php } ?>
<p style="float:right">Bonjour <?php echo $_SESSION['pseudo'];?> Il est <span id="txt"></span></p>
  <a href="./index.php?page=lobby" class="active"> Gestion des QCM </a>
  <a href="./index.php?page=account"> Mon compte </a>
  <a href="./index.php?page=ladder"> Palmarès </a>
  <a href="./index.php?page=logout">Déconnexion</a>    
</div>
<div id="answer">
</div>

<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    h = checkTime(h);
    m = checkTime(m);
    document.getElementById('txt').innerHTML =
    h + ":" + m;
    var t = setTimeout(startTime, 500);
}
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10 because I'm fancy
        return i;
    }
</script>