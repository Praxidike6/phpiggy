<?php

declare(strict_types=1);

namespace App\Middleware;


use Framework\Contracts\MiddlewareInterface;
use Framework\Exceptions\ValidationException;


class ValidationExceptionMiddleware implements MiddlewareInterface
{

    public function process(callable $next)
    {
        try
        {
            $next();
        }
        catch (ValidationException $e)
        {
            $oldFormData = $_POST;

            $excludedFields = ['password', 'confirmPassword'];

            #remove any excluded fields from the form data
            $formattedFormData = array_diff_key(
                $oldFormData,
                array_flip($excludedFields)
            );
            # write the errors to the session
            $_SESSION['errors'] = $e->errors;
            # store form data in the session
            $_SESSION['oldFormData'] =  $formattedFormData;
            # get the url of where the form was submitted
            $referer = $_SERVER['HTTP_REFERER'];
            #if a validation error, redirect to the registraction page
            redirectTo($referer);
        }
    }
}
