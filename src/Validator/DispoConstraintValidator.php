<?php
namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class DispoConstraintValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if ($value !== 0 && $value !== 1) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}
