<?php

function Categoria()
{
    return App\Models\Categoria::select('id','nombre_categoria')->paginate(5);
}
function SubCategoria()
{
    return App\Models\SubCategoria::select('id', 'nombre_subCategoria', 'categoria_id', 'abreviacion')->paginate(5);
}
function Unidad()
{
    return App\Models\UnidadMedida::select('id', 'unidad_medida', 'cantidad_medida', 'sub_categoria_id')->paginate(5);
}
