@if($estado=='A')
<span class="label label-success">Activo</span> 
@elseif($estado=='I')
<span class="label label-danger">Inactivo</span> 
@else
<span class="label label-warning">Indefinido</span> 
@endif