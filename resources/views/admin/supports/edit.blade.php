<h1>Dúvida {{$support->id}}</h1>

<form action="{{route('supports.update',$support->id)}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="subject" id="" placeholder="Assunto" value="{{$support->subject}}">
    <textarea name="body" id="" cols="30" rows="10" placeholder="Descrição">{{$support->body}}</textarea>
    <button type="submit">Enviar</button>
</form>

