<h1>Listagem dos Suportes</h1>
<a href="{{route('supports.create')}}">Criar Dúvida</a>

<table>
    <thead>
        <th>assunto</th>
        <th>status</th>
        <th>descrição</th>
        <th></th>
    </thead>

    <tbody>

        @foreach ($supports as $support)
            <tr>
                <td>{{ $support->subject }}</td>
                <td>{{ $support->status}}</td>
                <td>{{$support->body }}</td>
                <td> 
                    <a href="{{route('supports.show', $support->id)}}">Ir</a>
                    <a href="{{route('supports.edit', $support->id)}}">Editar</a>
                   
                </td>
                
            </tr>
        @endforeach

    </tbody>
</table>