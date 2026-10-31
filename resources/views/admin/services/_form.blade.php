@php $service = $service ?? null; @endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name <span class="text-red-500">*</span></label>
        <input type="text" id="name" name="name" value="{{ old('name', $service?->name) }}" required
               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror">
        @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">URL Slug</label>
        @if($service)
            <input type="text" id="slug" value="{{ $service->slug }}" disabled
                   class="w-full px-3 py-2 border border-gray-200 rounded-lg bg-gray-100 text-gray-500">
            <p class="text-sm text-gray-500 mt-1">Fixed so existing links keep working.</p>
        @else
            <input type="text" id="slug" name="slug" value="{{ old('slug') }}" placeholder="Leave empty to generate from name"
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('slug') border-red-500 @enderror">
            @error('slug')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        @endif
    </div>

    <div class="md:col-span-2">
        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
        <textarea id="description" name="description" rows="3" maxlength="500"
                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror">{{ old('description', $service?->description) }}</textarea>
        <p class="text-sm text-gray-500 mt-1">Shown in the page hero and used as the meta description.</p>
        @error('description')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div class="md:col-span-2">
        <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">Icon path</label>
        <input type="text" id="icon" name="icon" value="{{ old('icon', $service?->icon) }}" placeholder="img/tech/payload.png"
               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('icon') border-red-500 @enderror">
        @error('icon')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div class="md:col-span-2">
        <div class="flex justify-between items-end mb-2">
            <label for="content" class="block text-sm font-medium text-gray-700">Page Content (HTML)</label>
            <button type="button" onclick="insertFaqTemplate()" class="text-sm text-blue-600 hover:text-blue-800">
                <i class="fas fa-plus mr-1"></i>Insert FAQ section
            </button>
        </div>
        <textarea id="content" name="content" rows="24"
                  class="w-full px-3 py-2 border border-gray-300 rounded-lg font-mono text-xs focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('content') border-red-500 @enderror">{{ old('content', $service?->content) }}</textarea>
        <p class="text-sm text-gray-500 mt-1">
            Service cards, FAQs and any other sections shown below the hero. A section headed
            "Frequently Asked Questions" also turns on the FAQ rich-results markup for this page.
        </p>
        @error('content')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div class="md:col-span-2">
        <div class="flex items-center">
            <input type="checkbox" id="is_active" name="is_active" value="1"
                   {{ old('is_active', $service?->is_active ?? true) ? 'checked' : '' }}
                   class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
            <label for="is_active" class="ml-2 text-sm text-gray-700">Active (page is live on the website)</label>
        </div>
    </div>
</div>

<template id="faq-template">
<section class="py-20 bg-gray-50/30">
    <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-medium font-futura-bold mb-4">Frequently Asked Questions</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">Get answers to common questions about our services</p>
        </div>
        <div class="max-w-4xl mx-auto">
            <div class="space-y-4">
                <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
                    <div class="px-6 py-4">
                        <h3 class="text-lg font-semibold text-gray-900">Question goes here?</h3>
                        <p class="text-gray-600 leading-relaxed mt-2">Answer goes here.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</template>

<script>
function insertFaqTemplate() {
    const box = document.getElementById('content');
    const tpl = document.getElementById('faq-template').innerHTML.trim();
    box.value = box.value.trimEnd() + (box.value.trim() ? '\n\n' : '') + tpl + '\n';
    box.focus();
    box.scrollTop = box.scrollHeight;
}
</script>
