<?php

//Based on original Bludit tags plugin
//author: Mirivlad
//version: 0.0.1

class pluginTagsPlus extends Plugin {

	public function init()
	{
		$this->dbFields = array(
			'label'=>'Tags'
		);
	}

	public function form()
	{
		global $L;

		$html  = '<div class="alert alert-primary" role="alert">';
		$html .= $this->description();
		$html .= '</div>';

		$html .= '<div>';
		$html .= '<label>'.$L->get('Label').'</label>';
		$html .= '<input id="jslabel" name="label" type="text" value="'.$this->getValue('label').'">';
		$html .= '<span class="tip">'.$L->get('This title is almost always used in the sidebar of the site').'</span>';
		$html .= '</div>';

		return $html;
	}

	public function siteHead()
	{
		return $this->includeCSS('tagsimproved.css');
	}

	public function siteSidebar()
	{
		global $L;
		global $tags;
		global $url;

		$filter = $url->filters('tag');

		$html  = '<div class="plugin plugin-tags">';
		$html .= '<h2 class="plugin-label">'.htmlentities($this->getValue('label')).'</h2>';
		$html .= '<div class="plugin-content">';
		$html .= '<ul class="tags">';

		foreach( $tags->db as $key => $fields ) {

			$current = count$fields['list']);
			$class = 'xsmall';

		    if ($current < 1) ) {
				$class = 'xsmall';
            } else if($current) > 1 && count($current) <= 3) {
				$small = 'small';
			} else if(count($current) > 3 && $current <= 6) {
				$class = 'medium';
			} else if($current > 6 && count($fields['list']) <= 12) {
				$class = 'large';
			} else {
				$class = "xlarge";
			}

            $html .= '<li class="'.htmlentities($class).'">';
            $html .= '<a href="'.DOMAIN_TAGS.htmlentities($key).'">';
            $html .= htmlentities($fields['name']);
            $html .= '</a>';
            $html .= '</li>';
		}

		$html .= '</ul>';
 		$html .= '</div>';
 		$html .= '</div>';

		return $html;
	}
}
