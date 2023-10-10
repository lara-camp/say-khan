
@if(isset($patients))
    @if ($patients->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Current Situation</th>
                    <th>Remark</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($patients))
                    @foreach ($patients as $patient)
                    <tr>
                        <td>{{ $patient->patient->name }}</td>
                        <td>{{ $patient->currentsituation }}</td>
                        <td>{{ $patient->remark }}</td>
                    </tr>
                    @endforeach
                @else
                    <tr>Blank</tr>
                @endif
            </tbody>
        </table>
    @else
    <div class="record">No records found.</div>
    @endif
@else
    <tr>Blank</tr>
@endif
