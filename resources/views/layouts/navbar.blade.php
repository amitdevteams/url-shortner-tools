
<style>
    .navbar-nav li:hover > ul.dropdown-menu {
    display: block;
}
.dropdown-submenu {
    position:relative;
}
.dropdown-submenu>.dropdown-menu {
    top:0;
    left:10%;
    margin-top:-3px;
}

/* rotate caret on hover */
.dropdown-menu > li > a:hover:after {
    text-decoration: underline;
    transform: rotate(-90deg);
}
</style>

<nav class="navbar navbar-expand-lg navbar" style="background-color: #0b1320;">
    <div class="container-fluid">
        <a href="/"><img class="logos" src="../assets/images/wiz.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
            <ul class="navbar-nav topnav" style="margin-left: 244px;">
                <li class="nav-item">
                    <a class="nav-link active" href="https://www.wizbrand.com/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active"
                        href="https://www.wizbrand.com/orgslist">Organizations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active"
                        href="https://www.wizbrand.com/influencers">Influencer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active"
                        href="https://www.wizbrand.com/about-us">Aboutus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="https://www.wizbrand.com/tutorials/"
                        target="_blank">Tutorials</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="https://www.wizbrand.com/tools/">Tools</a>
                 </li>
                <li class="nav-item">
                    <a class="nav-link active" href="https://www.wizbrand.com/api/service">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="https://www.wizbrand.com/register">Register</a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link active" href="https://www.wizbrand.com/login">Login</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
