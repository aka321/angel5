<?php

namespace App\Meta;

class UserMeta extends AdminMeta
{
	public $Model    = 'App\User';
	public $singular = 'User';
	public $plural   = 'Users';
	public $handle   = 'users';

	// Default admin index order column.
	public $indexOrder = [
		'column'    => 'id',
		'direction' => 'ASC',
	];

	// Columns used in the admin index.
	public $indexCols = [
		'id',
		'type',
		'email',
		'first_name',
		'last_name',
		'created_at',
	];

	// Columns searchable in the admin index.
	public $searchCols = [
		'first_name',
		'last_name',
		'email',
	];

	/**
	 * No need to put all columns in here necessarily; these are just used to generate the add/edit
	 * form and to know what columns to log changes on.
	 */
	public function cols()
	{
		return [
			'id' => [
				'pretty' => 'ID',
				'type'   => 'text',
				'attributes' => [
					'disabled',
				],
			],
			'type' => [
				'pretty' => 'Type',
				'type'   => 'select',
				'options' => [
					'user'  => 'User',
					'admin' => 'Administrator',
				],
				'attributes' => [
					'required',
				],
			],
			'email' => [
				'pretty' => 'Email',
				'type'   => 'text',
				'attributes' => [
					'required',
				],
				'validate' => [
					'required',
					'email',
				],
			],
			'first_name' => [
				'pretty' => 'First Name',
				'type'   => 'text',
				'attributes' => [],
			],
			'last_name' => [
				'pretty' => 'Last Name',
				'type'   => 'text',
				'attributes' => [],
			],
			'nickname' => [
				'pretty' => 'Nickname',
				'type'   => 'text',
				'attributes' => [
					'required'
				],
				'validate' => [
					'required',
					'unique:users,nickname',
				],
			],
			'url' => [
				'pretty' => 'URL',
				'type'   => 'text',
				'attributes' => [],
			],
			'role' => [
				'pretty' => 'Role',
				'type'   => 'select',
				'options' => [
					''                 => '',
					'Administrator'    => 'Administrator',
					'Community Member' => 'Community Member',
					'Other'            => 'Other',
					'Parent/Guardian'  => 'Parent/Guardian',
					'School Board'     => 'School Board',
					'Staff'            => 'Staff',
					'Student'          => 'Student',
					'Teacher'          => 'Teacher',
				],
				'attributes' => [],
			],
			'state_id' => [
				'pretty' => 'State ID',
				'type'   => 'text',
				'attributes' => [
					'disabled',
				],
			],
			'county_id' => [
				'pretty' => 'County ID',
				'type'   => 'text',
				'attributes' => [
					'disabled',
				],
			],
			'district_id' => [
				'pretty' => 'District ID',
				'type'   => 'text',
				'attributes' => [
					'disabled',
				],
			],
			'pta_district_id' => [
				'pretty' => 'PTA District ID',
				'type'   => 'text',
				'attributes' => [
					'disabled',
				],
			],
			'updated_at' => [
				'pretty'     => 'Updated At',
				'type'       => 'text',
				'attributes' => [
					'disabled',
				],
			],
			'created_at' => [
				'pretty'     => 'Created At',
				'type'       => 'text',
				'attributes' => [
					'disabled',
				],
			],
		];
	}
}
