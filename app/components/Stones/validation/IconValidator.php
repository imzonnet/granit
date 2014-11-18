<?php
namespace Components\Stones\Validation;

use Services\Validation\Validator as Validator;

class IconValidator extends Validator{

	/**
     * Default rules
     * @var array
     */
    protected $rules = array(
        'name'     		=> 'required|regex:/^[a-zA-Z0-9\-\s\?\{\}\(\)ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$/',
        'image' 		=> 'required',
        'cat_id'		=> 'required|exists:granit_icon_categories,id',
    );

    /**
     * Default rules for update
     * @var array
     */
    protected $updateRules = array(
        'name'     		=> 'required|regex:/^[a-zA-Z0-9\-\s\?\{\}\(\)ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$/',
        'cat_id'		=> 'required',
    );

    /**
     * Messages for validation
     * @var array
     */
    protected $message = array(
    	'cat_id.required' => 'The category must required',
        'cat_id.exists' => 'The category must required'
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