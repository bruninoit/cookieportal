<?php
/**
*
* @package BruninoIt - Cookie Portal
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/
namespace bruninoit\cookieportal\controller;
class main
{
	/* @var \phpbb\config\config */
	protected $config;
	/* @var \phpbb\controller\helper */
	protected $helper;
	/* @var \phpbb\template\template */
	protected $template;
	/* @var \phpbb\user */
	protected $user;
	protected $db; 
	protected $request;
	/**
	* Constructor
	*
	* @param \phpbb\config\config		$config
	* @param \phpbb\controller\helper	$helper
	* @param \phpbb\template\template	$template
	* @param \phpbb\user				$user
	*/
	public function __construct(\phpbb\db\driver\driver_interface $db, \phpbb\user $user, \phpbb\config\config $config, \phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\request\request $request)
	{
 		$this->db = $db;
		$this->user = $user; 
		$this->config = $config;
		$this->helper = $helper;
		$this->template = $template;
		$this->request  = $request;
	}

	public function portal($type)
	{
	if($this->request->variable('ok_cookie', 0))
	{
	//set cookie
	//redirect vecchia pagina
	$template="ok.html";
	$title="Redirect in corso...";
	}
 	if($this->request->variable('no_cookie', 0))
	{
	//pagina rifiuto
	$template="refuse.html";
	$title="Cookie Rifiutati";
	}
	if(!$this->request->variable('ok_cookie', 0) and !$this->request->variable('no_cookie', 0))
	{
	//pagina avviso
	$template="portal.html";
	$title="Cookie";
	}

 
		//$this->template->assign_var('DEMO_MESSAGE', $this->user->lang($l_message, $name));
		return $this->helper->render($template, $title);
	}
}
