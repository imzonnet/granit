<?php namespace Components\Products\Validation;

use Services\Validation\Validator as Validator;

class ProductValidator extends Validator {

	/**
     * Default rules
     * @var array
     */
    protected $rules = array(
        'name'     		=> 'required|regex:/^[a-zA-Z0-9\-\.\s\?\{\}\(\)ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$/',
        'product_code'          => 'required|unique:granit_products,product_code',
        'cat_id'		=> 'required|alpha_num',
        'image'                 => 'required',
        'alias' 		=> 'regex:/^[a-z0-9\-]*$/|unique:granit_products,alias',
    );

    /**
     * Default rules for update
     * @var array
     */
    protected $updateRules = array(
        'name'     		=> 'required|regex:/^[a-zA-Z0-9\-\.\s\?\{\}\(\)ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$/',
        'product_code'          => 'required|unique:granit_products,product_code',
        'cat_id'		=> 'required|alpha_num',
        'alias' 		=> 'regex:/^[a-z0-9\-]*$/|unique:granit_products,alias',
    );

    /**
     * Messages for validation
     * @var array
     */
    protected $message = array(
        'alias.unique' => 'The alias has already been taken',
        'cat_id.required' => 'The category must required',
        'product_code.unique' => 'The product code has already been taken',
    );
    public function validateForCreation($input)
    {
        return $this->validate($input, $this->rules, $this->message);
    }
    
    public function validateForUpdate($input)
    {
        $this->updateRules['alias'] .= ',' . $input['id'];
        $this->updateRules['product_code'] .= ',' . $input['id'];

        return $this->validate($input, $this->updateRules, $this->message);
    }

}