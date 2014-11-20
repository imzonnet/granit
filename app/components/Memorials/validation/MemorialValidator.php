<?php namespace Components\Memorials\Validation;

use Services\Validation\Validator as Validator;

class MemorialValidator extends Validator{

	/**
     * Default rules
     * @var array
     */
    protected $rules = array(
        'name'          => 'required|regex:/^[a-zA-Z0-9\-\s\?\{\}\(\)ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$/',
        'image'        => 'required',
        'birthday'      => 'required',
        'death'         => 'required',
    );

    /**
     * Default rules for update
     * @var array
     */
    protected $updateRules = array(
        'name'          => 'required|regex:/^[a-zA-Z0-9\-\s\?\{\}\(\)ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$/',
        'birthday'      => 'required',
        'death'         => 'required',
        'image'         => 'required'
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