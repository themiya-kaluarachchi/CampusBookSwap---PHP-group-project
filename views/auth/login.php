<div class="bg-blue-100 bg-fixed bg-cover bg-no-repeat bg-center min-h-screen">
  <div class="flex flex-col justify-center min-h-[80vh] py-18 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
      <h1 class="text-3xl font-extrabold text-blue-900">Sign in</h1>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
      <div class="bg-gray-100 bg-opacity-50 px-4 pt-8 pb-6 sm:rounded-lg sm:px-10 sm:shadow">
        <div>
          <h2 class="text-3xl font-extrabold text-center text-blue-600">Welcome Back</h2>
          <p class="text-sm text-gray-700 text-center">Sign in to your account to continue swapping books</p>
        </div>

        <form class="space-y-6 mt-4" action="<?= BASE_URL ?>/login" method="POST">
            <!-- Email address -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                <input id="email" type="text" required name="email"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Password -->
            <div class="relative password-field">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required name="password"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <button type="button"
                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-600 top-6 eye-btn" aria-label="Toggle Password Visibility">
                    <svg class="h-5 w-5 eye-icon" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>

                    <svg class="h-5 w-5 eye-off-icon hidden" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17.94 17.94A10.94 10.94 0 0112 19c-4.478 0-8.269-2.943-9.543-7a10.954 10.954 0 013.158-4.568M6.12 6.12A10.94 10.94 0 0112 5c4.478 0 8.269 2.943 9.543 7a10.952 10.952 0 01-1.611 2.568M15 12a3 3 0 00-3-3m0 0a3 3 0 013 3m-3 0a3 3 0 003 3M3 3l18 18" />
                    </svg>
                </button>
            </div>

            <!-- Confirm Password 
            <div class="relative password-field">
                <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input id="confirm_password" name="confirm_password" type="password" autocomplete="current-password" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <button type="button" 
                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-600 top-6 eye-btn" aria-label="Toggle Confirm Password Visibility">
                    <svg class="h-5 w-5 eye-icon" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>

                    <svg class="h-5 w-5 eye-off-icon hidden" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17.94 17.94A10.94 10.94 0 0112 19c-4.478 0-8.269-2.943-9.543-7a10.954 10.954 0 013.158-4.568M6.12 6.12A10.94 10.94 0 0112 5c4.478 0 8.269 2.943 9.543 7a10.952 10.952 0 01-1.611 2.568M15 12a3 3 0 00-3-3m0 0a3 3 0 013 3m-3 0a3 3 0 003 3M3 3l18 18" />
                    </svg>
                </button>
            </div>-->

            <!-- Remember Me and Forgot Password -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" name="remember_me" type="checkbox"
                        class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-900">Remember me</label>
                </div>
                <div class="text-sm">
                    <a href="#" class="font-medium text-indigo-400 hover:text-indigo-500">Forgot your password?</a>
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                class="relative w-full flex justify-center py-2 px-4 border border-transparent rounded-md text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" fill="currentColor" viewBox="0 0 20 20"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                            clip-rule="evenodd" />
                        </svg>
                    </span>
                    Sign In
                </button>
            </div>
        </form>

        <!-- Create Account Link -->
        <div class="mt-6 text-center">
          <span class="text-sm text-gray-600">
            Don't have an account?
            <a href="/register" class="font-semibold text-indigo-600 hover:underline">Create Account</a>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>

<script>

    jQuery.noConflict();

    jQuery(document).ready(function () {

        jQuery('.eye-btn').click(function () {

            var container = jQuery(this).closest('.password-field');

            container.find('.eye-icon').toggleClass('hidden');
            container.find('.eye-off-icon').toggleClass('hidden');

            var inputField = container.find('input');
            if(inputField.attr('type')==='password'){
                inputField.attr('type','text');
            }else{
                inputField.attr('type','password');
            }
        });
    });

</script>
