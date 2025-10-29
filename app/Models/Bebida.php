<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bebida extends Model
{
    protected $table = 'bebida';

    protected $primaryKey = 'cd_bebida';

    public static function getRandomDrink()
    {
        $sql = <<<SQL
            SELECT b.*, 
                   ROUND(AVG(a.id_nota), 1) AS nota,
                   COUNT(a.id_nota) AS qt_avaliacao,
                   COALESCE((SELECT json_agg(i.nm_ingrediente)
                               FROM ingrediente AS i
                               JOIN bebida_ingrediente AS bi ON i.cd_ingrediente = bi.cd_ingrediente
                              WHERE bi.cd_bebida = b.cd_bebida), '[]') AS ingredientes_json
              FROM bebida AS b
              LEFT JOIN avaliacao AS a ON b.cd_bebida = a.cd_bebida
             GROUP BY b.cd_bebida, b.nm_bebida, b.ds_imagem, b.ds_preparo
             ORDER BY RANDOM()
             LIMIT 1
SQL;

        $bebida = DB::selectOne($sql);

        $bebida->ingredientes = json_decode($bebida->ingredientes_json, true);
        
        $bebida->preparo = implode("\n", array_map('trim', explode('.', $bebida->ds_preparo)));
        $bebida->preparo = array_filter(array_map('trim', explode("\n", $bebida->preparo)));

        unset($bebida->ingredientes_json);

        return $bebida;
    }
}
