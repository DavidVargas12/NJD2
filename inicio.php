<?php include_once 'comprueba-session.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>NJD2-Restaurante</title>
        <link rel="stylesheet" type="text/css" href="estilos/style.css">
        <link rel="stylesheet" type="text/css" href="estilos/contactoStyle.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">﻿
    </head>
    <body>
        <div class="menu-responsive">
            <div class="headTit">NJD2 System</div>
            <nav class="navResponsive">
                <ul>
                    <li class="active"><a href="inicio.php">Inicio</a></li>
                    <li><a href="contacto.php">Contáctanos</a></li>
                </ul>
                <ul class="account">
                    <li><a href="" id="usuario"></a></li>
                    <li id="acceder"><a href="login.php">Acceder</a></li>
                    <li><a href="?destroy">Salir</a></li>
                </ul>
            </nav>
        </div>
        <nav class="navBarMenu">
            <h3 class="titulo">NJD2 System</h3>
            <ul>
                <li class="active"><a href="inicio.php">Inicio</a></li>
                <li><a href="contacto.php">Contáctanos</a></li>
            </ul>
            <ul class="account">
                <li><a href="" id="usuario"></a></li>
                <li id="acceder"><a href="login.php">Acceder</a></li>
                <li><a href="?destroy">Salir</a></li>
            </ul>
        </nav>

        <div class="contenedor">
            <div class="PanelHead">
                <h4>Premium Denim + Essentials. No Retail Markup.</h4>
                <p class="txtHead">We design + craft luxury-grade denim and essentials and refuse to work with department stores and retail middlemen, passing on the savings to you.</p>
            </div>

            <div class="PanelImagenes">
                <div class="women">
                    <a href="login.php"><img src="https://media.metrolatam.com/2019/01/17/gettyimages912175184170667a-7d88abc1ce5351d7acf668a8337fc62b-1200x800.jpg"></a>
                </div>
                <div class="men">
                    <a href="login.php"><img src="https://revistadiners.com.co/wp-content/uploads/2018/09/maria_luisa_postre_1200x800.jpg"></a>
                </div>
            </div>
            <!--RESPONSIVE NO HACER CASO -->
            <div class="imagenMobile">
                <div class="womenMobile">
                    <div class="panelMujer">
                        <a href="tienda.php">
                            <p>Platillos</p>
                        </a>
                    </div>
                    <a href="tienda.php"><img src="https://d4zpg1jklewne.cloudfront.net/steak/groups/home-image-left/feb-womens/original.jpg?1517875558" width="100%"></a>
                </div>
                <div class="menMobile">
                    <div class="panelHombre">
                        <a href="tienda.php">
                            <p>Postres</p>
                        </a>
                    </div>
                    <a href="tienda.php"><img src="https://revistadiners.com.co/wp-content/uploads/2018/09/maria_luisa_postre_1200x800.jpg" width="100%"></a>
                </div>
            </div>



            <!--END RESPONSIVE-->
            
                <div class="BlackPanel">
                    <div class="flex-wrapper">
                        <div class="panel1">
                            <div class="texto1">
                                <h3>Mision</h3>
                                <p>Last year, DSTLD became the first-ever fashion brand to launch a Reg A+ financing campaign. We raised over $1.7M from more than 1,700 investors, concentrated our efforts on growth, and most notably - our lifetime revenue by 194% in just 12 months - and are back for a second round.</p>

                            </div>
                        </div>

                        <div class="panel2">
                            <div class="texto2">
                                <h3>Vision</h3>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                <p>
                                    Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes</p>

                            </div>
                        </div>
                    </div>
                </div>
            





            <div>
                <div class="footer">
                    <br>

                    <div class="pie">
                        <br>
                        <a href="contacto.php">CONTACTO |</a>
                        <a href="https://www.facebook.com/"> FACEBOOK |</a>
                        <a href="https://www.instagram.com/">INSTAGRAM |</a>
                        <a href="https://twitter.com/?lang=es">TWITTER |</a>
                    </div>
                </div>
            </div>
            <!-- END RESPONSIVE -->

    </body>
</html>

