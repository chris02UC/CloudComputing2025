<x-layouts.app>
    <x-slot:title>Admin Dashboard</x-slot:title>

    <div class="container mx-auto px-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-800">Form Submissions</h2>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-2 font-bold text-white bg-red-600 rounded-md hover:bg-red-700">Logout</button>
            </form>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Subject</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Content</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Appt. Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Personal Code</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Received</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($submissions as $submission)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $submission->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $submission->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $submission->subject }}</td>
                            <td class="px-6 py-4 whitespace-normal text-sm">{{ $submission->content }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $submission->appointment_date ? \Carbon\Carbon::parse($submission->appointment_date)->format('d M Y') : 'N/A' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $submission->personal_code ?? 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $submission->created_at->format('d M Y, H:i') }}</td>
                        </tr>
                    @empty
                        <tr>

                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No submissions yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>