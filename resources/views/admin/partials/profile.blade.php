@extends('admin.layout')

@section('admin-title', 'My Account')

@section('admin-content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6" style="margin: 2%">
        <!-- Profile Sidebar -->    
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-sm border border-stone-100 overflow-hidden">
                <div class="p-6 text-center border-b border-stone-100">
                    <div class="h-24 w-24 rounded-full bg-stone-200 mx-auto mb-4 overflow-hidden">
                        @if($user->image)
                            <img src="{{$user->image}}" alt="{{$user->name}}" class="h-full w-full object-cover rounded-full">
                        @else
                            <div class="h-full w-full flex items-center justify-center text-stone-600 text-2xl font-medium">
                                <span>{{ strtoupper(substr($user->name, 0, 2)) }}</span>
                            </div>
                        @endif
                    </div>
                    <h3 class="text-lg font-medium">{{$user->name}}</h3>
                    <p class="text-sm text-stone-500">{{$user->email}}</p>
                    <p class="text-sm text-stone-500 mt-1">{{$user->role->name}}</p>

                    <div class="mt-4">
                        <button id="openPhotoModal" type="button" class="text-sm text-stone-600 hover:text-stone-900">
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
                                <label for="firstName" class="block text-sm font-medium text-stone-700 mb-1">firstName</label>
                                <input type="text" id="firstName" name="firstName" value="{{ $user->firstName }}"
                                    class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">
                            </div>
                            <div>
                                <label for="lastName" class="block text-sm font-medium text-stone-700 mb-1">lastName</label>
                                <input type="text" id="lastName" name="lastName" value="{{ $user->lastName }}"
                                    class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">
                            </div>
                    
                            <div>
                                <label for="role" class="block text-sm font-medium text-stone-700 mb-1">Role</label>
                                <select id="role" name="role" 
                                    class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}"
                                            {{ $user->role->name == $role->name ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                    
                            <!-- Add the Status field here -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-stone-700 mb-1">Status</label>
                                <select id="status" name="status" class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">
                                    <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    <option value="suspended" {{ $user->status == 'suspended' ? 'selected' : '' }}>Suspended</option>
                                </select>
                            </div>
                    
                            <div>
                                <label for="email" class="block text-sm font-medium text-stone-700 mb-1">Email Address</label>
                                <input type="email" id="email" name="email" value="{{$user->email}}"
                                    class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-stone-700 mb-1">Phone Number</label>
                                <input type="tel" id="phone" name="phone" value="{{$user->phoneNumber}}"
                                    class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">
                            </div>
                        </div>
                    
                        <div class="mb-6">
                            <label for="bio" class="block text-sm font-medium text-stone-700 mb-1">Bio</label>
                            <textarea id="bio" name="bio" rows="3"
                                class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">{{$user->bio}}</textarea>
                        </div>
                    
                        <div>
                            <input type="hidden" name="id" value={{$user->id}}>
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

            <div id="security" class="bg-white rounded-lg shadow-sm border border-stone-100 overflow-hidden">
                <div class="space-y-4 mb-6">
                <div class="px-6 py-4 border-b border-stone-100 bg-stone-50">
                    <h3 class="font-medium">Security</h3>
                </div>
                <div class="p-6">
                    <h1 style="color:gray ">COMING SOON</h1>
                   </div>
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

    <!-- Profile Photo Change Modal -->
    <div id="photoModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg max-w-md w-full mx-4">
            <div class="px-6 py-4 border-b border-stone-100 flex items-center justify-between">
                <h3 class="font-medium">Change Profile Photo</h3>
                <button id="closePhotoModal" class="text-stone-400 hover:text-stone-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <div class="p-6">
                <form action="/user/photo/update" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" for="id" name="id" value="{{$user->id}}">
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-stone-700 mb-2">Current Photo</label>
                        <div class="h-32 w-32 rounded-full bg-stone-200 mx-auto overflow-hidden">
                            @if($user->image)
                                <img src="{{$user->image}}" alt="{{$user->name}}" class="h-full w-full object-cover">
                            @else
                                <div class="h-full w-full flex items-center justify-center text-stone-600 text-3xl font-medium">
                                    <span>{{ strtoupper(substr($user->name, 0, 2)) }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <label for="profilePhoto" class="block text-sm font-medium text-stone-700 mb-2">Upload New Photo</label>
                        <input type="text" id="profilePhoto" name="profilePhoto" 
                            class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md"
                            value="{{$user->image}}">
                        @if($user->image)
                            <input type="hidden" name="current_image" value="{{$user->image}}">
                        @endif
                        
                    </div>
                    
                    <div class="flex justify-end space-x-3">
                        <button type="button" id="cancelPhotoModal"
                            class="px-4 py-2 border border-stone-300 bg-white hover:bg-stone-50 text-stone-700 rounded-md transition duration-150 ease-in-out">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-stone-800 hover:bg-stone-900 text-white rounded-md transition duration-150 ease-in-out">
                            Save Photo
                        </button>
                    </div>
                </form>
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

        // Photo modal functionality
        const photoModal = document.getElementById('photoModal');
        const openPhotoModal = document.getElementById('openPhotoModal');
        const closePhotoModal = document.getElementById('closePhotoModal');
        const cancelPhotoModal = document.getElementById('cancelPhotoModal');

        openPhotoModal.addEventListener('click', () => {
            photoModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Prevent scrolling when modal is open
        });

        const closeModal = () => {
            photoModal.classList.add('hidden');
            document.body.style.overflow = 'auto'; // Re-enable scrolling
        };

        closePhotoModal.addEventListener('click', closeModal);
        cancelPhotoModal.addEventListener('click', closeModal);

        // Close modal on outside click
        photoModal.addEventListener('click', (e) => {
            if (e.target === photoModal) {
                closeModal();
            }
        });

        // Preview uploaded image
        const profileImageInput = document.getElementById('profilePhoto');
        profileImageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const img = photoModal.querySelector('.h-32.w-32 img') || document.createElement('img');
                    img.src = event.target.result;
                    img.alt = "Profile Preview";
                    img.classList.add('h-full', 'w-full', 'object-cover');
                    
                    const container = photoModal.querySelector('.h-32.w-32');
                    // Clear the container first
                    container.innerHTML = '';
                    container.appendChild(img);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
@endsection