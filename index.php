    <?php
    class ConnexionBD
    {
        private static $_dbname = "gallerie";
        private static $_user = "root";
        private static $_pwd = "";
        private static $_host = "localhost";
        private static $_bdd = null;
        private function __construct()
        {
            try {
                self::$_bdd = new PDO("mysql:host=" . self::$_host . ";dbname=" . self::$_dbname . ";charset=utf8", self::$_user, self::$_pwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
            } catch (PDOException $e) {
                die('Erreur : ' . $e->getMessage());
            }
        }
        public static function getInstance()
        {
            if (!self::$_bdd) {
                new ConnexionBD();
                return (self::$_bdd);
            }
            return (self::$_bdd);
        }
    }
    $maDb_connexion = ConnexionBD::getInstance();
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./styles/styles.css">
        <link rel="stylesheet" href="./styles/wave.css">
        <script src="https://kit.fontawesome.com/460debd51d.js" crossorigin="anonymous"></script>
        <title>Ma Gallerie</title>
    </head>

    <body onload="javascript:controle()">
        <div class="navbarcontainer">
            <div class="logo">Ma <span>Gallerie</span></div>
            <div class="navbar1">
                <div class="nav-btn"><a href="./#">accueil</a></div>
                <div class="nav-btn"><a href="./gallerie.php">gallerie</a></div>
                <div class="nav-btn"><a href="./#meilleurs">meilleurs</a></div>
                <div class="nav-btn"><a href="./#temoignages">temoignages</a></div>
            </div>
            <div class="navbar2">
                <a href="./login.php">
                    <div class="connecter">se connecter</div>
                </a>
                <a href="./signup.php">
                    <div class="inscription">s'inscrire</div>
                </a>
            </div>
        </div>
        <section class="main">
            <div class="maincontent">
                <div class="maindiv">
                    <span>Bienvenue dans<br /><span class="maintitle">Ma Gallerie!</span></span>
                    <p>La première gallerie tunisienne<br />destinée pour les artistes</p>
                </div>
                <div class="maindiv">
                    <img height="447px" width="558px" src="./images/mainpic.png" alt="main illustration">
                </div>
            </div>
            <div class="custom-shape-divider-bottom-1650420115" id="meilleurs">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                </svg>
            </div>
        </section>
        <section class="top-designs">
            <h1>Meilleurs postes du mois</h1>
            <div class="ligne1"></div>
            <div class="ligne2"></div>
            <div class="meilleur-container">
                <div class="carte">
                    <img class="carte-img" src="https://images.pexels.com/photos/889839/pexels-photo-889839.jpeg?width=300" alt="design 1">
                    <div class="carte-partie2">
                        <div class="img-info">
                            <div class="img-titre"><a href="./post.php?id=1">Dessin sur bois</a></div>
                            <div class="img-description">Dessin moderne d'une femme sur bois utilisant les couleurs marron et bleu</div>
                        </div>
                        <div class="utilisateur-info">
                            <img class="utilisateur-carte" src="https://images.pexels.com/photos/846741/pexels-photo-846741.jpeg?width=100" alt="utilisateur 1">
                            <div><a href="./profile.php?id=1">Ahmad Yengui</a></div>
                        </div>
                    </div>
                </div>
                <div class="carte">
                    <img class="carte-img" src="https://images.pexels.com/photos/1690351/pexels-photo-1690351.jpeg?width=300" alt="design 2">
                    <div class="carte-partie2">
                        <div class="img-info">
                            <div class="img-titre"><a href="./post.php?id=2">Tableau artistique</a></div>
                            <div class="img-description">Tableau artistique utilisant la peinture noire, bleu et jaune test test test test test test test test test test test test test test test test test test test test test test testtest test test test test test test test test test test test test test test test </div>
                        </div>
                        <div class="utilisateur-info">
                            <img class="utilisateur-carte" src="https://images.pexels.com/photos/846741/pexels-photo-846741.jpeg?width=100" alt="utilisateur 1">
                            <div><a href="./profile.php?id=1">Ahmad Yengui</a></div>
                        </div>
                    </div>
                </div>
                <div class="carte">
                    <img class="carte-img" src="https://images.pexels.com/photos/1477166/pexels-photo-1477166.jpeg?width=300" alt="design 3">
                    <div class="carte-partie2">
                        <div class="img-info">
                            <div class="img-titre"><a href="./post.php?id=3">Fleurs!</a></div>
                            <div class="img-description">Image de fleurs</div>
                        </div>
                        <div class="utilisateur-info">
                            <img class="utilisateur-carte" src="https://images.pexels.com/photos/846741/pexels-photo-846741.jpeg?width=100" alt="utilisateur 1">
                            <div><a href="./profile.php?id=1">Ahmad Yengui</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="stats">
            <div class="custom-shape-divider-top-1651291660">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                </svg>
            </div>
            <h1>Statistiques</h1>
            <div class="ligne1"></div>
            <div class="ligne2"></div>
            <div class="statsflex">
                <div class="statsflexelement">
                    <div class="statsicon"><img src="./images/newspaper.png" height="100px" width="100px" alt="utilisateurs"></div>
                    <div class="statstext">
                        <h2>1234</h2>
                        <h4>utilisateurs</h4>
                    </div>
                </div>
                <div class="statsflexelement">
                    <div class="statsicon"><img src="./images/canvas.png" height="100px" width="100px" alt="utilisateurs"></div>
                    <div class="statstext">
                        <h2>5642</h2>
                        <h4>publications</h4>
                    </div>
                </div>
                <div class="statsflexelement">
                    <div class="statsicon"><img src="./images/positive-vote.png" height="100px" width="100px" alt="utilisateurs"></div>
                    <div class="statstext">
                        <h2>36521</h2>
                        <h4>réactions</h4>
                    </div>
                </div>
            </div>
            <div class="custom-shape-divider-bottom-1651292916" id="temoignages">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                </svg>
            </div>
        </section>
        <section class="temoignages">
            <h1>Témoignages</h1>
            <div class="ligne1"></div>
            <div class="ligne2"></div>
            <div class="temContainer">

                <div class="temCarte">
                    <img id="temQuote1" src="./images/quote.svg" alt="quote mark">
                    <img id="temImg" src="https://images.pexels.com/photos/846741/pexels-photo-846741.jpeg?width=200" alt="utilisateur1">
                    <h2>Ahmad Yengui</h2>
                    <p>Je peux dire que c'est le meilleur site pour les artistes Tunisiens</p>
                    <img id="temQuote2" src="./images/quote.svg" alt="quote mark">
                </div>

                <div class="temCarte">
                    <img id="temQuote1" src="./images/quote.svg" alt="quote mark">
                    <img id="temImg" src="https://images.pexels.com/photos/846741/pexels-photo-846741.jpeg?width=200" alt="utilisateur1">
                    <h2>Ahmad Yengui</h2>
                    <p>Je peux dire que c'est le meilleur site pour les artistes Tunisiens</p>
                    <img id="temQuote2" src="./images/quote.svg" alt="quote mark">
                </div>

                <div class="temCarte">
                    <img id="temQuote1" src="./images/quote.svg" alt="quote mark">
                    <img id="temImg" src="https://images.pexels.com/photos/846741/pexels-photo-846741.jpeg?width=200" alt="utilisateur1">
                    <h2>Ahmad Yengui</h2>
                    <p>Je peux dire que c'est le meilleur site pour les artistes Tunisiens</p>
                    <img id="temQuote2" src="./images/quote.svg" alt="quote mark">
                </div>

            </div>
        </section>
        <section class="footer">
            <div class="custom-shape-divider-top-1650420830">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                </svg>
            </div>
            <div class="flexfooterhorizontal">
                <div class="flexfooter">
                    <div>
                        <h1>Ma <span>Gallerie</span></h1>
                    </div>
                    <div class="fsocials">
                        <a target="_blank" href="http://facebook.com/">
                            <div class="fsocial"><i class="fa fa-facebook"></i></div>
                        </a>

                        <a target="_blank" href="http://instagram.com/">
                            <div class="fsocial"><i class="fa fa-instagram"></i></div>
                        </a>

                        <a target="_blank" href="http://whatsapp.com/">
                            <div class="fsocial"><i class="fa fa-whatsapp"></i></div>
                        </a>

                    </div>
                    <div class="contactinfo">
                        <div><i class="fa fa-phone"></i> +216 22 222 222</div>
                        <div><i class="fa fa-at"></i> email@email.com</div>
                    </div>
                </div>
                <img class="footerimg" src="./images/footericon.png" alt="art">
            </div>
        </section>
        <script src="./scripts/script.js"></script>
    </body>

    </html>