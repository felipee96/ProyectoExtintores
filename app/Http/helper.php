<?php

function Categoria()
{
    return App\Models\Categoria::select('id','nombre_categoria')->get();
}
function SubCategoria()
{
    return App\Models\SubCategoria::select('id', 'nombre_subCategoria', 'categoria_id', 'abreviacion')->get();
}
function Unidad()
{
    return App\Models\UnidadMedida::select('id', 'unidad_medida', 'cantidad_medida', 'sub_categoria_id')->get();
}
function Empresa()
{
    return App\Models\Empresa::select('id', 'nombre_empresa', 'nit', 'direccion')->get();
}
function Encargado()
{
    return App\Models\Encargado::select('id', 'empresa_id', 'nombre_encargado', 'numero_celular', 'email', 'direccion', 'numero_serial')->get();
}
function Prueba()
{
 return App\Models\Prueba::select('id','nombre_prueba','abreviacion_prueba')->get();
}
function Fuga()
{
    return App\Models\Fuga::select('id', 'nombre_fuga', 'abreviacion_fuga')->get();
}
function cambioParte()
{
    return App\Models\CambioParte::select('id', 'nombre_parte_cambio', 'referencia')->get();
}
function Actividad()
{
    return App\Models\Actividad::select('id', 'nombre_actividad', 'abreviacion_actividad')->get();
}

