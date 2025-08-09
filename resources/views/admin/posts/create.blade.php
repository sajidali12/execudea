@extends('admin.layout')

@section('title', 'Create New Post')
@section('page-title', 'Create New Post')

@push('styles')
<style>
    .seo-preview {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 16px;
        margin-top: 16px;
    }
    .seo-title {
        color: #1a73e8;
        font-size: 20px;
        line-height: 1.3;
        margin: 0 0 4px 0;
        text-decoration: none;
    }
    .seo-url {
        color: #006621;
        font-size: 14px;
        margin: 0 0 4px 0;
    }
    .seo-description {
        color: #545454;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
    }
</style>
@endpush

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center mb-6">
        <a href="{{ route('posts.index') }}" class="text-gray-600 hover:text-gray-800 mr-4">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h2 class="text-2xl font-bold text-gray-800">Create New Blog Post</h2>
    </div>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <div class="bg-white rounded-lg shadow-sm p-6">
            <!-- Title -->
            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Post Title</label>
                <input type="text" 
                       id="title" 
                       name="title" 
                       value="{{ old('title') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('title') border-red-300 @enderror"
                       placeholder="Enter post title..."
                       required>
                @error('title')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Author Name -->
            <div class="mb-6">
                <label for="author_name" class="block text-sm font-medium text-gray-700 mb-2">Author Name</label>
                <input type="text" 
                       id="author_name" 
                       name="author_name" 
                       value="{{ old('author_name', $user->name ?? '') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('author_name') border-red-300 @enderror"
                       placeholder="Enter author name..."
                       required>
                @error('author_name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Featured Image -->
            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md @error('image') border-red-300 @enderror">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-primary hover:text-primary focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary">
                                <span>Upload a file</span>
                                <input id="image" name="image" type="file" class="sr-only" accept="image/*" required>
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                    </div>
                </div>
                @error('image')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Excerpt -->
            <div class="mb-6">
                <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">Excerpt</label>
                <textarea id="excerpt" 
                          name="excerpt" 
                          rows="3"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('excerpt') border-red-300 @enderror"
                          placeholder="Brief description of the post (optional - will be auto-generated if left empty)">{{ old('excerpt') }}</textarea>
                @error('excerpt')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Content with Rich Text Editor -->
            <div class="mb-6">
                <label for="body" class="block text-sm font-medium text-gray-700 mb-2">Post Content</label>
                <div id="quill-editor" style="height: 400px;" class="@error('body') border-red-300 @enderror"></div>
                <textarea id="body" name="body" style="display: none;" required>{{ old('body') }}</textarea>
                @error('body')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Frequently Asked Questions</h3>
            <div id="faqs-container">
                <div class="faq-item bg-gray-50 p-4 rounded-lg mb-4" data-index="0">
                    <div class="flex justify-between items-center mb-3">
                        <h4 class="text-sm font-medium text-gray-700">FAQ #1</h4>
                        <button type="button" class="remove-faq text-red-600 hover:text-red-800 text-sm">
                            <i class="fas fa-trash"></i> Remove
                        </button>
                    </div>
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Question</label>
                        <input type="text" name="faqs[0][question]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:border-primary" placeholder="Enter FAQ question...">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Answer</label>
                        <textarea name="faqs[0][answer]" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:border-primary" placeholder="Enter FAQ answer..."></textarea>
                    </div>
                </div>
            </div>
            <button type="button" id="add-faq" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                <i class="fas fa-plus mr-2"></i>Add FAQ
            </button>
        </div>

        <!-- SEO Section -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">SEO Settings</h3>
            
            <!-- SEO Title -->
            <div class="mb-6">
                <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">SEO Title</label>
                <input type="text" 
                       id="meta_title" 
                       name="meta_title" 
                       value="{{ old('meta_title') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('meta_title') border-red-300 @enderror"
                       placeholder="Leave empty to use post title"
                       maxlength="60">
                <p class="text-sm text-gray-500 mt-1">Recommended: 50-60 characters. <span id="meta-title-count">0</span>/60</p>
                @error('meta_title')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- SEO Description -->
            <div class="mb-6">
                <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">SEO Description</label>
                <textarea id="meta_description" 
                          name="meta_description" 
                          rows="3"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('meta_description') border-red-300 @enderror"
                          placeholder="Leave empty to use excerpt"
                          maxlength="160">{{ old('meta_description') }}</textarea>
                <p class="text-sm text-gray-500 mt-1">Recommended: 150-160 characters. <span id="meta-desc-count">0</span>/160</p>
                @error('meta_description')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Meta Keywords -->
            <div class="mb-6">
                <label for="meta_keywords" class="block text-sm font-medium text-gray-700 mb-2">Meta Keywords</label>
                <input type="text" 
                       id="meta_keywords" 
                       name="meta_keywords" 
                       value="{{ old('meta_keywords') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('meta_keywords') border-red-300 @enderror"
                       placeholder="Separate keywords with commas">
                @error('meta_keywords')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- URL Slug -->
            <div class="mb-6">
                <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">URL Slug</label>
                <input type="text" 
                       id="slug" 
                       name="slug" 
                       value="{{ old('slug') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('slug') border-red-300 @enderror"
                       placeholder="Leave empty to auto-generate from title">
                <p class="text-sm text-gray-500 mt-1">URL: <span id="slug-preview">{{ url('/blog/') }}/your-post-title</span></p>
                @error('slug')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- SEO Preview -->
            <div class="seo-preview">
                <h4 class="text-sm font-medium text-gray-700 mb-3">Google Search Preview:</h4>
                <div class="seo-title" id="seo-preview-title">Your Post Title</div>
                <div class="seo-url" id="seo-preview-url">{{ url('/blog/your-post-title') }}</div>
                <div class="seo-description" id="seo-preview-description">Your post description will appear here...</div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end space-x-3">
            <a href="{{ route('posts.index') }}" 
               class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                Cancel
            </a>
            <button type="submit" 
                    class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                <i class="fas fa-save mr-2"></i>Create Post
            </button>
        </div>
    </form>
</div>

<!-- Quill.js -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Quill
        var quill = new Quill('#quill-editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    [{ 'font': [] }],
                    [{ 'size': ['small', false, 'large', 'huge'] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'script': 'sub'}, { 'script': 'super' }],
                    ['blockquote', 'code-block'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }],
                    [{ 'direction': 'rtl' }],
                    [{ 'align': [] }],
                    ['link', 'image', 'video'],
                    ['clean']
                ]
            },
            placeholder: 'Write your post content here...'
        });

        // Sync Quill content with hidden textarea
        var bodyTextarea = document.getElementById('body');
        quill.on('text-change', function() {
            bodyTextarea.value = quill.root.innerHTML;
            updateSeoPreview();
        });

        // Set initial content if editing
        if (bodyTextarea.value) {
            quill.root.innerHTML = bodyTextarea.value;
        }

        // Character counting
        const metaTitleInput = document.getElementById('meta_title');
        const metaDescInput = document.getElementById('meta_description');
        const titleInput = document.getElementById('title');
        const slugInput = document.getElementById('slug');
        const excerptInput = document.getElementById('excerpt');

        // Character counters
        metaTitleInput.addEventListener('input', function() {
            document.getElementById('meta-title-count').textContent = this.value.length;
            updateSeoPreview();
        });

        metaDescInput.addEventListener('input', function() {
            document.getElementById('meta-desc-count').textContent = this.value.length;
            updateSeoPreview();
        });

        // Auto-generate slug from title
        titleInput.addEventListener('input', function() {
            if (!slugInput.value || slugInput.dataset.autoGenerated === 'true') {
                const slug = generateSlug(this.value);
                slugInput.value = slug;
                slugInput.dataset.autoGenerated = 'true';
                updateSlugPreview();
            }
            updateSeoPreview();
        });

        // Manual slug editing
        slugInput.addEventListener('input', function() {
            this.dataset.autoGenerated = 'false';
            updateSlugPreview();
            updateSeoPreview();
        });

        excerptInput.addEventListener('input', updateSeoPreview);

        function generateSlug(text) {
            return text.toLowerCase()
                .replace(/[^a-z0-9 -]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim('-');
        }

        function updateSlugPreview() {
            const slug = slugInput.value || 'your-post-title';
            document.getElementById('slug-preview').textContent = '{{ url("/blog/") }}/' + slug;
        }

        function updateSeoPreview() {
            // Title
            const title = metaTitleInput.value || titleInput.value || 'Your Post Title';
            document.getElementById('seo-preview-title').textContent = title;

            // URL
            const slug = slugInput.value || generateSlug(titleInput.value) || 'your-post-title';
            document.getElementById('seo-preview-url').textContent = '{{ url("/blog/") }}/' + slug;

            // Description
            let description = metaDescInput.value;
            if (!description) {
                description = excerptInput.value;
            }
            if (!description && quill) {
                const bodyContent = quill.getText();
                description = bodyContent.substring(0, 160);
            }
            if (!description) {
                description = 'Your post description will appear here...';
            }
            document.getElementById('seo-preview-description').textContent = description;
        }

        // Image preview functionality
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // You can add image preview logic here if needed
                }
                reader.readAsDataURL(file);
            }
        });

        // Form submission handler to ensure Quill content is synced
        document.querySelector('form').addEventListener('submit', function(e) {
            // Force sync Quill content to textarea before submission
            bodyTextarea.value = quill.root.innerHTML;
        });

        // Initial SEO preview update
        updateSeoPreview();

        // FAQ functionality
        let faqIndex = 1;
        
        document.getElementById('add-faq').addEventListener('click', function() {
            const container = document.getElementById('faqs-container');
            const newFaq = document.createElement('div');
            newFaq.className = 'faq-item bg-gray-50 p-4 rounded-lg mb-4';
            newFaq.setAttribute('data-index', faqIndex);
            newFaq.innerHTML = `
                <div class="flex justify-between items-center mb-3">
                    <h4 class="text-sm font-medium text-gray-700">FAQ #${faqIndex + 1}</h4>
                    <button type="button" class="remove-faq text-red-600 hover:text-red-800 text-sm">
                        <i class="fas fa-trash"></i> Remove
                    </button>
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Question</label>
                    <input type="text" name="faqs[${faqIndex}][question]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:border-primary" placeholder="Enter FAQ question...">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Answer</label>
                    <textarea name="faqs[${faqIndex}][answer]" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:border-primary" placeholder="Enter FAQ answer..."></textarea>
                </div>
            `;
            container.appendChild(newFaq);
            faqIndex++;
            updateFaqNumbers();
        });

        // Remove FAQ functionality
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-faq') || e.target.parentElement.classList.contains('remove-faq')) {
                const faqItem = e.target.closest('.faq-item');
                const container = document.getElementById('faqs-container');
                if (container.children.length > 1) {
                    faqItem.remove();
                    updateFaqNumbers();
                } else {
                    alert('You must have at least one FAQ.');
                }
            }
        });

        function updateFaqNumbers() {
            const faqItems = document.querySelectorAll('.faq-item');
            faqItems.forEach((item, index) => {
                const title = item.querySelector('h4');
                title.textContent = `FAQ #${index + 1}`;
            });
        }
    });
</script>
@endsection