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

	public function siteSidebar()
	{
		global $L;
		global $tags;
		global $url;

		$filter = $url->filters('tag');

		$html  = '<div class="plugin plugin-tags">';
		$html .= '<h2 class="plugin-label">'.$this->getValue('label').'</h2>';
		$html .= '<div class="plugin-content">';
		$html .= '<ul class="tags">';

		// By default the database of tags are alphanumeric sorted
		foreach( $tags->db as $key=>$fields ) {
		    $size = "inherit"
			if (count($fields['list']) <= 1) {
				$size = "inherit";
			} else if(count($fields['list']) > 1 && count($fields['list']) <= 4) {
				$size = "large";
			} else if(count($fields['list']) > 4 && count($fields['list']) <= 8) {
				$size = "larger";
			} else if(count($fields['list'])> 8 && count($fields['list']) <= 13) {
				$size = "x-large";
			} else {
                $size = "xx-large";
			}

            $html .= '<li style="font-size: ' . $size . '">';
            $html .= '<a href="'.DOMAIN_TAGS.$key.'">';
            $html .= $fields['name'];
            $html .= '</a>';
            $html .= '</li>';

		}

		$html .= '</ul>';
 		$html .= '</div>';
 		$html .= '</div>';

		return $html;
	}
}
