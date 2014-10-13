<!DOCTYPE html>
<html>
    <head>
        <title>@yield('site-title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Bootstrap -->
        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::style('css/bootstrap-theme.min.css') }}
        {{ HTML::script('js/bootstrap.min.js') }}

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

        <!--[if IE]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Main Stylesheet File -->
        {{ HTML::style('css/style.css') }}

        <!-- Import Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,500' rel='stylesheet' type='text/css'>
    </head>

    <body>
        <div class="structure-container">
            <div class="header-container">
                <div class="main-content-centered">
                    
                    <div class="logo-container">
                        @yield('link-top-left')
                    </div>
                    <div class="link-top-container">
                      
                        
                                           
                        @yield('link-top-right')
                        <div class="clear"></div>
                       
                    </div>
                    <div class="clear"></div>

                </div>
            </div>
        
            <div class="content-container">
                <div class="main-content-centered">
                   
                    @yield('content')
                   
                </div>
            </div>

            <div class="footer-container">
                <div class="main-content-centered">
                    <h6>&copy; 2014 Copyright Twitter Clone | Powered by Mayon Volcano Software Ltd.</h6>
                </div>
            </div>
        </div>
    </body>
</html>

      