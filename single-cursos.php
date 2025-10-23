<?php

/**
 * The template for displaying all cursos post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kraftiart
 */

get_header();
?>
 
<main id="primary" class="site-main">
    <div class="container mt-5">
         <!-- Fila del curso -->
            <div class="row">
                <!-- Columna de información del curso -->
                <div class="col-md-8">
                    <div class="bg-dark text-white p-3">
                        <h2>C++ Fundamentals: Game Programming For
                            Beginners</h2>
                        <p>Learn to make games using industry standard C++ and
                            Raylib</p>
                        <!-- Más datos del curso aquí -->
                    </div>
                    <!-- Sección de 'Lo que aprenderás' -->
                    <div class="p-3">
                        <h3>Lo que aprenderás</h3>
                        <ul>
                            <li>How to write games in C++ from scratch</li>
                            <li>Programming fundamentals</li>
                            <!-- Más puntos aquí -->
                        </ul>
                    </div>
                    <!-- Requisitos del curso -->
                    <div class="p-3">
                        <h3>Requisitos</h3>
                        <ul>
                            <li>Comfortable installing new software</li>
                            <li>Excited to learn programming :)</li>
                        </ul>
                    </div>
                    <!-- Descripción del curso -->
                    <div class="p-3">
                        <h3>Descripción</h3>
                        <p>
                            Learning to program can be dull, and learning C++ is
                            hard enough without having to learn a game engine as
                            well.

                            In this course we teach you coding the fun way, by
                            making games! And we'll be using a library so you
                            can focus on learning pure C++ and good programming
                            practice.

                            You'll start by compiling your first program in C++,
                            using Visual Studio Code as your text editor.

                            Then create your first axe dodging game using the
                            Raylib library. This project introduces the basic
                            concepts of programming: variables, loops and
                            if-statements.

                            You expand on this in Dapper Dasher, by building a
                            side-scrolling running game. In addition to covering
                            essential programming concepts such as structs and
                            functions, you'll learn to animate 2D characters and
                            make your game pretty.

                            In Classy Clash we introduce Object Oriented
                            Programming. You'll learn how this simplifies
                            programming for games and how inheritance can avoid
                            code duplication.

                            Whether you're a total beginner to programming and
                            want to learn pure C++, or an intermediate Unreal
                            student who wants to explore making games in pure
                            C++, this is the course for you!
                        </p>
                    </div>
                </div>

                <!-- Columna de imagen y compra del curso -->
                <div class="col-md-4">
                    <div class="elementor-column elementor-col-33 elementor-top-column elementor-element" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-widget-Banner" data-element_type="widget" data-widget_type="Banner.default">
                        <div class="elementor-widget-container">
                            <div class="tt-banner">
                                <a href="<?php the_permalink(); ?>" class="banner-image">
                                    <img src="https://via.placeholder.com/800x600"
                        alt="Imagen del curso" class="img-fluid mb-3">
                                </a>
                                <div class="banner-text tt-icon-bottom text-center">
                                    <div class="wpbanner-content">
                                        <div class="banner-sub-title"></div>
                                        <div class="banner-title text-light"></div>
                                        <div class="button-banner-wrap ">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <img src="https://via.placeholder.com/800x600"
                        alt="Imagen del curso" class="img-fluid mb-3">

                    <div class="bg-primary text-white p-3 mb-3">
                        <h3 class="text-center">S/ 229.90</h3>
                        <button class="btn btn-light btn-block">Añadir a la
                            cestassadasdfasfasf</button>
                        
                    </div>
                    <!-- Sección de 'Este curso incluye' -->
                    <div class="p-3">
                        <h3>Este curso incluye:</h3>
                        <ul>
                            <li>11 horas de video bajo demanda</li>
                            <li>2 artículos</li>
                            <li>11 horas de video bajo demanda</li>
                            <li>2 artículos</li>
                            <li>11 horas de video bajo demanda</li>
                            <li>2 artículos</li>
                            <li>11 horas de video bajo demanda</li>
                            <li>2 artículos</li>
                            <li>11 horas de video bajo demanda</li>
                            <li>2 artículos</li>
                            <li>11 horas de video bajo demanda</li>
                            <li>2 artículos</li>
                            <li>11 horas de video bajo demanda</li>
                            <li>2 artículos</li>

                            <!-- Más características aquí -->
                        </ul>
                    </div>
                </div>
            </div>
    </div>
</main><!-- #main -->

<?php
get_footer();
