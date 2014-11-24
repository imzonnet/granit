<?php namespace Components\Memorials\Validation;

use Services\Validation\Validator as Validator;
use Input;
class UserValidator  extends Validator{

    /**
     * Default rules
     * @var array
     */
    protected $rules = array(
        'memorial_id'    => "required|unique:granit_memorial_users,memorial_id,NULL,id,user_id",
        'user_id'       => "required|unique:granit_memorial_users,user_id,NULL,id,memorial_id",
    );

    /**
     * Default rules for update
     * @var array
     */
    protected $updateRules = array(
        'memorial_id'    => "required",
        'user_id'       => "required",
    );

    /**
     * Messages for validation
     * @var array
     */
    protected $message = array(
        'memorial_id.unique' => '',
        'user_id.unique' => 'Memorial of the selected users selected user already exists'
    );

    public function validateForCreation($input)
    {
        $this->rules['memorial_id'] .= ',' . $input['user_id']; 
        $this->rules['user_id'] .= ',' . $input['memorial_id']; 
        return $this->validate($input, $this->rules, $this->message);
    }
    public function validateForUpdate($input)
    {
        return $this->validate($input, $this->updateRules, $this->message);
    }

}