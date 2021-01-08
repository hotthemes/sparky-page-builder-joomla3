<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
class PlgContentSparkyeditorInstallerScript
{
   /**
    * method to run after an install/update/uninstall method
    *
    * @return void
    */
   function postflight($type, $parent) 
   {
      // Enable plugin
      $db  = JFactory::getDbo();
      $query = $db->getQuery(true);
      $query->update('#__extensions');
      $query->set($db->quoteName('enabled') . ' = 1');
      $query->where($db->quoteName('element') . ' = ' . $db->quote('sparkyeditor'));
      $query->where($db->quoteName('type') . ' = ' . $db->quote('plugin'));
      $db->setQuery($query);
      $db->execute();
   }
}