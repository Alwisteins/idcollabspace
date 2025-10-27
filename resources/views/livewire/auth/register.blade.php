<section class="bg-stone-50 dark:bg-gray-900 py-12">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen">
        <a wire:navigate href="{{ route('welcome') }}"
            class="flex items-center mb-6 text-lg font-semibold text-blue-500 dark:text-white">
            <img class="w-8 h-8 mr-2" src="./images/logo.png" alt="logo">
            IDCollabSpace
        </a>
        <div
            class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-lg font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                    Register to your account
                </h1>
                <form wire:submit.prevent="register" class="space-y-4 md:space-y-6" action="#">
                    <div>
                        <label for="email" class="label">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-input @error('email') form-input-error @enderror" placeholder="name@example.com"
                            wire:model="email">
                        @error('email')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="label">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="form-input @error('password') form-input-error @enderror" wire:model="password">
                        @error('password')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="label">Password
                            Confirmation</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="••••••••"
                            class="form-input @error('password_confirmation') form-input-error @enderror"
                            wire:model="password_confirmation">
                        @error('password_confirmation')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- <button type="submit"
                        class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Register</button> --}}
                    <x-button type="submit" class="w-full">Register</x-button>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Already have account? <a href="/login"
                            class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
