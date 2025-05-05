@php
use App\Models\Role;
$roles=Role::All();
@endphp
@extends('client.layout')

@section('client-title', 'My Account')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6" style="margin: 2%">
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
                        <button id="changeProfilePhotoBtn" class="text-sm text-stone-600 hover:text-stone-900">
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
                        <a href="client/orders"
                            class="block py-2 px-4 rounded-md text-stone-600 hover:bg-stone-50 hover:text-stone-800">
                            my orders
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
                                <label for="firstName" class="block text-sm font-medium text-stone-700 mb-1">firstName</label>
                                <input type="text" id="firstName" name="firstName" value="{{ Auth::user()->firstName }}"
                                    class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">
                            </div>
                            <div>
                                <label for="lastName" class="block text-sm font-medium text-stone-700 mb-1">lastName</label>
                                <input type="text" id="lastName" name="lastName" value="{{ Auth::user()->lastName }}"
                                    class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">
                            </div>
                            @if(Auth::user()->role->name == 'Admin')
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
                            @else
                            <div>
                                <label for="role" class="block text-sm font-medium text-stone-700 mb-1">role</label>
                                <input type="text" id="role" name="role" value="{{ Auth::user()->role->name }}"
                                    class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md" readonly>
                            </div>
                             @endif
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
                            <input type="hidden" name="id" value={{Auth::user()->id}}>
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
                <div class="space-y-4 mb-6">
                <div class="px-6 py-4 border-b border-stone-100 bg-stone-50">
                    <h3 class="font-medium">Security</h3>
                </div>
                <div class="p-6">
                    <h1 style="color:gray ">COMING SOON</h1>
                   </div>

                    {{-- <form>
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
                    </form> --}}
                </div>
            </div>

            <!-- Notifications -->
            <div id="notifications" class="bg-white rounded-lg shadow-sm border border-stone-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-stone-100 bg-stone-50">
                    <h3 class="font-medium">Notification Preferences</h3>
                </div>
             

                <div class="p-6">
                        <h1 style="color:gray ">COMING SOON</h1>
 </div>
                {{--    <form>
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
                </div> --}}
            </div>

            <!-- Account Activity -->
            <div id="activity" class="bg-white rounded-lg shadow-sm border border-stone-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-stone-100 bg-stone-50">
                    <h3 class="font-medium">Account Activity</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-6">
                       
                        <h1 style="color:gray ">COMING SOON</h1>

                        <div class="border-t border-stone-100 pt-6">
                            <h4 class="text-sm font-medium mb-3">Account Actions</h4>
                        <h1 style="color:gray ">COMING SOON</h1>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Photo Modal -->
    <div id="profilePhotoModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
      <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-stone-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        
        <!-- Modal panel -->
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                <h3 class="text-lg leading-6 font-medium text-stone-900" id="modal-title">
                  Change Profile Photo
                </h3>
                
                <div class="mt-4">
                  <form action="/user/photo/update" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-6">
                      <!-- Current profile photo -->
                      <div class="flex flex-col items-center justify-center">
                        <h4 class="text-sm font-medium text-stone-700 mb-2">Current Photo</h4>
                        <div class="h-32 w-32 rounded-full bg-stone-200 overflow-hidden">
                          <img id="currentProfilePhoto" src="{{Auth::user()->image}}" alt="{{Auth::user()->name}}" 
                               class="h-full w-full object-cover">
                          <div class="h-full w-full flex items-center justify-center text-stone-600 text-3xl font-medium">
                            <span>{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</span>
                          </div>
                        </div>
                      </div>
                      
                      <!-- Upload new photo -->
                      <div>
                        <label for="profilePhoto" class="block text-sm font-medium text-stone-700 mb-2">Upload New Photo</label>
                        <input type="text" id="profilePhoto" name="profilePhoto" 
                               class="w-full px-3 py-2 border border-stone-300 rounded-md focus:outline-none focus:ring-2 focus:ring-stone-500"
                               value="{{Auth::user()->photo}}" onchange="previewImage(this)">                      </div>
                      
                      <!-- Preview new photo -->
                      <div class="flex flex-col items-center justify-center hidden" id="previewContainer">
                        <h4 class="text-sm font-medium text-stone-700 mb-2">Preview</h4>
                        <div class="h-32 w-32 rounded-full bg-stone-200 overflow-hidden">
                          <img id="photoPreview" src="#" alt="Preview" class="h-full w-full object-cover">
                        </div>
                      </div>
                      
                      <input type="hidden" name="id" value="{{Auth::user()->id}}">
                      <input type="hidden" name="current_image" value="{{Auth::user()->image}}">
                    </div>
                    
                    <!-- Modal actions -->
                    <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                      <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-stone-800 text-base font-medium text-white hover:bg-stone-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-500 sm:col-start-2 sm:text-sm">
                        Save Photo
                      </button>
                      <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-stone-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-stone-700 hover:bg-stone-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-500 sm:mt-0 sm:col-start-1 sm:text-sm" onclick="closeModal()">
                        Cancel
                      </button>
                    </div>
                  </form>
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

        // Profile Photo Modal functionality
        function openModal() {
            document.getElementById('profilePhotoModal').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeModal() {
            document.getElementById('profilePhotoModal').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        function previewImage(input) {
            const previewContainer = document.getElementById('previewContainer');
            const preview = document.getElementById('photoPreview');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                }
                
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '';
                previewContainer.classList.add('hidden');
            }
        }

        // Open the modal when the "Change Profile Photo" button is clicked
        document.addEventListener('DOMContentLoaded', function() {
            const changePhotoBtn = document.getElementById('changeProfilePhotoBtn');
            if (changePhotoBtn) {
                changePhotoBtn.addEventListener('click', openModal);
            }
        });
    </script>
@endsection
@endsection