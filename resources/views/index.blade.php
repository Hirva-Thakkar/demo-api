<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }
</style>
@foreach ($data as $value)
    {{-- {{ dd($value) }} --}}
    {{-- {{ dd($data)}} --}}
    <table>
        <thead>
            <tr>
                <th>Attribute</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><b>Name</b></td>
                <td>
                    @if (isset($value['name']['common']))
                        {{ $value['name']['common'] }}
                    @else
                        <p>No name Available</p>
                    @endif
                </td>
            </tr>
            <tr>
                <td><b>Official Name</b></td>
                <td>
                    @if (isset($value['name']['official']))
                        {{ $value['name']['official'] }}
                    @else
                        <p>No Official Name Available</p>
                    @endif
                </td>
            </tr>
            <tr>
                <td><b>Capital</b></td>
                <td>
                    @if (isset($value['capital']))
                        @foreach ($value['capital'] as $capital)
                            {{ $capital }}
                        @endforeach
                    @else
                        <p>No capital available</p>
                    @endif
                </td>
            </tr>
            <tr>
                <td><b>Region</b></td>
                <td>
                    @if (isset($value['region']))
                        {{ $value['region'] }}
                    @else
                        <p>No Region is available</p>
                    @endif
                </td>
            </tr>
            <tr>
                <td><b>Subregion</b></td>
                <td>
                    @if (isset($value['subregion']))
                        {{ $value['subregion'] }}
                    @else
                        <p>no subregion</p>
                    @endif
                </td>
            </tr>
            <tr>
                <td><b>Area</b></td>
                <td>
                    @if (isset($value['area']))
                        {{ $value['area'] }}
                    @else
                        <p>No area available</p>
                    @endif
                </td>
            </tr>
            <tr>
                <td><b>Population</b></td>
                <td>
                    @if (isset($value['population']))
                        {{ $value['population'] }}
                    @else
                        <p>No population available</p>
                    @endif
                </td>
            </tr>
            <tr>
                <td><b>Flag</b></td>
                {{-- <td><img src="{{ $value['flags']['png'] }}" alt="Flag" width="50"></td> --}}
                <td>
                    @if (isset($value['flags']['png']))
                        <img src="{{ $value['flags']['png'] }}" alt="Flag" width="50">
                    @else
                        <p>No flag available</p>
                    @endif
                </td>
            </tr>
            <tr>
                <td><b>Borders</b></td>
                <td>
                    @if (isset($value['borders']))
                        @foreach ($value['borders'] as $border)
                            {{ $border }}
                        @endforeach
                    @else
                        <p>No borders available</p>
                    @endif
                </td>
            </tr>
            <tr>
                <td><b>Language</b></td>
                <td>
                    @if (isset($value['languages']))
                        @foreach ($value['languages'] as $language)
                            {{ $language }}
                        @endforeach
                    @else
                        <p>No language available</p>
                    @endif
                </td>
            </tr>
            <tr>
                <td>Currency</td>
                <td>
                    @if (isset($value['currencies']))
                        @foreach ($value['currencies'] as $currency)
                            {{ $currency['name'] }} ({{ $currency['symbol'] }})
                        @endforeach
                    @else
                        <p>No currency available</p>
                    @endif
                </td>
            </tr>
            <tr>
                <td><b>Maps</b></td>
                <td>
                    @foreach ($value['maps'] as $map)
                        <a href="{{ $map }}" target="_blank">
                            {{ $map }}
                        </a>
                        {{-- <iframe
                            src="https://www.google.com/maps/place/Pakistan/@30.3629573,68.9966984,6z/data=!3m1!4b1!4m6!3m5!1s0x38db52d2f8fd751f:0x46b7a1f7e614925c!8m2!3d30.375321!4d69.345116!16zL20vMDVzYjE?entry=ttu&g_ep=EgoyMDI0MTAwOS4wIKXMDSoASAFQAw%3D%3D"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe> --}}
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>
@endforeach
