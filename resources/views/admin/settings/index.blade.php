@extends('admin.layout')

@section('title', 'Site Settings')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">Site Settings</h2>
            <p class="text-sm text-gray-600 mt-1">Manage your website's logo, footer, and general settings</p>
        </div>
        <div class="p-6">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT')

                <!-- General Settings -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">General Settings</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Site Logo -->
                        <div>
                            <label for="site_logo" class="block text-sm font-medium text-gray-700 mb-2">Site Logo</label>
                            @if(isset($settings['general']['site_logo']) && $settings['general']['site_logo'])
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $settings['general']['site_logo']) }}" 
                                         alt="Current Logo" 
                                         class="h-20 w-auto border border-gray-300 rounded">
                                    <p class="text-xs text-gray-500 mt-1">Current Logo</p>
                                </div>
                            @endif
                            <input type="file" 
                                   class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary" 
                                   id="site_logo" 
                                   name="settings[general][site_logo]" 
                                   accept="image/*">
                            <p class="text-xs text-gray-500 mt-1">Upload a new logo (PNG, JPG, JPEG)</p>
                        </div>

                        <!-- Company Name -->
                        <div>
                            <label for="company_name" class="block text-sm font-medium text-gray-700 mb-2">Company Name</label>
                            <input type="text" 
                                   class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary" 
                                   id="company_name" 
                                   name="settings[general][company_name]" 
                                   value="{{ $settings['general']['company_name'] ?? 'Execudea' }}">
                        </div>

                        <!-- Company Description -->
                        <div class="md:col-span-2">
                            <label for="company_description" class="block text-sm font-medium text-gray-700 mb-2">Company Description</label>
                            <textarea class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary" 
                                      id="company_description" 
                                      name="settings[general][company_description]" 
                                      rows="3">{{ $settings['general']['company_description'] ?? 'Best Website Development Company In Pakistan' }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Footer Settings -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Footer Settings</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Footer Logo -->
                        <div>
                            <label for="footer_logo" class="block text-sm font-medium text-gray-700 mb-2">Footer Logo</label>
                            @if(isset($settings['footer']['footer_logo']) && $settings['footer']['footer_logo'])
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $settings['footer']['footer_logo']) }}" 
                                         alt="Current Footer Logo" 
                                         class="h-20 w-auto border border-gray-300 rounded">
                                    <p class="text-xs text-gray-500 mt-1">Current Footer Logo</p>
                                </div>
                            @endif
                            <input type="file" 
                                   class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary" 
                                   id="footer_logo" 
                                   name="settings[footer][footer_logo]" 
                                   accept="image/*">
                            <p class="text-xs text-gray-500 mt-1">Upload footer logo (leave empty to use site logo)</p>
                        </div>

                        <!-- Footer Description -->
                        <div>
                            <label for="footer_description" class="block text-sm font-medium text-gray-700 mb-2">Footer Description</label>
                            <textarea class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary" 
                                      id="footer_description" 
                                      name="settings[footer][footer_description]" 
                                      rows="4">{{ $settings['footer']['footer_description'] ?? 'We are helping businesses to develop their web applications with innovative solutions and cutting-edge technology.' }}</textarea>
                        </div>

                        <!-- Footer Copyright -->
                        <div class="md:col-span-2">
                            <label for="footer_copyright" class="block text-sm font-medium text-gray-700 mb-2">Copyright Text</label>
                            <input type="text" 
                                   class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary" 
                                   id="footer_copyright" 
                                   name="settings[footer][footer_copyright]" 
                                   value="{{ $settings['footer']['footer_copyright'] ?? '© 2025 Execudea. All rights reserved.' }}">
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Contact Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Email -->
                        <div>
                            <label for="contact_email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" 
                                   class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary" 
                                   id="contact_email" 
                                   name="settings[contact][contact_email]" 
                                   value="{{ $settings['contact']['contact_email'] ?? 'info@execudea.com' }}">
                        </div>

                        <!-- Phone -->
                        <div>
                            <label for="contact_phone" class="block text-sm font-medium text-gray-700 mb-2">Primary Phone</label>
                            <input type="text" 
                                   class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary" 
                                   id="contact_phone" 
                                   name="settings[contact][contact_phone]" 
                                   value="{{ $settings['contact']['contact_phone'] ?? '+92 336 5707907' }}">
                        </div>

                        <!-- Secondary Phone -->
                        <div>
                            <label for="contact_phone_2" class="block text-sm font-medium text-gray-700 mb-2">Secondary Phone</label>
                            <input type="text" 
                                   class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary" 
                                   id="contact_phone_2" 
                                   name="settings[contact][contact_phone_2]" 
                                   value="{{ $settings['contact']['contact_phone_2'] ?? '+92 314 5805849' }}">
                        </div>

                        <!-- Address -->
                        <div class="md:col-span-3">
                            <label for="contact_address" class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                            <input type="text" 
                                   class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary" 
                                   id="contact_address" 
                                   name="settings[contact][contact_address]" 
                                   value="{{ $settings['contact']['contact_address'] ?? 'Office #02, 2nd Floor, Building 140 I&T Center G9/1 Islamabad, Pakistan' }}">
                        </div>
                    </div>
                    
                    <h4 class="text-md font-medium text-gray-900 mt-6 mb-4">Social Media Links</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="social_facebook" class="block text-sm font-medium text-gray-700 mb-2">Facebook URL</label>
                            <input type="url" 
                                   class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary" 
                                   id="social_facebook" 
                                   name="settings[contact][social_facebook]" 
                                   value="{{ $settings['contact']['social_facebook'] ?? 'https://www.facebook.com/execudea' }}">
                        </div>

                        <div>
                            <label for="social_linkedin" class="block text-sm font-medium text-gray-700 mb-2">LinkedIn URL</label>
                            <input type="url" 
                                   class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary" 
                                   id="social_linkedin" 
                                   name="settings[contact][social_linkedin]" 
                                   value="{{ $settings['contact']['social_linkedin'] ?? 'https://www.linkedin.com/company/execudea' }}">
                        </div>

                        <div>
                            <label for="social_instagram" class="block text-sm font-medium text-gray-700 mb-2">Instagram URL</label>
                            <input type="url" 
                                   class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary" 
                                   id="social_instagram" 
                                   name="settings[contact][social_instagram]" 
                                   value="{{ $settings['contact']['social_instagram'] ?? 'https://www.instagram.com/execudea/' }}">
                        </div>

                        <div>
                            <label for="social_twitter" class="block text-sm font-medium text-gray-700 mb-2">Twitter URL</label>
                            <input type="url" 
                                   class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary" 
                                   id="social_twitter" 
                                   name="settings[contact][social_twitter]" 
                                   value="{{ $settings['contact']['social_twitter'] ?? '#' }}">
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-200">
                    <a href="{{ route('admin-dashboard') }}" 
                       class="px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-4 py-2 border border-transparent rounded-md shadow-sm bg-primary text-sm font-medium text-white hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Update Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection