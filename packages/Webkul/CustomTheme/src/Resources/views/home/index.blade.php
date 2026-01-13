<x-custom-theme::layouts.master>
    <x-slot:title>
        Custom Theme Home
    </x-slot>

    {{-- Hero Section --}}
    <div class="hero-section bg-gradient-to-r from-blue-600 to-purple-600 text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-6">
                🎨 Custom Theme Package
            </h1>

            <p class="text-xl mb-8 opacity-90">
                Professional theme development with modern asset bundling
            </p>

            <button class="bg-white text-blue-600 font-bold py-3 px-8 rounded-lg hover:bg-gray-100 transition duration-300">
                Explore Features
            </button>
        </div>
    </div>

    {{-- Content Section --}}
    <div class="container mx-auto mt-16 px-4 py-8">
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">
                <h3 class="text-xl font-semibold text-blue-600 mb-4">
                    📦 Package Structure
                </h3>
                <p class="text-gray-600">
                    Professional Laravel package organization with proper namespace and autoloading.
                </p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">
                <h3 class="text-xl font-semibold text-green-600 mb-4">
                    ⚡ Modern Assets
                </h3>

                <p class="text-gray-600">
                    Vite-powered asset compilation with Tailwind CSS and JavaScript bundling.
                </p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">
                <h3 class="text-xl font-semibold text-purple-600 mb-4">
                    🚀 Production Ready
                </h3>

                <p class="text-gray-600">
                    Optimized builds, hot reload development, and professional workflow.
                </p>
            </div>
        </div>
    </div>

    {{-- Feature Showcase --}}
    <div class="bg-gray-50 py-16 mt-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">
                    Complete Shop Foundation
                </h2>

                <p class="text-gray-600 max-w-2xl mx-auto">
                    Your custom theme now includes all shop assets and views, giving you complete control to customize any part of the storefront.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div>
                    <h3 class="text-2xl font-semibold mb-4">Full Asset Control</h3>

                    <ul class="space-y-2 text-gray-600">
                        <li>✅ Complete CSS foundation with Tailwind</li>
                        <li>✅ All JavaScript functionality included</li>
                        <li>✅ Shop components and layouts</li>
                        <li>✅ Images, fonts, and static assets</li>
                        <li>✅ Hot reload development workflow</li>
                    </ul>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <h4 class="font-semibold mb-3">Theme Package Structure</h4>

                    <pre class="text-sm text-gray-600 overflow-x-auto"><code>packages/Webkul/CustomTheme/
├── src/Resources/
│   ├── assets/     (complete shop assets)
│   └── views/      (complete shop views)
├── package.json
├── vite.config.js
└── tailwind.config.js</code></pre>
                </div>
            </div>
        </div>
    </div>
</x-custom-theme::layouts.master>

