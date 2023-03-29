<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php
        include 'php/head.php';
        ?>
        <style>
            details{
                font-size: 4em;
                padding-left: 3%;
                padding-top: 3%;
                cursor: pointer;
            }
            summary{
                text-align: center;
                text-decoration: underline;
            }
        </style>
        <title>Ferretería Juárez - Nosotros</title>
    </head>
    <body>
        <?php
        include 'php/header.php';
        include 'php/navs_user.php';
        ?>
        <main>
            <details open>
                <summary>¿Quiénes somos?</summary>
                <p>
                    Somos una empresa vendedora de todo tipo de herramientas ferreteras
                    así como de una gran variedad de materiales de construcción. Ofrecemos
                    la mejor calidad en productos que tú mismo puedes comprobar.
                </p>
            </details>
            <details open>
                <summary>Objetivo</summary>
                <p>
                    Ofrecer la mejor calidad de nuestros productos y el mejor trato a
                    nuestros clientes que confían en nosotros. Así como traer nuevos y novedosas
                    herramientas y materiales que aseguren su confianza en nosotros.
                </p>
            </details>
            <details open>
                <summary>Misión</summary>
                <p>
                    Cumplir con los estándares calidad para materiales y herramientas
                    que ofrecemos, y al mismo tiempo ser parte de del crecimiento urbano
                    gracias a la calidad de nuestros productos.
                </p>
            </details>
            <details open>
                <summary>Visión</summary>
                <p>
                    Ser la ferretería que ofrezca los productos de mejor calidad y hacer eco
                    de nuestra existencia a través de las personas.
                </p>
            </details>
        </main>
        <?php
        include 'php/footer.php';
        ?>
    </body>
</html>