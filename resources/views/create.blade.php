<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Country</title>
</head>

<body>
    <h1>Select a Country</h1>

    <form action="{{ route('country.Details', ['name']) }}" method="post">
        @csrf
        <label for="country">Choose a country:</label>
        <select name="country" id="country">
            @foreach ($countries as $country)
                <option value="{{ $country['name']['common'] }}">{{ $country['name']['common'] }}</option>
            @endforeach
        </select>
        <button type="submit">Submit</button>
        {{-- {{ dd($countries) }}  --}}
    </form>
</body>

</html>
