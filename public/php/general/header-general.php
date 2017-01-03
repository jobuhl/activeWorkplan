
<header>
    <ul class="left-list" id="id-left">
        <li class="nav-image">
            <a href="index.php">
                <img class="nav-logo" src="../../img/imagelogo.gif" alt="Logo">
            </a>
        </li>
        <li class="nav-placeholder">
            <a id="nav-placeholder-text">Home</a>
        </li>
        <li class="nav-toggle">
            <a href="javascript:void(0);" onclick="toggleMakeResponsive()">&#9776;</a>
        </li>
    </ul>
    <ul class="right-list" id="id-right">
        <li><a id="index" href="index.php">Home</a></li>
        <li><a id="features" href="features.php">Features</a></li>
        <li><a data-toggle="modal" data-target="#signinbutton">Sign In</a></li>
        <li><a data-toggle="modal" data-target="#signupbutton" onclick="nextStep(1)">Sign Up</a></li>
    </ul>
</header>

<section class="space-under-header">
    <h2 class="modal-ueberschrift" style="display: none">fakeheading</h2>
</section>
<!--End Header -->

<!--Import von den SignUp und SignIn Felder -->
<?php
include '../general/modal-genral.php'
?>