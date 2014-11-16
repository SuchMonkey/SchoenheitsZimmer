<?php

class Price extends Model {
	public function getCategories() {
		return $this->query('select name from therapys order by name;')->fetchAll();
	}
	
	public function getCategory($name) {
		return $this->query('select name, description from therapys where lower(name) = ?;', array($name))->fetch();
	}
	
	public function getUnits($category) {
		return $this->query('select tu.name, tu.price, tu.duration from therapyunits tu, sz.therapys t where tu.therapyid = t.id and lower(t.name) = ? order by tu.name;', array($category))->fetchAll();
	}
	
	public function getGeneralInformation() {
		return $this->query("SELECT g.name, g.text, g.imgName FROM generals g WHERE g.keyName = 'price';")->fetch();
	}
}
	