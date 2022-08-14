<div class="mb-3">
    <label class="form-label">Tarefa</label>
    <input type="text" class="form-control" value="{{$tarefa->tarefa ?? old('tarefa')}}" name="tarefa">
</div>
<div class="mb-3">
    <label class="form-label">Data limite conclusão</label>
    <input type="date" class="form-control" value="{{$tarefa->data_limite_conclusao ?? old('data_limite_conclusao')}}" name="data_limite_conclusao">
</div>
<br>

