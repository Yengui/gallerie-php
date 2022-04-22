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
        <script src="./scripts/script.js"></script>
        <title>Ma Gallerie</title>
    </head>

    <body onload="javascript:controle()">
        <!--
        testtt
        <div>
            <?php
            $utilisateurs = $maDb_connexion->query("SELECT * FROM gallerie.utilisateurs")->fetchAll();
            foreach ($utilisateurs as $ligne) {
                echo "<div>" . $ligne['prenom'] . "</div>";
            }
            ?>
        </div>
        -->
        <div class="navbarcontainer">
            <div class="logo">Ma <span>Gallerie</span></div>
            <div class="navbar1">
                <div class="nav-btn">accueil</div>
                <div class="nav-btn">designs</div>
                <div class="nav-btn">à propos</div>
                <div class="nav-btn">contacter</div>
            </div>
            <div class="navbar2">
                <div class="connecter">se connecter</div>
                <div class="inscription">s'inscrire</div>
            </div>
        </div>
        <section class="main">
            <div class="maincontent">
                <div class="maindiv">
                    <span>Bienvenue dans<br />Ma Gallerie!</span>
                    <p>La première gallerie tunisienne<br /> de design graphique</p>
                </div>
                <div class="maindiv">
                    <img height="480px" width="640px" src="./images/mainpic.svg" alt="main illustration">
                </div>
            </div>
            <div class="custom-shape-divider-bottom-1650420115">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                </svg>
            </div>
        </section>
        <section class="top-designs">
            <h1>Meilleurs designs du mois!</h1>
            <div class="meilleur-container">
                <div class="carte">
                    <img class="carte-img" src="https://images.pexels.com/photos/889839/pexels-photo-889839.jpeg" alt="design 1">
                    <div class="carte-partie2">
                        <div class="img-info">
                            <div class="img-titre">Dessin sur bois</div>
                            <div class="img-description">Dessin moderne d'une femme sur bois utilisant les couleurs marron et bleu</div>
                        </div>
                        <div class="utilisateur-info">
                            <img class="utilisateur-carte" src="https://images.pexels.com/photos/846741/pexels-photo-846741.jpeg" alt="utilisateur 1">
                            <div><a href="./profile/1">Ahmad Yengui</a></div>
                        </div>
                    </div>
                </div>
                <div class="carte">
                    <img class="carte-img" src="https://images.pexels.com/photos/1690351/pexels-photo-1690351.jpeg" alt="design 2">
                    <div class="carte-partie2">
                        <div class="img-info">
                            <div class="img-titre">Tableau artistique</div>
                            <div class="img-description">Tableau artistique utilisant la peinture noire, bleu et jaune test test test test test test test test test test test test test test test test test test test test test test testtest test test test test test test test test test test test test test test test </div>
                        </div>
                        <div class="utilisateur-info">
                            <img class="utilisateur-carte" src="https://images.pexels.com/photos/846741/pexels-photo-846741.jpeg" alt="utilisateur 1">
                            <div><a href="./profile/1">Ahmad Yengui</a></div>
                        </div>
                    </div>
                </div>
                <div class="carte">
                    <img class="carte-img" src="https://images.pexels.com/photos/1477166/pexels-photo-1477166.jpeg" alt="design 3">
                    <div class="carte-partie2">
                        <div class="img-info">
                            <div class="img-titre">Fleurs!</div>
                            <div class="img-description">Image de fleurs</div>
                        </div>
                        <div class="utilisateur-info">
                            <img class="utilisateur-carte" src="https://images.pexels.com/photos/846741/pexels-photo-846741.jpeg" alt="utilisateur 1">
                            <div><a href="./profile/1">Ahmad Yengui</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="voir-designs">

            test3
        </section>
        <section class="top-designs">
            test2
        </section>
        <section class="footer">
            <div class="custom-shape-divider-top-1650420830">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                </svg>
            </div>
            testtt
        </section>
    </body>

    </html>