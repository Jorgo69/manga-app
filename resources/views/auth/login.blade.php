<x-guest-layout>

      <!-- Normal Breadcrumb Begin -->
      <section class="normal-breadcrumb set-bg" data-setbg="img/normal-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Connexion</h2>
                        <p>Bienvenue sur Supeur Nova</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Login Section Begin -->
    <section class="login spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Login</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="input__item">
                                <input type="text" placeholder="Email address" name="email" :value="old('email')" required autofocus autocomplete="username">
                                <span class="icon_mail"></span>
                                @error('email')
                                    <span>{{ $error }} </span>
                                @enderror
                            </div>
                            <div class="input__item">
                                <input type="text" placeholder="Password" name="password" required autocomplete="current-password" />
                                <span class="icon_lock"></span>
                                @error('password')
                                    {{ $error }}
                                @enderror
                            </div>

                            <!-- Remember Me -->
                            <div class="block mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">Se Connecter</button>
                        </form>

                        @if (Route::has('password.request'))
                        <div class="">
                            <a href="{{ route('password.request') }}" class="forget_pass">Mots de passe Oublié?</a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <h3>Pas de Compte?</h3>
                        <a href="{{ route('register')}}" class="primary-btn">S'inscrire maintenant</a>
                    </div>
                </div>
            </div>
            <div class="login__social">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="login__social__links">
                            <span>Ou</span>
                            <ul>
                                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i> Inscription avec Facebook</a>
                                </li>
                                <li><a href="#" class="google"><i class="fa fa-google"></i> Inscription avec  Google</a></li>
                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i> Inscription avec  Twitter</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Section End -->

    
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
