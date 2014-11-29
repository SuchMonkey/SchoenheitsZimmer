<?php

class Contact extends Model {
	public function getGeneralInformation() {
		return $this->query("SELECT g.name, g.text, g.imgName FROM generals g WHERE g.keyName = 'contact';")->fetch();
	}
}
	