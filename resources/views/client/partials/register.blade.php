@extends('client.layout')

@section('title', 'Create Account |Solixmen Z')

@section('content')
<div class="bg-white py-12 md:py-24">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-md mx-auto">
            <h1 class="text-3xl font-serif text-center mb-8">Create Account</h1>
            
            <form class="space-y-6" action="/auth/register" method="post">
                @csrf
                    
                    <div>
                        <label  for="name" class="block text-sm font-medium mb-1">full Name</label>
                        <input 
                        name="name"
                            type="text" 
                            id="name" 
                            class="w-full border-stone-300 border-2 rounded-md bg-stone-50 shadow-sm focus:border-stone-500 focus:ring-stone-500 focus:shadow-md transition-all duration-200"
                            required
                        >
                    </div>
            
                
                <div>
                    <label for="email" class="block text-sm font-medium mb-1">Email Address</label>
                    <input 
                    name="email"
                        type="email" 
                        id="email" 
                        class="w-full border-stone-300 border-2 rounded-md bg-stone-50 shadow-sm focus:border-stone-500 focus:ring-stone-500 focus:shadow-md transition-all duration-200"
                        required
                    >
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium mb-1">Password</label>
                    <input 
                    name="password"
                        type="password" 
                        id="password" 
                        class="w-full border-stone-300 border-2 rounded-md bg-stone-50 shadow-sm focus:border-stone-500 focus:ring-stone-500 focus:shadow-md transition-all duration-200"
                        required
                    >
                    <p class="mt-1 text-xs text-stone-500">Password must be at least 8 characters long and include a number and a special character.</p>
                </div>
                
                <div>
                    <label for="confirm-password" class="block text-sm font-medium mb-1">Confirm Password</label>
                    <input 
                        name="password_confirmation"
                        type="password" 
                        id="confirm-password" 
                        class="w-full border-stone-300 border-2 rounded-md bg-stone-50 shadow-sm focus:border-stone-500 focus:ring-stone-500 focus:shadow-md transition-all duration-200"
                        required
                    >
                </div>
                
                <button 
                    type="submit" 
                    class="w-full bg-stone-800 text-white py-3 px-6 rounded-md hover:bg-stone-900 transition duration-150 ease-in-out">
                    Create Account
                </button>
            </form>
            
            <div class="mt-8 text-center">
                <p class="text-sm text-stone-600">
                    Already have an account? 
                    <a href="/login" class="text-stone-800 hover:underline">Sign in</a>
                </p>
            </div>
            
            <div class="mt-8">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-stone-200"></div>
                    </div>
                    <!-- <div class="relative flex justify-center">
                        <span class="bg-white px-4 text-sm text-stone-500">Or continue with</span>
                    </div> -->
                </div>
                
                <!-- <div class="mt-6 grid grid-cols-2 gap-4">
                    <button class="flex justify-center items-center py-2 px-4 border border-stone-300 rounded-md hover:bg-stone-50 transition duration-150 ease-in-out">
                        <svg class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.351c0-.732-.593-1.325-1.325-1.325z"></path>
                        </svg>
                        Facebook
                    </button>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection
