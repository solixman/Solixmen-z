@extends('admin.layout')

@section('admin-title', 'Customers')

@section('admin-content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center gap-4">
    <div class="flex items-center gap-3 flex-1">
        <div class="relative flex-1 max-w-md">
            <input type="text" placeholder="Search customers..." class="pl-10 pr-4 py-2.5 border border-stone-300 focus:border-stone-500 focus:ring-stone-200 rounded-lg w-full shadow-sm text-stone-700">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
        <div class="relative">
            <select class="pl-4 pr-10 py-2.5 border border-stone-300 focus:border-stone-500 focus:ring-stone-200 rounded-lg appearance-none bg-white shadow-sm text-stone-700">
                <option value="">All Customers</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                <option value="new">New (Last 30 days)</option>
            </select>
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow-md border border-stone-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-stone-50 text-left">
                <tr>
                    <th class="px-6 py-4 text-xs font-medium text-stone-500 uppercase tracking-wider">Customer</th>
                    <th class="px-6 py-4 text-xs font-medium text-stone-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-4 text-xs font-medium text-stone-500 uppercase tracking-wider">Phone</th>
                    <th class="px-6 py-4 text-xs font-medium text-stone-500 uppercase tracking-wider">Role</th>
                    <th class="px-6 py-4 text-xs font-medium text-stone-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-xs font-medium text-stone-500 uppercase tracking-wider">Joined</th>
                    <th class="px-6 py-4 text-xs font-medium text-stone-500 uppercase tracking-wider text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100">
              @foreach ($users as $user)
              <tr class="hover:bg-stone-50 transition-colors">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-stone-200 flex items-center justify-center text-stone-600 mr-3 overflow-hidden">
                            <img src="{{$user->image}}" alt="{{$user->firstName}}" class="h-full w-full object-cover">
                        </div>
                        <div class="text-sm font-medium text-stone-700">{{$user->firstName }} {{$user->lastName}} </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-600">{{$user->email}}</td>
                
                <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-600">{{$user->phoneNumber ?? 'not set'}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-600">{{$user->role->name}}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 text-xs rounded-full {{ $user->status == 'active' ? 'bg-green-100 text-green-800' : 'bg-stone-100 text-stone-600' }}">
                        {{$user->status ?? 'active'}}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-600">{{$user->created_at->format('M d, Y')}}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center justify-center space-x-3">
                        <form action="/admin/profile" method="get" class="inline">
                            @csrf
                            <input type="hidden" name="id" value={{$user->id}} />
                            <button type="submit" class="text-stone-500 hover:text-stone-900 transition-colors p-1 rounded-full hover:bg-stone-100">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-label="View/Edit">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                              </svg>
                            </button>
                        </form>
                        <form action="customer/suspend" method="POST" class="inline">
                            @csrf
                            <input type="hidden" name="id" value={{$user->id}} />
                            <button type="submit" class="text-stone-500 hover:text-stone-900 transition-colors p-1 rounded-full hover:bg-stone-100">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-label="Suspend">
                                <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd" />
                              </svg>
                            </button>
                        </form>
                    </div>
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
    </div>
    <div class="py-4 px-6 border-t border-stone-200">
        {{$users->links()}}
    </div>
</div>
@endsection