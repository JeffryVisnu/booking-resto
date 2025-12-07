<!-- Page Content -->
<main class="text-gray-200">
    <style>
        /* TEXTBOX COKLAT */
        input[type="text"],
        input[type="email"],
        input[type="password"],
        select,
        textarea {
            background-color: #4a3520 !important; /* Coklat gelap */
            border: 1px solid #6b4b32 !important;
            color: #f3e8d9 !important; /* teks lebih terang */
        }

        /* Placeholder lebih kuat */
        input::placeholder,
        textarea::placeholder {
            color: #f5d7b3 !important;
            opacity: 1; /* biar ga transparan */
            font-weight: 600;
        }

        /* Fokus lebih jelas */
        input:focus,
        select:focus,
        textarea:focus {
            border-color: #d9a673 !important;
            box-shadow: 0 0 5px #d9a673;
        }
    </style>

    {{ $slot }}
</main>
