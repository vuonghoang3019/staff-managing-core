<?php

namespace Support\Traits;

trait ObjectSetProperties
{
    /**
     * @param $object
     * @return void
     */
    private function setProperties($object): void
    {
        $properties = get_object_vars($this);

        foreach ($properties as $property => $val) {
            if (is_null($object)) continue;

            try {
                $this->{$property} = $object->{$property};
            } catch (\Exception $ex) {
                try {
                    $this->{$property} = $object[$property];
                } catch (\Exception $ex) {
                    continue;
                }
            }
        }
    }
}