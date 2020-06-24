<?php

namespace App\Traits;
use \Illuminate\Database\Eloquent\Builder;


/**
 *  solve conflict  for composite key
 */
trait HasCompositePrimaryKey
{
    /**
     * Set the keys for a save update query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
        $keys = $this->getKeyName();
        if(!is_array($keys)){
            return parent::setKeysForSaveQuery($query);
        }
    
        foreach($keys as $keyName){
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }
    
        return $query;
    }
    
    /**
     * Get the primary key value for a save query.
     *
     * @param mixed $keyName
     * @return mixed
     */
    protected function getKeyForSaveQuery($keyName = null)
    {
        if(is_null($keyName)){
            $keyName = $this->getKeyName();
        }
    
        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }
    
        return $this->getAttribute($keyName);
    }


    protected static function find($id, $columns = ['*'])
    {
        $me = new self;
        $query = $me->newQuery();
        $i=0;

        foreach ($me->getKeyName() as $key) {
            $query->where($key, '=', $id[$i]);
            $i++;
        }

        return $query->first($columns);
    }
}


?>