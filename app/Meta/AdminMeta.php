<?php

namespace App\Meta;

/**
 * Used to store meta information about models and the tables that contain them, especially column
 * information.
 */
abstract class AdminMeta
{
	/**
	 * Provide an array of meta data about the columns editable in the CMS.
	 * No need to put all columns in here necessarily; these are just used to generate the add/edit
	 * form and to know what columns to log changes on.
	 *
	 * [REQUIRED] 'pretty' : The human readable name of the column.
	 * [REQUIRED] 'type': The form element to be used.
	 * [REQUIRED] 'attributes':  HTML attributes.
	 * [OPTIONAL] 'validate': Validation rules.
	 * [OPTIONAL] 'logChanges': Whether to log changes.
	 */
	abstract public function cols();

	public function indexURL()
	{
		return url('admin/' . $this->handle);
	}

	public function addURL()
	{
		return url('admin/' . $this->handle . '/add');
	}

	/**
	 * Compile the array of validation rules for usage in the validator.
	 * $id - The id of the row if updating; null if creating.
	 */
	public function validationRules($id = null)
	{
		$rules = [];
		foreach ($this->cols() as $colName => $col) {
			if (isset($col['validate'])) {
				// If we are *updating* a model, ensure unique constraint doesn't fail by using
				// the "except" feature of the validator.
				if ($id) {
					foreach ($col['validate'] as &$rule) {
						if (substr($rule, 0, 6) == 'unique') {
							$rule .= ',' . $id;
						}
					}
				}
				$rules[$colName] = implode('|', $col['validate']);
			}
		}
		return $rules;
	}

	/**
	 * Compile the array of validation attributes (pretty names) for usage in the validator.
	 */
	public function validationAttributes()
	{
		$attributes = [];
		foreach ($this->cols() as $colName => $col) {
			$attributes[$colName] = $col['pretty'];
		}
		return $attributes;
	}
}