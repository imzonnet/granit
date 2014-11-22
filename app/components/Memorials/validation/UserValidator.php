<?php namespace Components\Memorials\Validation;

use Services\Validation\Validator as Validator;

class UserValidator  extends Validator{

	/**
     * Default rules
     * @var array
     */
    protected $rules = array(
        'memorial_id'    => 'exists:granit_memorials,id',
        'user_id'       => 'exists:users,id'
    );

    /**
     * Default rules for update
     * @var array
     */
    protected $updateRules = array(
        'memorial_id'    => 'exists:granit_memorials,id',
        'user_id'       => 'exists:users,id'
    );

    /**
     * Messages for validation
     * @var array
     */
    protected $message = array(
    );

    public function validateForCreation($input)
    {
        return $this->validate($input, $this->rules, $this->message);
    }
    public function validateForUpdate($input)
    {
        return $this->validate($input, $this->updateRules, $this->message);
    }

}