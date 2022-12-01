<?php

namespace App\Core\General\Helpers;

/**
 * Class CallableTrait.
 *
 */
trait WhereTrait
{
    public function deleteWhereIn($field, $value)
    {
        return $this->model->whereIn($field, $value)->delete();
    }

    /**
     * @param array $attr
     * @param string $field
     * @param array $condition
     */
    public function updateWhereIn(array $attr, string $field, array $condition)
    {
        $this->applyCriteria();
        $this->model->whereIn($field, $condition)->update($attr);
    }
}
