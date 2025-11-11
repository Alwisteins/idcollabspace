<div>
    <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Confirm Your Information</h2>

    <ul class="text-gray-700 dark:text-gray-200 space-y-3">
        <li><strong>Name:</strong> {{ $name }}</li>
        <li><strong>Location:</strong> {{ $location }}</li>
        <li><strong>Description:</strong> {{ $description }}</li>
        <li><strong>Roles:</strong>
            @foreach ($selectedRoles as $roleId)
                <span
                    class="inline-block bg-blue-100 text-blue-700 text-sm px-2 py-1 rounded">{{ $this->getRoleName($roleId) }}</span>
            @endforeach
        </li>
    </ul>
</div>
