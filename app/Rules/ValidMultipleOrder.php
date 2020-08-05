<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidMultipleOrder implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $max = sizeof($value);
        for($i=0; $i<$max; $i++){

            $values = explode("\n", $value[$i]);
            $max_info = sizeof($values);

            if($max_info != 7){
                //echo "order no ". $c = $i + 1 ." does not have 7 lines";
                return false;
            }

            else{
                $amount = (int)$values[3];
                $quantity = (int)$values[6];

                if (!is_numeric($amount) || $amount == 0) {
                    //echo "In order number ". $c = $i + 1 ." amount is not valid";
                    return false;
                }

                else if (!is_numeric($quantity) || $quantity == 0) {
                    //echo "In order number ". $c = $i + 1 ." quantity is not valid";
                    return false;
                }

                else{
                    return true;
                }
            }
      
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Multiple Order has some error. Make sure each parcel information have 7 line and amount and quantity should be numbers';
    }
}
