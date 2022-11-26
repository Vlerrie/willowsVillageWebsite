<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UniqueIgnoreEmpty implements Rule
{
    private $tableName;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($tableName)
    {
        $this->tableName = $tableName;
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
        $exists = DB::connection('mysql')
            ->table($this->tableName)
            ->whereNotNull($attribute)
            ->where($attribute, $value)
            ->exists();

        return !$exists;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This :attribute has already been taken.';
    }
}
