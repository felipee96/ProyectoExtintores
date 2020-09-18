<?php

function Categoria()
{
    return App\Models\Categoria::select('id','nombre_categoria')->paginate(5);
}
