    <header class="site-header">
        @include('template.header')            
    </header><!-- .site-header -->''

        @yield('conteudo-principal')
    <div class="clients-logo">
        <div class="container">
            <div class="row">
                <div class="col-12 flex flex-wrap justify-content-center justify-content-lg-between align-items-center">
                    <div class="logo-wrap">
                        <img src="{{ asset('images/logo-1.png') }}" alt="">
                    </div><!-- .logo-wrap -->

                    <div class="logo-wrap">
                        <img src="{{ asset('images/logo-2.png') }}" alt="">
                    </div><!-- .logo-wrap -->

                    <div class="logo-wrap">
                        <img src="{{ asset('images/logo-3.png') }}" alt="">
                    </div><!-- .logo-wrap -->

                    <div class="logo-wrap">
                        <img src="{{ asset('images/logo-4.png') }}" alt="">
                    </div><!-- .logo-wrap -->

                    <div class="logo-wrap">
                        <img src="{{ asset('images/logo-5.png') }}" alt="">
                    </div><!-- .logo-wrap -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .clients-logo -->

    <footer class="site-footer">
        @include('template.footer')
    </footer><!-- .site-footer -->
    
<!--<script type='text/javascript' src="{{ asset('js/jquery.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/swiper.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/jquery.collapsible.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/custom.js') }}" ></script> -->
<script src="{{ asset('js/jquery-3.3.1.js') }}"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('js/jquery.sticky.js') }}"></script>
<script src="{{ asset('js/parallax.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>  
<script src="{{ asset('js/waypoints.min.js') }}"></script>
<script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/requisicao.js') }}"></script>
@stack('scripts')
