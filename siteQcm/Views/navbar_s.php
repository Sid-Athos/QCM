<div class="topnav" id="myTopnav">
<?php if(isset($_SESSION['pic']) && $_SESSION['pic'] !== ""){?><img src="<?php echo $_SESSION['pic'];?>" style="width:50px;height:50px;border-radius:50%;opacity: 0.75;filter: alpha(opacity=50)"><?php } ?>
Bonjour <?php echo $_SESSION['pseudo'];?> Il est <span id="txt"></span>
  <a href="./index.php?page=lobby" class="active"> Accueil </a>
  <a href="./index.php?page=account"> Mon compte </a>
  <a href="./index.php?page=notes"> Mes notes </a>
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