<?php

if( ! function_exists('form_open'))
{
	function form_open($action = '', $method = '')
	{
		if($method == '')
		{
			$method = 'method="post" ';
		}

		$action = $action;
		$form 	=	'<form '.$method;
		$form   .= 	'action="'.$action.'" ';
		$form 	.= 'accept-charset="utf-8">';
		return $form;
	}	
}

if ( ! function_exists('form_close'))
{
	function form_close()
	{
		return "</form>";
	}
}

if ( ! function_exists('form_input'))
{

	function form_input($data = '', $value = '', $extra = '')
	{
		$defaults = array(
			'type' => 'text',
			'name' => is_array($data) ? '' : $data,
			'value' => $value
		);

		return '<input ' .$defaults " />\n";
	}
}

if ( ! function_exists('form_password'))
{
	function form_password($data = '', $value = '', $extra = '')
	{
		if ( ! is_array($data))
		{
			$data = array('name' => $data);
		}

		$data['type'] = 'password';
		return form_input($data, $value, $extra);
	}
}

if ( ! function_exists('form_submit'))
{
	/**
	 * Submit Button
	 *
	 * @param	mixed
	 * @param	string
	 * @param	mixed
	 * @return	string
	 */
	function form_submit($data = '', $value = '', $extra = '')
	{
		$defaults = array(
			'type' => 'submit',
			'name' => is_array($data) ? '' : $data,
			'value' => $value
		);

		return '<input '._parse_form_attributes($data, $defaults)._attributes_to_string($extra)." />\n";
	}
}

if ( ! function_exists('form_button'))
{
	/**
	 * Form Button
	 *
	 * @param	mixed
	 * @param	string
	 * @param	mixed
	 * @return	string
	 */
	function form_button($data = '', $content = '', $extra = '')
	{
		$defaults = array(
			'name' => is_array($data) ? '' : $data,
			'type' => 'button'
		);

		if (is_array($data) && isset($data['content']))
		{
			$content = $data['content'];
			unset($data['content']); // content is not an attribute
		}

		return '<button '._parse_form_attributes($data, $defaults)._attributes_to_string($extra).'>'
			.$content
			."</button>\n";
	}
}
?>