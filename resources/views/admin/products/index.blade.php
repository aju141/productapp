<x-app-layout>

    <div class="mx-auto py-6 sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 border-b border-gray-200">
                <div class="text-2xl">
                    Product List
                </div>
                <div class="relative">
            <input type="text" id="search" placeholder="Search products..." class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-64 px-3 py-1">
            <button id="searchBtn" class="absolute right-0 top-0 mt-3 mr-4">Search</button>
        </div>
                <div class="text-right">
                    <a href="{{ route('products.create') }}" class="inline-block px-4 py-2 mb-4 text-2xl font-semibold bg-green-500 rounded hover:bg-green-600">
                        Add New Product
                    </a>
                </div>
               
            </div>

            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
               

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Link
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($products as $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img src="{{ asset('/Product-images') }}/{{ $product->product_image }}" class="w-24 h-24">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $product->product_title }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $product->product_description }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $product->product_cat }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ $product->product_link_url }}" class="text-blue-600 hover:underline">{{ $product->product_link_url }}</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $product->product_price }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex justify-start space-x-4">
                                        <a href="{{ route('products.show', $product->id) }}" class="inline-block px-3 py-1 text-sm font-semibold leading-5 text-blue-600 bg-blue-200 rounded hover:bg-blue-300">
                                            Show
                                        </a>
                                        <a href="{{ route('products.edit', $product->id) }}" class="inline-block px-3 py-1 text-sm font-semibold leading-5 text-green-600 bg-green-200 rounded hover:bg-green-300">
                                            Edit
                                        </a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Do you want to delete this product?');" class="inline-block px-3 py-1 text-sm font-semibold leading-5 text-red-600 bg-red-200 rounded hover:bg-red-300">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-red-600">No Product Found!</span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <!-- Pagination Links -->
                <div class="px-6 py-4 flex items-center justify-between">
                    <div>
                        <span class="text-sm text-gray-700">
                            Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} entries
                        </span>
                    </div>
                    <div>
                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                            <!-- Previous Button -->
                            @if ($products->onFirstPage())
                                <span class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500">
                                    <span class="sr-only">Previous</span>
                                    <!-- Heroicon name: solid/chevron-left -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M6.707 10l3.821-3.822a1 1 0 011.414 1.414L9.535 10l2.407 2.408a1 1 0 01-1.414 1.414L6.707 11.414a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            @else
                                <a href="{{ $products->previousPageUrl() }}" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                    <span class="sr-only">Previous</span>
                                    <!-- Heroicon name: solid/chevron-left -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M6.707 10l3.821-3.822a1 1 0 011.414 1.414L9.535 10l2.407 2.408a1 1 0 01-1.414 1.414L6.707 11.414a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            @endif

                            <!-- Page Numbers -->
                            @foreach(range(1, $products->lastPage()) as $page)
                                <a href="{{ $products->url($page) }}" class="{{ $page === $products->currentPage() ? 'bg-gray-300' : 'bg-white' }} relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium text-gray-700 hover:bg-gray-50">{{ $page }}</a>
                            @endforeach

                            <!-- Next Button -->
                            @if ($products->hasMorePages())
                                <a href="{{ $products->nextPageUrl() }}" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                    <span class="sr-only">Next</span>
                                    <!-- Heroicon name: solid/chevron-right -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M13.293 10l-3.822-3.822a1 1 0 011.414-1.414L14.464 10l-2.408 2.408a1 1 0 11-1.414-1.414L13.293 10z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            @else
                                <span class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500">
                                    <span class="sr-only">Next</span>
                                    <!-- Heroicon name: solid/chevron-right -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M13.293 10l-3.822-3.822a1 1 0 011.414-1.414L14.464 10l-2.408 2.408a1 1 0 11-1.414-1.414L13.293 10z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            @endif
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.getElementById('searchBtn').addEventListener('click', function () {
        var searchQuery = document.getElementById('search').value;
        window.location.href = "{{ route('products.index') }}" + "?search=" + searchQuery;
    });
</script>
</x-app-layout>
