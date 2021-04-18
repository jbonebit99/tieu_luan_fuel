<?php


class Paginationapp extends Pagination
{

	/**
	 * Creates the pagination markup
	 *
	 * @param	mixed $raw
	 * @return	mixed	HTML Markup for page number links, or an array of raw pagination data
	 */
	public function render($raw = false)
	{
		// no links if we only have one page
		if ($this->config['total_pages'] == 1) {
			return $raw ? array() : '';
		}

		$this->raw_results = array();

		$html = str_replace(
			['{pagination}', '{_pagination}'],
			[$this->pages_render(), $this->first() . $this->previous() . $this->next() . $this->last()],
			$this->template['wrapper']
		);

		return $raw ? $this->raw_results : $html;
	}
}
