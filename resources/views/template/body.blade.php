    <header class="site-header">
        @include('template.header')            
    </header><!-- .site-header -->

    <div class="icon-boxes">
        <div class="container-fluid">
            <div class="flex flex-wrap align-items-stretch">
                <div class="icon-box">
                    <div class="icon">
                        <span class="ti-user"></span>
                    </div><!-- .icon -->

                    <header class="entry-header">
                        <h2 class="entry-title">Manter Professores</h2>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <p>Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer read-more">
                        <a href="#">read more<i class="fa fa-long-arrow-right"></i></a>
                    </footer><!-- .entry-footer -->
                </div><!-- .icon-box -->

                <div class="icon-box">
                    <div class="icon">
                        <span class="ti-folder"></span>
                    </div><!-- .icon -->

                    <header class="entry-header">
                        <h2 class="entry-title">Manter Alunos</h2>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <p>Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer read-more">
                        <a href="#">read more<i class="fa fa-long-arrow-right"></i></a>
                    </footer><!-- .entry-footer -->
                </div><!-- .icon-box -->

                <div class="icon-box">
                    <div class="icon">
                        <span class="ti-book"></span>
                    </div><!-- .icon -->

                    <header class="entry-header">
                        <h2 class="entry-title">Disciplinas e Turmas</h2>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <p>Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer read-more">
                        <a href="#">read more<i class="fa fa-long-arrow-right"></i></a>
                    </footer><!-- .entry-footer -->
                </div><!-- .icon-box -->

                <div class="icon-box">
                    <div class="icon">
                        <span class="ti-settings"></span>
                    </div><!-- .icon -->

                    <header class="entry-header">
                        <h2 class="entry-title">Configurações</h2>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <p>Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer read-more">
                        <a href="#">read more<i class="fa fa-long-arrow-right"></i></a>
                    </footer><!-- .entry-footer -->
                </div><!-- .icon-box -->
            </div><!-- .row -->
        </div><!-- .container-fluid -->
    </div><!-- .icon-boxes -->

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
