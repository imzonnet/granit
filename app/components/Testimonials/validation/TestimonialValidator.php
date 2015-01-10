<?php namespace Components\Testimonials\Validation;

use Services\Validation\Validator as Validator;

class TestimonialValidator extends Validator {

	/**
     * Default rules
     * @var array
     */
    protected $rules = array(
        'name'     		=> 'required|regex:/^[a-zA-Z0-9\-\.\s\?\{\}\(\)ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$/',
        'title'     		=> 'required|regex:/^[a-zA-Z0-9\-\.\s\?\{\}\(\)ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$/',
        'description'		=> 'required',
        'rate'                 => 'required|alpha_num|between:1,5',
    );

    /**
     * Default rules for update
     * @var array
     */
    protected $updateRules = array(
        'name'     		=> 'required|regex:/^[a-zA-Z0-9\-\.\s\?\{\}\(\)ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$/',
        'title'     		=> 'required|regex:/^[a-zA-Z0-9\-\.\s\?\{\}\(\)ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$/',
        'description'		=> 'required',
        'rate'                 => 'required|alpha_num|between:1,5',
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