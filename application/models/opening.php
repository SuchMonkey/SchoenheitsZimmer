<?php

class Opening extends Model {
	public function getGeneralInformation() {
		return $this->query("SELECT g.name, g.text, g.imgName FROM sz.generals g WHERE g.keyName = 'opening';")->fetch();
	}
}
	