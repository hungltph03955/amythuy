<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CategoryCannotParentItSelf implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $category_id;

    public function __construct($category_id)
    {
        $this->category_id = $category_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->category_id == 0) {
            return true;
        } else {
            $id = DB::table('categories')->where('id', $this->category_id)->pluck('id');
            if ((int)$value == $id[0]) {
                return false;
            }
            return true;
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Không dùng danh mục đó làm danh mục lớn';
    }
}
