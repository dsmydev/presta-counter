<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class Dscounter extends Module
{
	const INSTALL_SQL_FILE = 'install.sql';

	 public function __construct()
    {
        $this->name = 'dscounter';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'D&S';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.6',
            'max' => _PS_VERSION_
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('DSNumber Counter');
        $this->description = $this->l('Dscounter helps uou to create number counters for your site.');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

        if (!Configuration::get('MYMODULE_NAME')) {
            $this->warning = $this->l('No name provided');
        }
    }

	public function install()
	{
		if (Shop::isFeatureActive()) {
		    Shop::setContext(Shop::CONTEXT_ALL);
		}

		if (!parent::install() ||
			|| !$this->installDb()
		    !Configuration::updateValue('MYMODULE_NAME', 'Dscounter')
		) {
		    return false;
		}

		return true;
	}

	public function uninstall()
	{
		if (!parent::uninstall() ||
		    !Configuration::deleteByName('MYMODULE_NAME')
		) {
		    return false;
		}

		return true;
	}

	public function installDb()
{
    if (!file_exists(dirname(__FILE__) . '/' . self::INSTALL_SQL_FILE))
     return false;
    else if (!$sql = Tools::file_get_contents(dirname(__FILE__) . '/' . self::INSTALL_SQL_FILE))
     return false;

      $sql = str_replace(array('PREFIX_', 'ENGINE_TYPE'), array(_DB_PREFIX_, _MYSQL_ENGINE_), $sql);
      $sql = preg_split("/;\s*[\r\n]+/", $sql);

      foreach ($sql AS $query)
        if ($query)
          if (!Db::getInstance()->execute(trim($query)))
            return false;
      return true;
  }

}
?>