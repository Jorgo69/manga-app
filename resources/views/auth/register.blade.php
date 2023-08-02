<x-guest-layout>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Accueil</a>                    
                    <span></span> Inscription
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3 class="mb-30">{{ __('Creer un Compte') }}</h3>
                                        </div>                                        
                                        <form method="post" action="{{ route('register')}}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" required="" name="pseudo" placeholder="Nom" :value="old('pseudo')" autofocus autocomplete="pseudo">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" required="" name="email" placeholder="Email" :value="old('email')" autofocus autocomplete="email">
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="password" name="password" placeholder="Mot de Passe" autocomplete="new-password">
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="password" name="password_confirmation" placeholder="Confirmation Passe" autocomplete="new-password">
                                            </div>
                                            <div class="login_footer form-group">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox12" value="">
                                                        <label class="form-check-label" for="exampleCheckbox12"><span>J'accepte les termers &amp; condition d'utilisation.</span></label>
                                                    </div>
                                                </div>
                                                <a href="privacy-policy.html"><i class="fi-rs-book-alt mr-5 text-muted"></i>Apprendre Plus</a>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Soumission</button>
                                            </div>
                                        </form>                                        
                                        <div class="text-muted text-center">Vous avez un compte? <a href="#"> Connexion </a></div>
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-lg-6">
                               <img src="assets/imgs/login.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-guest-layout>