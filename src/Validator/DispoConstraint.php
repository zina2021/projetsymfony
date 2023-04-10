<?php
namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class DispoConstraint extends Constraint
{
    public $message = 'La valeur du champ "dispo" doit être soit 0 soit 1.';

    public function validatedBy()
    {
        return \get_class($this).'Validator';
    }
}
