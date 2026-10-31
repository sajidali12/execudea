<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('id')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['slug'] = Str::slug($request->input('slug') ?: $data['name']);

        $request->merge(['slug' => $data['slug']]);
        $request->validate(['slug' => 'required|unique:services,slug']);

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully!');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        // Slug is not editable here: changing it would break live URLs.
        $service->update($this->validated($request));

        return redirect()->route('admin.services.edit', $service)->with('success', 'Service updated successfully!');
    }

    public function toggle(Service $service)
    {
        $service->update(['is_active' => !$service->is_active]);
        return redirect()->route('admin.services.index')->with('success', 'Service status updated successfully!');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'content' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
        ]);
        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
