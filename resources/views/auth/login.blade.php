<x-guest-layout>
    <div class="min-h-screen w-full flex items-center justify-center bg-[#FFF7E8] px-6 py-12">

        <!-- Login Card -->
        <div class="bg-[#FFFAF3] w-full max-w-md p-8 rounded-2xl shadow-lg border border-[#D6C7B4]">

            <!-- Title -->
            <h2 class="text-3xl font-bold text-center text-[#4A3F35] mb-6 tracking-wide">
                Welcome Back
            </h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label
                        for="email"
                        :value="__('Email')"
                        class="text-[#3A2F28] font-semibold text-lg"
                    />
                    <x-text-input
                        id="email"
                        class="block mt-2 w-full rounded-xl bg-[#E8DCCB] text-[#4A3F35]
                               placeholder:text-[#6B5A4A]
                               border border-[#B8A89A]
                               focus:border-[#4A3F35] focus:ring-[#4A3F35]"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label
                        for="password"
                        :value="__('Password')"
                        class="text-[#3A2F28] font-semibold text-lg"
                    />
                    <x-text-input
                        id="password"
                        class="block mt-2 w-full rounded-xl bg-[#E8DCCB] text-[#4A3F35]
                               placeholder:text-[#6B5A4A]
                               border border-[#B8A89A]
                               focus:border-[#4A3F35] focus:ring-[#4A3F35]"
                        type="password"
                        name="password"
                        required
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center text-[#4A3F35]">
                        <input
                            id="remember_me"
                            type="checkbox"
                            class="rounded border-[#B8A89A] text-[#4A3F35] focus:ring-[#4A3F35]"
                            name="remember"
                        >
                        <span class="ms-2 text-sm">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                        <a
                            class="underline text-sm text-[#4A3F35] hover:text-[#2F4F3A]"
                            href="{{ route('password.request') }}"
                        >
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <button
                        class="px-6 py-2 bg-[#4A3F35] text-white rounded-xl shadow
                               hover:bg-[#2F4F3A] transition-all duration-300"
                    >
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
