<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    /**
     * Funcion para regresar un array para armar un Select
     * @param $query
     * @param array $select
     * @param string $title
     * @return array
     */
    public function scopeArraySelect($query, $select = ['id','name'], $title='Seleccionar')
    {
        $dataKey = $select[0];
        $dataValue = $select[1];
        $models = $query->select([$dataKey,$dataValue])->get();
        $data = [''=>$title];
        foreach($models as $model)
        {
            $data = array_add($data,$model->$dataKey,$model->$dataValue);
        }
        return $data;
    }
}