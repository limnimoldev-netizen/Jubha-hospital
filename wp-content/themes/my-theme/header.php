<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

</head>
<body <?php body_class(); ?>>
    <header>
        <div class="container-header">
            <div class="logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" alt="<?php bloginfo('hospital'); ?>">
            </div>


            <div class="booking">
               <button class="btn-book">
                    <a href="#">Book an appointment</a>
               </button>

               <div class="sign-in" id"">
                <a href="#">
                    <i class="fas fa-user-md"></i>
                </a>
                </div>

            </div>

            

        </div>    
            
            <?php wp_nav_menu(['theme_location'=>'primary', 
            'menu_class'     => 'menu',
        
            ]); ?>
        </nav>
    </header>

   <main>


