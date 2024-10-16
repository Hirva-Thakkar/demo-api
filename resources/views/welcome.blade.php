<head>
    <style>
        .custom-button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .custom-button:hover {
            background-color: #0056b3;
        }

        .button-container {
            display: flex;
            justify-content: center;
            /* Center the buttons horizontally */
            gap: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="button-container">
        <a href="{{ route('country.create') }}" style="text-decoration: none;">
            <button type="button" class="custom-button">Find a Country</button>
        </a>
        <a href="{{ route('currency.create') }}" style="text-decoration: none;">
            <button type="button" class="custom-button">Currency</button>
        </a>
    </div>
</body>
