<x-guest-layout>

       <!-- Normal Breadcrumb Begin -->
       <section class="normal-breadcrumb set-bg" data-setbg="img/normal-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Inscription</h2>
                        <p>Bienvenue sur Supeur Nova.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Signup Section Begin -->
    <section class="signup spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Inscription</h3>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            
                            @error('email')
                                <span class="text-danger">{{ $message }} </span>
                            @enderror
                            <div class="input__item">
                                <input id="email" type="email" placeholder="{{ __('Addresse Email')}}" name="email" :value="old('email')" required autocomplete="username" />
                                <span for="email" class="icon_mail"></span>
                            </div>
                            
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="input__item">
                                <input id="name" type="text" name="name" placeholder="{{ __('Votre Nom')}}" :value="old('name')" required autofocus autocomplete="name" />
                                <span for="name" class="icon_profile"></span>
                            </div>
                            

                            <!-- Password -->
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="input__item">
                                <input id="password" type="password" placeholder="{{ __('Mots de Passe')}}" type="password" name="password" required autocomplete="new-password" />
                                <span for="password" class="icon_lock"></span>
                            </div>
                            
                            <!-- Confirm Password -->
                            @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="input__item">
                                <input id="password_confirmation" type="text" placeholder="{{ __('Confirmatiom Passe')}}" type="password" name="password_confirmation" required autocomplete="new-password" >
                                <span for="password_confirmation" class="icon_lock"></span>
                            </div>
                            

                            <button type="submit" class="site-btn">{{ __('Se Connecter') }}</button>
                        </form>
                        <h5>Avez vous un compte? <a href="{{ route('login') }}">{{ __('Connexion!') }}</a></h5>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__social__links">
                        <h3>{{ __('Connexion Avec:') }}</h3>
                        <ul>
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i> {{ __('Inscription avec Facebook')}} </a>
                            </li>
                            <li><a href="#" class="google"><i class="fa fa-google"></i> {{ __('Inscription avec  Google')}} </a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i> {{ __('Inscription avec  Twitter')}} </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Signup Section End -->


    {{-- <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form> --}}
</x-guest-layout>
