    <header class="site-header">
        @include('template.header')            
    </header><!-- .site-header -->
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
    
<script type='text/javascript' src="{{ asset('js/jquery.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/swiper.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/jquery.collapsible.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/custom.js') }}" ></script>
@stack('scripts')
