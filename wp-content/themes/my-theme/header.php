<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

</head>
<body <?php body_class(); ?>>
    <header>
        <div class="box-menu">
            <div class="logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" alt="<?php bloginfo('hospital'); ?>">
            </div>
            
            <div class="container-header">

                <div class="booking">
                    <button class="btn-book">
                            <a href="#">
                                <i class="far fa-calendar-check"></i>
                            </a>
                            <a href="/book-appointment/">Book an appointment</a>
                    </button>
                </div>

                <div class="sign-in">
                    <a href="/patient/">
                        <i class="fas fa-user-md"></i>                        
                    </a>
                    <a href="#">
                        <i class="fas fa-search"></i>
                    </a>
                </div>
                
            </div>

            </div> 

        </div>
         
        
        <nav>
            
            <?php wp_nav_menu(['theme_location'=>'primary', 
            'menu_class'     => 'menu',
            ]); ?>
              
        </nav> 

        
            
    
    </header>

   <main>