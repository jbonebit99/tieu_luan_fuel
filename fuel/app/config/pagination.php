<?php

return array(
    'active' => 'default',
    'default' =>
        array(
            'wrapper' => '<div class="pagination-container margin-top-20">{pagination}</div>',
            'first' => '<span class="first">{link}</span>',
            'first-marker' => 'Trang Đầu',
            'first-link' => '<a href="{uri}">{page}</a>',
            'first-inactive' => '',
            'first-inactive-link' => '',
            'previous' => '<span class="previous">{link}</span>',
            'previous-marker' => 'Trang Sau',
            'previous-link' => '<a href="{uri}" rel="prev">{page}</a>',
            'previous-inactive' => '<span class="previous-inactive">{link}</span>',
            'previous-inactive-link' => '<a href="#" rel="prev">{page}</a>',
            'regular' => '<span>{link}</span>',
            'regular-link' => '<a href="{uri}">{page}</a>',
            'active' => '<span class="active">{link}</span>',
            'active-link' => '<a href="#">{page}</a>',
            'next' => '<span class="next">{link}</span>',
            'next-marker' => 'Trang Sau',
            'next-link' => '<a href="{uri}" rel="next">{page}</a>',
            'next-inactive' => '<span class="next-inactive">{link}</span>',
            'next-inactive-link' => '<a href="#" rel="next">{page}</a>',
            'last' => '<span class="last">{link}</span>',
            'last-marker' => '&raquo;&raquo;',
            'last-link' => '		<a href="{uri}">{page}</a>',
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
