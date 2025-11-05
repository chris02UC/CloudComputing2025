<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Contact Form' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
<body class="bg-gray-100">

    <x-header />

    <main class="flex items-center justify-center py-12">
        {{ $slot }}
    </main>
    
    <script>
  flatpickr(".date-picker", {
    dateFormat: "Y-m-d", // Format matching MySQL DATE type
    altInput: true,     // Show a human-friendly format to the user
    altFormat: "F j, Y",
    });
    </script>
</body>
</html>