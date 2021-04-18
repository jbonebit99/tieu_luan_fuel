<?php

use Fuel\Core\Lang;

\Lang::load('pagination');

return array(
	'active' => 'default',
	'default' =>
	array(
		'wrapper' =>
		'<div class="pagination-container margin-top-20">
			<nav class="pagination">
				<ul>
					{pagination}
				</ul>
			</nav>
			<nav class="pagination-next-prev">
				<ul>
					{_pagination}
				</ul>
			</nav>
		</div>',
		'first' =>
		'<span class="first">
				{link}
			</span>',
		'first-marker' => '&laquo;&laquo;',
		'first-link' => '<a href="{uri}">{page}</a>',
		'first-inactive' => '',
		'first-inactive-link' => '',
		'previous' =>'<li>{link}</li>',
		'previous-marker' => Lang::get('previous'),
		'previous-link' => '<a href="{uri}" class = "prev">{page}</a>',
		'previous-inactive' =>'<li>{link}</li>',
		'previous-inactive-link' => '<a href="javascript:void(0)" class = "prev">{page}</a>',
		'regular' =>'<li>{link}</li> ',
		'regular-link' => '<a href="{uri}">{page}</a>',
		'active' => '<li>{link}</li> ',
		'active-link' => '<a href="#" class = "current-page">{page}</a>',
		'next' =>'<li>{link}</li>',
		'next-marker' => Lang::get('next'),
		'next-link' => '<a href="{uri}" class = "next">{page}</a>',
		'next-inactive' => '<li>{link}</li>',
		'next-inactive-link' => '<a href="javascript:void(0)" class = "next" >{page}</a>',
		'last' => '<li>{link}</li>',
		'last-marker' => '&raquo;&raquo;',
		'last-link' => '<a href="{uri}">{page}</a>',
		'last-inactive' => '',
		'last-inactive-link' => '',
	),
	'bootstrap3' =>
	array(
		'wrapper' => '<nav aria-label="Page navigation">
	<ul class="pagination">
	{pagination}
	</ul>
	</nav>
',
		'first' => '
		<li>{link}</li>',
		'first-marker' => '<span aria-hidden="true">&laquo;&laquo;</span>',
		'first-link' => '<a href="{uri}">{page}</a>',
		'first-inactive' => '',
		'first-inactive-link' => '',
		'previous' => '
		<li>{link}</li>',
		'previous-marker' => '<span aria-hidden="true">&laquo;</span>',
		'previous-link' => '<a href="{uri}" aria-label="Previous">{page}</a>',
		'previous-inactive' => '
		<li class="disabled">{link}</li>',
		'previous-inactive-link' => '<a href="#" aria-label="Previous">{page}</a>',
		'regular' => '
		<li>{link}</li>',
		'regular-link' => '<a href="{uri}">{page}</a>',
		'active' => '
		<li class="active">{link}</li>',
		'active-link' => '<a href="#">{page} <span class="sr-only">(current)</span></a>',
		'next' => '
		<li>{link}</li>',
		'next-marker' => '<span aria-hidden="true">&raquo;</span>',
		'next-link' => '<a href="{uri}" aria-label="Next">{page}</a>',
		'next-inactive' => '
		<li class="disabled">{link}</li>',
		'next-inactive-link' => '<a href="#" aria-label="Next">{page}</a>',
		'last' => '
		<li>{link}</li>',
		'last-marker' => '<span aria-hidden="true">&raquo;&raquo;</span>',
		'last-link' => '<a href="{uri}">{page}</a>',
		'last-inactive' => '',
		'last-inactive-link' => '',
	),
	'bootstrap2' =>
	array(
		'wrapper' => '<div class="pagination">
	<ul>{pagination}
	</ul>
</div>
',
		'first' => '
		<li>{link}</li>',
		'first-marker' => '&laquo;&laquo;',
		'first-link' => '<a href="{uri}">{page}</a>',
		'first-inactive' => '',
		'first-inactive-link' => '',
		'previous' => '
		<li>{link}</li>',
		'previous-marker' => '&laquo;',
		'previous-link' => '<a href="{uri}" rel="prev">{page}</a>',
		'previous-inactive' => '
		<li class="disabled">{link}</li>',
		'previous-inactive-link' => '<a href="#" rel="prev">{page}</a>',
		'regular' => '
		<li>{link}</li>',
		'regular-link' => '<a href="{uri}">{page}</a>',
		'active' => '
		<li class="active">{link}</li>',
		'active-link' => '<a href="#">{page}</a>',
		'next' => '
		<li>{link}</li>',
		'next-marker' => '&raquo;',
		'next-link' => '<a href="{uri}" rel="next">{page}</a>',
		'next-inactive' => '
		<li class="disabled">{link}</li>',
		'next-inactive-link' => '<a href="#" rel="next">{page}</a>',
		'last' => '
		<li>{link}</li>',
		'last-marker' => '&raquo;&raquo;',
		'last-link' => '<a href="{uri}">{page}</a>',
		'last-inactive' => '',
		'last-inactive-link' => '',
	),
);

/* End of file pagination.php */
