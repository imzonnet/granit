<?php namespace Components\Products\Validation;

use Services\Validation\Validator as Validator;

class CategoryValidator extends Validator {

	/**
     * Default rules
     * @var array
     */
    protected $rules = array(
        'name'     => 'required|regex:/^[a-zA-Z0-9\-\s\?\{\}\(\)ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$/',
        'alias' => 'regex:/^[a-z0-9\-]*$/|unique:granit_product_categories,alias',
    );

    /**
     * Default rules for update
     * @var array
     */
    protected $updateRules = array(
        'name'     => 'required|regex:/^[a-zA-Z0-9\-\s\?\{\}\(\)ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$/',
        'alias' => 'regex:/^[a-z0-9\-]*$/|unique:granit_product_categories,alias',
    );

    /**
     * Messages for validation
     * @var array
     */
    protected $message = array(
        'alias.unique' => 'The alias has already been taken'
    );

    public function validateForUpdate($input)
    {
        $this->updateRules['alias'] .= ',' . $input['id'];

        return $this->validate($input, $this->updateRules, $this->message);
    }

}