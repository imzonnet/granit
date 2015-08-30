<?php namespace Components\Blocks\Validation;

use Services\Validation\Validator as Validator;

class BlockTranslateValidator extends Validator {

	/**
     * Default rules
     * @var array
     */
    protected $rules = array(
        'title'                  => 'required',
        'description'                  => 'required',
        'language'                  => 'required',
    );

    /**
     * Default rules for update
     * @var array
     */
    protected $updateRules = array(
        'title'                  => 'required',
        'description'                  => 'required',
        'language'                  => 'required',
    );

    /**
     * Messages for validation
     * @var array
     */
    protected $message = array();
    public function validateForCreation($input)
    {
        return $this->validate($input, $this->rules, $this->message);
    }
    
    public function validateForUpdate($input)
    {
        return $this->validate($input, $this->updateRules, $this->message);
    }

}