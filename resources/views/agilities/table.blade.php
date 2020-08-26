<div class="table-responsive">
    <table class="table" id="agilities-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Costumer</th>
                <th>Status</th>

        </thead>
        <tbody>
            @foreach($agilities as $agility)
            <tr>
                <td>
                @if($agility->costumer == 'Agility')<b>@endif
                        {{ $agility->name }}
                @if($agility->costumer == 'Agility')</b>@endif
                </td>
                <td>
                @if($agility->costumer == 'Agility')<b>@endif
                    {{ $agility->email }}
                @if($agility->costumer == 'Agility')</b>@endif
                </td>
                <td>
                @if($agility->costumer == 'Agility')<b>@endif
                    {{ $agility->costumer }}</td>
                @if($agility->costumer == 'Agility')</b>@endif
                <td>
                @if($agility->costumer == 'Agility')<b>@endif
                    {{ $agility->status }}</td>
                @if($agility->costumer == 'Agility')</b>@endif
                <td>
                    {!! Form::open(['route' => ['agilities.destroy', $agility->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('agilities.show', [$agility->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
                @if($agility->costumer == 'Agility')</b>@endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
