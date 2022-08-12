<link rel="stylesheet" href="../../../css/admin/login.css" type="text/css"/>
<link rel="script" href="../../../js/admin/loginPortal/login.js" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="loginBackground">
    <form id="loginForm" action="inloggen.php" method="post" class="loginDiv">
    <div class="loginTitle">Inlogportaal</div>
        <div class="inputContainer">
      <div class="usernameTitle">Gebruikersnaam</div>
      <input id="usernameInput" class="loginInput" type="text" name="username">
    </div>
        <div class="inputContainer">
            <div class="usernameTitle">Wachtwoord</div>
            <input id="passwordInput" class="loginInput" type="password" name="password">
        </div>
        <button id="inlogButton" href="inloggen.php" type="button" class="loginButton">Log in</button>
        <div class="sarwareTagContainer">
            <div class="sarwareTag">
                Powered by Sarware
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function (){
        $( "#inlogButton" ).click(function() {
            if (!$("#usernameInput").val()||!$("#passwordInput").val()){
                alert("Voer alstublieft een gebruikersnaam en wachtwoord in")
            }else {
                $( "#loginForm" ).submit();

            }

        });

    })
</script>