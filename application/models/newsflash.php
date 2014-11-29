<?php

class Newsflash extends Model {
	public function getSections() {
		return $this->query("SELECT s.name, s.text FROM generals g, sections s where g.id = s.contextId and s.contextTable = 'generals' and g.keyName = 'newsflash' order by s.orderNumber;")->fetchAll();
	}
	
	public function getGeneralInformation() {
		return $this->query("SELECT g.name, g.text, g.imgName FROM generals g WHERE g.keyName = 'newsflash';")->fetch();
	}
}
	