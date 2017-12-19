<?php 

namespace App\Traits;

use Exception;
use Validator;
use App\Exceptions\InsufficientValidationRulesException;
use App\Exceptions\ValidationFailedException;
use Illuminate\Http\Request;

/**
 * ValidationTrait provides with various validation
 * rules already defined for
 * known fields like email,phone,name,etc.
 * If no validation rules are found for given field
 * an Exception is generated
 */
trait ValidationTrait 
{
    /**
     * Some predefined rules for validation
     *
     * @var array
     */
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|string',
    ];

    /**
     * Validates the request parameters and throws
     * all errors
     *
     * @param Request $request
     * @param array $fields
     * @param array $rules
     * @param array $message
     * @return void
     */
    public function validateInput(array $fields, $rules = null, $message = null)
    {
        // Generate the required rules
        $requiredRules = $this->generateRules($fields, $rules);

        //Perform validation     
        $validator = $this->validator($fields, $requiredRules, $message);
        
        if ($validator->fails()) {
            
            throw new ValidationFailedException($validator->errors()->all());
        }
    }

    /**
     * Creates a validator with specified rules
     *
     * @param array $fields
     * @param array $rules
     * @return void
     */
    protected function validator(array $fields,array $rules, $message=null)
    {
        if ($message === null) {
            $message = [];
        }
        return Validator::make(
            $fields ,
            $rules ,
            $message
        );

    }

    /**
     * Returns the required rules from the user defined and
     * trait defined rules
     * User defined rules overwrites the trait defined rules
     *
     * @param array $fields
     * @param array $rules
     * @return void
     */
    protected function generateRules(array $fields, $rules)
    {
        if ($rules === null) {
            $rules = [];
        }
        // Extract only the required rules from predefined rules
        $traitRules = array_diff_key($this->rules, array_keys($fields));

        //Overwrite traitRules
        $requiredRules = array_merge($traitRules, $rules);
        
        //Check if all fields have rules or not
        $fieldsWithoutRules = array_diff_key($fields, $requiredRules);

        if (count($fieldsWithoutRules)>0) {
            
            throw new InsufficientValidationRulesException(array_keys($fieldsWithoutRules));
        }

        return $requiredRules;
    }
}
