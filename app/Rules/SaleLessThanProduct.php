<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;


class SaleLessThanProduct implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $product_id;
    public function __construct($product_id)
    {
        $this->product_id = $product_id;
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
        $price = DB::table('products')->where('id', $this->product_id)->pluck('price');
        if((int)$value > $price['0'])
        {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Giá bán không được lớn hơn giá niêm yết.';
    }
}
