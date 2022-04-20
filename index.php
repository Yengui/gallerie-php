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

    <body>
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
            test
            <div class="custom-shape-divider-bottom-1650420115">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                </svg>
            </div>
        </section>
        <section class="top-designs">
            test2
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