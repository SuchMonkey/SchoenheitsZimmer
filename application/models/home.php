<?php

class Home extends Model {
	public function getSections() {
		return $this->query("SELECT s.name, s.text FROM sz.generals g, sz.sections s where g.id = s.contextId and s.contextTable = 'generals' and g.keyName = 'home';")->fetchAll();
	}
	
	public function getGeneralInformation() {
		return $this->query("SELECT g.name, g.text, g.imgName FROM sz.generals g WHERE g.keyName = 'home';")->fetch();
	}
}
	