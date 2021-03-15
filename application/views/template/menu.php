<?php

function active($item, $uri) {
    return $uri->segment(1) == $item? 'class="active"' : null;
}
?>
<!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top">
<div class="container">
    <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
        <li <?=active('', $this->uri)?>><a href="/codeigniterapp/index.php">Home</a></li>
        <li <?=active('clientes', $this->uri)?>><a href="/codeigniterapp/index.php/clientes">Clientes</a></li>
        <li <?=active('produtos', $this->uri)?>><a href="/codeigniterapp/index.php/produtos">Produtos</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
        <li><a href="/codeigniterapp/index.php/login/deslogar">Logout</a></li>
    </ul>
    </div><!--/.nav-collapse -->
</div>
</nav>


<div class="container">