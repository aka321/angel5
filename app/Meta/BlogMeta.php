<?php

namespace App\Meta;

use App\User;

class BlogMeta extends AdminMeta
{
	public $Model    = 'App\Blog';
	public $singular = 'Blog';
	public $plural   = 'Blogs';
	public $handle   = 'blogs';

	// Default admin index order column.
	public $indexOrder = [
		'column'    => 'publish_date',
		'direction' => 'DESC',
	];

	// Columns used in the admin index.
	public $indexCols = [
		'title',
		'publish_date',
	];

	// Columns searchable in the admin index.
	public $searchCols = [
		'title',
		'slug',
		'plaintext',
	];

	/**
	 * Used to populate the 'author' dropdown menu.
	 * Cache the authors in a static variable so we don't keep hitting the database
	 * on subsequent calls to the method.
	 */
	private function authors()
	{
		static $authors = null;
		if ($authors == null) {
			$authors = [];
			foreach (User::where('type', 'admin')->get() as $user) {
				$authors[$user->id] = $user->fullName();
			}
		}
		return $authors;
	}

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
					'unique:blogs,slug',
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
			'author' => [
				'pretty'     => 'Author',
				'type'       => 'select',
				'options'    => $this->authors(),
				'attributes' => [
					'required',
				],
				'validate' => [
					'required',
				],
				'logChanges' => true,
			],
			'publish' => [
				'pretty'     => 'Show On Site (Visible)',
				'type'       => 'checkbox',
				'attributes' => [],
				'logChanges' => true,
			],
			'publish_date' => [
				'pretty'     => 'Publish Date and Time',
				'type'       => 'dateTime',
				'attributes' => [
					'required',
				],
				'validate' => [
					'required',
				],
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
