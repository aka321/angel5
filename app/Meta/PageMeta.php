<?php

namespace App\Meta;

class PageMeta extends AdminMeta
{
	public $Model    = 'App\Page';
	public $singular = 'Page';
	public $plural   = 'Pages';
	public $handle   = 'pages';

	// Default admin index order column.
	public $indexOrder = [
		'column'    => 'title',
		'direction' => 'ASC',
	];

	// Columns used in the admin index.
	public $indexCols = [
		'slug',
		'title',
		'updated_at',
	];

	// Columns searchable in the admin index.
	public $searchCols = [
		'title',
		'slug',
		'plaintext',
	];

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
			'slug' => [
				'pretty'   => 'Slug',
				'type'     => 'text',
				'attributes' => [
					'required',
				],
				'validate' => [
					'required',
					'alpha_dash',
					'unique:pages,slug',
				],
				'logChanges' => true,
			],
			'title' => [
				'pretty' => 'Title',
				'type'   => 'text',
				'attributes' => [
					'required',
				],
				'validate' => [
					'required',
				],
				'logChanges' => true,
			],
			'image' => [
				'pretty'     => 'Image',
				'type'       => 'image',
				'attributes' => [],
				'logChanges' => true,
			],
			'og_desc' => [
				'pretty'     => 'OG Description',
				'type'       => 'text',
				'attributes' => [],
				'validate' => [
					'max:300',
				],
				'logChanges' => true,
			],
			'html' => [
				'pretty'     => 'Content',
				'type'       => 'wysiwyg',
				'attributes' => [],
				'logChanges' => true,
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
