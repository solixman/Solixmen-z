@php
    use App\Models\Role;

$roles=Role::All();
@endphp
@extends('client.layout')

@section('client-title', 'My Account')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Profile Sidebar -->    
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-sm border border-stone-100 overflow-hidden">
                <div class="p-6 text-center border-b border-stone-100">
                    <div class="h-24 w-24 rounded-full bg-stone-200 mx-auto mb-4 overflow-hidden">
                
                            <img src="{{Auth::user()->image}}" alt="{{Auth::user()->name}}" class="h-full w-full object-cover rounded-full">
            
                            <div class="h-full w-full flex items-center justify-center text-stone-600 text-2xl font-medium">
                                <span>{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</span>
                            </div>
                        
                    </div>
                    <h3 class="text-lg font-medium">{{Auth::user()->name}}</h3>
                    <p class="text-sm text-stone-500">{{Auth::user()->email}}</p>
                    <p class="text-sm text-stone-500 mt-1">{{Auth::user()->role->name}}</p>

                    <div class="mt-4">
                        <button class="text-sm text-stone-600 hover:text-stone-900">
                            Change Profile Photo
                        </button>
                    </div>
                </div>

                <div class="p-4">
                    <nav class="space-y-1">
                        <a href="#personal-info" class="block py-2 px-4 rounded-md bg-stone-100 text-stone-800 font-medium">
                            Personal Information
                        </a>
                        <a href="#security"
                            class="block py-2 px-4 rounded-md text-stone-600 hover:bg-stone-50 hover:text-stone-800">
                            Security
                        </a>
                        <a href="#notifications"
                            class="block py-2 px-4 rounded-md text-stone-600 hover:bg-stone-50 hover:text-stone-800">
                            Notifications
                        </a>
                        <a href="#activity"
                            class="block py-2 px-4 rounded-md text-stone-600 hover:bg-stone-50 hover:text-stone-800">
                            Account Activity
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Profile Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Personal Information -->
            <div id="personal-info" class="bg-white rounded-lg shadow-sm border border-stone-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-stone-100 bg-stone-50">
                    <h3 class="font-medium">Personal Information</h3>
                </div>
                <div class="p-6">
                    <form action="/customer/modify" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-stone-700 mb-1">Name</label>
                                <input type="text" id="name" name="name" value="{{ Auth::user()->name }}"
                                    class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">
                            </div>

                            <div>
                                <label for="role"    class="block text-sm font-medium text-stone-700 mb-1">Role</label>
                                <select id="role" name="role" 
                                    class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}"
                                            {{ Auth::user()->role->name == $role->name ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-stone-700 mb-1">Email
                                    Address</label>
                                <input type="email" id="email" name="email" value="{{Auth::user()->email}}"
                                    class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-stone-700 mb-1">Phone
                                    Number</label>
                                <input type="tel" id="phone" name="phone" value="{{Auth::user()->phoneNumber}}"
                                    class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="bio" class="block text-sm font-medium text-stone-700 mb-1">Bio</label>
                            <textarea id="bio" name="bio" rows="3"
                                class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">{{Auth::user()->bio}}</textarea>
                        </div>

                        <div>
                            <input type="hidden" name="userId" value={{Auth::user()->id}}>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-4 py-2 bg-stone-800 hover:bg-stone-900 text-white rounded-md transition duration-150 ease-in-out">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Security -->
            <div id="security" class="bg-white rounded-lg shadow-sm border border-stone-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-stone-100 bg-stone-50">
                    <h3 class="font-medium">Security</h3>
                </div>
                <div class="p-6">
                    <form>
                        <div class="space-y-4 mb-6">
                            <div>
                                <label for="current_password" class="block text-sm font-medium text-stone-700 mb-1">Current
                                    Password</label>
                                <input type="password" id="current_password" name="current_password"
                                    class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">
                            </div>
                            <div>
                                <label for="new_password" class="block text-sm font-medium text-stone-700 mb-1">New
                                    Password</label>
                                <input type="password" id="new_password" name="new_password"
                                    class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">
                            </div>
                            <div>
                                <label for="confirm_password" class="block text-sm font-medium text-stone-700 mb-1">Confirm
                                    New Password</label>
                                <input type="password" id="confirm_password" name="confirm_password"
                                    class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">
                            </div>
                        </div>

                        <div class="border-t border-stone-100 pt-6 mb-6">
                            <h4 class="text-sm font-medium mb-4">Two-Factor Authentication</h4>
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-stone-600">Add an extra layer of security to your account</p>
                                    <p class="text-sm text-stone-500 mt-1">Currently: <span
                                            class="text-red-600">Disabled</span></p>
                                </div>
                                <button type="button"
                                    class="px-4 py-2 border border-stone-300 bg-white hover:bg-stone-50 text-stone-700 rounded-md transition duration-150 ease-in-out">
                                    Enable
                                </button>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-4 py-2 bg-stone-800 hover:bg-stone-900 text-white rounded-md transition duration-150 ease-in-out">
                                Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Notifications -->
            <div id="notifications" class="bg-white rounded-lg shadow-sm border border-stone-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-stone-100 bg-stone-50">
                    <h3 class="font-medium">Notification Preferences</h3>
                </div>
                <div class="p-6">
                    <form>
                        <div class="space-y-4 mb-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-sm font-medium">New Orders</h4>
                                    <p class="text-sm text-stone-500">Receive notifications when new orders are placed</p>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="notify_orders" name="notify_orders"
                                        class="h-4 w-4 text-stone-600 focus:ring-stone-500 border-stone-300 rounded"
                                        checked>
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-sm font-medium">Inventory Alerts</h4>
                                    <p class="text-sm text-stone-500">Get notified when products are low in stock</p>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="notify_inventory" name="notify_inventory"
                                        class="h-4 w-4 text-stone-600 focus:ring-stone-500 border-stone-300 rounded"
                                        checked>
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-sm font-medium">Customer Messages</h4>
                                    <p class="text-sm text-stone-500">Receive notifications for new customer inquiries</p>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="notify_messages" name="notify_messages"
                                        class="h-4 w-4 text-stone-600 focus:ring-stone-500 border-stone-300 rounded"
                                        checked>
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-sm font-medium">System Updates</h4>
                                    <p class="text-sm text-stone-500">Get notified about system updates and maintenance</p>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="notify_system" name="notify_system"
                                        class="h-4 w-4 text-stone-600 focus:ring-stone-500 border-stone-300 rounded">
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-stone-100 pt-6 mb-6">
                            <h4 class="text-sm font-medium mb-4">Notification Delivery</h4>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <input type="checkbox" id="delivery_email" name="delivery_email"
                                        class="h-4 w-4 text-stone-600 focus:ring-stone-500 border-stone-300 rounded"
                                        checked>
                                    <label for="delivery_email" class="ml-2 block text-sm text-stone-700">Email</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="delivery_sms" name="delivery_sms"
                                        class="h-4 w-4 text-stone-600 focus:ring-stone-500 border-stone-300 rounded">
                                    <label for="delivery_sms" class="ml-2 block text-sm text-stone-700">SMS</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="delivery_browser" name="delivery_browser"
                                        class="h-4 w-4 text-stone-600 focus:ring-stone-500 border-stone-300 rounded"
                                        checked>
                                    <label for="delivery_browser" class="ml-2 block text-sm text-stone-700">Browser
                                        Notifications</label>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-4 py-2 bg-stone-800 hover:bg-stone-900 text-white rounded-md transition duration-150 ease-in-out">
                                Save Preferences
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Account Activity -->
            <div id="activity" class="bg-white rounded-lg shadow-sm border border-stone-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-stone-100 bg-stone-50">
                    <h3 class="font-medium">Account Activity</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-6">
                        <div>
                            <h4 class="text-sm font-medium mb-3">Recent Login Activity</h4>
                            <div class="space-y-3">
                                <div class="flex items-start">
                                    <div class="p-2 bg-green-100 rounded-full mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">Current Session</p>
                                        <p class="text-xs text-stone-500">Mar 14, 2025 at 10:30 AM</p>
                                        <p class="text-xs text-stone-500">IP: 192.168.1.1 • Chrome on macOS</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="p-2 bg-stone-100 rounded-full mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-600"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414 0l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293a1 1 0 000-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">Previous Login</p>
                                        <p class="text-xs text-stone-500">Mar 13, 2025 at 4:15 PM</p>
                                        <p class="text-xs text-stone-500">IP: 192.168.1.1 • Chrome on macOS</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="p-2 bg-stone-100 rounded-full mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-600"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414 0l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293a1 1 0 000-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">Previous Login</p>
                                        <p class="text-xs text-stone-500">Mar 12, 2025 at 9:45 AM</p>
                                        <p class="text-xs text-stone-500">IP: 192.168.1.1 • Chrome on macOS</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-stone-100 pt-6">
                            <h4 class="text-sm font-medium mb-3">Account Actions</h4>
                            <div class="space-y-3">
                                <button type="button" class="text-sm text-stone-600 hover:text-stone-900">
                                    Sign out of all other sessions
                                </button>
                                <div class="border-t border-stone-100 pt-3">
                                    <button type="button" class="text-sm text-red-600 hover:text-red-800">
                                        Deactivate account
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('scripts')
    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 20,
                        behavior: 'smooth'
                    });

                    // Update active state
                    document.querySelectorAll('nav a').forEach(link => {
                        link.classList.remove('bg-stone-100', 'text-stone-800', 'font-medium');
                        link.classList.add('text-stone-600', 'hover:bg-stone-50',
                            'hover:text-stone-800');
                    });

                    this.classList.remove('text-stone-600', 'hover:bg-stone-50', 'hover:text-stone-800');
                    this.classList.add('bg-stone-100', 'text-stone-800', 'font-medium');
                }
            });
        });
    </script>
@endsection
@endsection
